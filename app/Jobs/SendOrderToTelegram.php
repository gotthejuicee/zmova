<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\TelegramNotifier;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendOrderToTelegram implements ShouldQueue
{
    use Queueable;

    /** Кількість спроб (важливо для QUEUE_CONNECTION=database). */
    public int $tries = 3;

    /** Пауза між спробами, сек. */
    public array $backoff = [10, 30];

    public function __construct(public Order $order) {}

    public function handle(TelegramNotifier $telegram): void
    {
        $telegram->sendOrder($this->order);

        $this->order->forceFill(['notified_at' => now()])->save();
    }
}
