<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

/**
 * Життєвий цикл заявки на книгу.
 *
 * Реалізує контракти Filament, тож і Select у формі, і бейдж у таблиці
 * автоматично показують укр. підпис та колір.
 */
enum OrderStatus: string implements HasColor, HasLabel
{
    case New = 'new';
    case Contacted = 'contacted';
    case Completed = 'completed';
    case Cancelled = 'cancelled';

    /** Людська назва статусу (укр.). */
    public function label(): string
    {
        return match ($this) {
            self::New => 'Нова',
            self::Contacted => 'Зв’язалися',
            self::Completed => 'Виконано',
            self::Cancelled => 'Скасовано',
        };
    }

    /** Колір бейджа у Filament. */
    public function color(): string
    {
        return match ($this) {
            self::New => 'warning',
            self::Contacted => 'info',
            self::Completed => 'success',
            self::Cancelled => 'gray',
        };
    }

    public function getLabel(): string
    {
        return $this->label();
    }

    public function getColor(): string
    {
        return $this->color();
    }
}
