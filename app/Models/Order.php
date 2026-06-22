<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'comment',
        'status',
        'ip',
        'user_agent',
        'notified_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => OrderStatus::class,
            'notified_at' => 'datetime',
        ];
    }

    /** Чи доставлена заявка в Telegram. */
    public function wasNotified(): bool
    {
        return $this->notified_at !== null;
    }
}
