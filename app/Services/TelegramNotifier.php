<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Http;
use RuntimeException;

/**
 * Тонкий клієнт Telegram Bot API.
 *
 * Креди беруться з config/services.php (а не хардкодяться, як у старому send.php).
 */
class TelegramNotifier
{
    public function __construct(
        private readonly ?string $token,
        private readonly ?string $chatId,
    ) {}

    public function isConfigured(): bool
    {
        return ! empty($this->token) && ! empty($this->chatId);
    }

    /**
     * Надіслати заявку в Telegram. Кидає виняток при невдачі —
     * щоб черга/джоба могли зробити retry.
     */
    public function sendOrder(Order $order): void
    {
        if (! $this->isConfigured()) {
            throw new RuntimeException('Telegram не налаштовано: відсутній TELEGRAM_BOT_TOKEN або TELEGRAM_CHAT_ID.');
        }

        $response = Http::asForm()
            ->timeout(10)
            ->retry(2, 200)
            ->post("https://api.telegram.org/bot{$this->token}/sendMessage", [
                'chat_id' => $this->chatId,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true,
                'text' => $this->formatMessage($order),
            ]);

        if ($response->failed()) {
            throw new RuntimeException(
                'Telegram API повернув помилку: '.$response->status().' '.$response->body()
            );
        }
    }

    private function formatMessage(Order $order): string
    {
        $lines = [
            '📩 <b>Нова заявка з сайту ЗМОВА</b>',
            '',
            '👤 <b>Ім’я:</b> '.e($order->name),
            '📱 <b>Телефон:</b> '.e($order->phone),
        ];

        if (filled($order->comment)) {
            $lines[] = '';
            $lines[] = '💬 <b>Коментар:</b> '.e($order->comment);
        }

        $lines[] = '';
        $lines[] = '🕒 '.$order->created_at->format('d.m.Y H:i').' • #'.$order->id;

        return implode("\n", $lines);
    }
}
