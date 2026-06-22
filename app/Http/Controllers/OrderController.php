<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Http\Requests\StoreOrderRequest;
use App\Jobs\SendOrderToTelegram;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Throwable;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request): JsonResponse
    {
        $order = Order::create([
            ...$request->orderData(),
            'status' => OrderStatus::New,
            'ip' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 255),
        ]);

        // Замовлення вже збережене. Якщо Telegram недоступний (sync-черга),
        // не валимо відповідь — менеджер усе одно побачить заявку в адмінці.
        try {
            SendOrderToTelegram::dispatch($order);
        } catch (Throwable $e) {
            report($e);
        }

        return response()->json([
            'ok' => true,
            'message' => 'Дякуємо! Ми з вами зв’яжемося найближчим часом.',
        ]);
    }
}
