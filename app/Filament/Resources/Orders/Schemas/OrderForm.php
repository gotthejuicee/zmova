<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\OrderStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Заявка')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Ім’я')
                            ->required()
                            ->maxLength(120),
                        TextInput::make('phone')
                            ->label('Телефон')
                            ->tel()
                            ->required()
                            ->maxLength(32),
                        Textarea::make('comment')
                            ->label('Коментар')
                            ->rows(3)
                            ->maxLength(300)
                            ->columnSpanFull(),
                        Select::make('status')
                            ->label('Статус')
                            ->options(OrderStatus::class)
                            ->default(OrderStatus::New->value)
                            ->selectablePlaceholder(false)
                            ->required(),
                    ]),

                Section::make('Технічні дані')
                    ->columns(2)
                    ->collapsed()
                    ->schema([
                        TextInput::make('ip')
                            ->label('IP-адреса')
                            ->disabled(),
                        TextInput::make('notified_at')
                            ->label('Надіслано в Telegram')
                            ->disabled(),
                        Textarea::make('user_agent')
                            ->label('User agent')
                            ->disabled()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
