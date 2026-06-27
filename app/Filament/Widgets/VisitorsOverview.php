<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Visit;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class VisitorsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        $today = Carbon::today()->toDateString();
        $weekAgo = Carbon::today()->subDays(6)->toDateString();

        $uniqueToday = Visit::where('day', $today)->distinct('visitor_id')->count('visitor_id');
        $unique7 = Visit::where('day', '>=', $weekAgo)->distinct('visitor_id')->count('visitor_id');
        $views7 = (int) Visit::where('day', '>=', $weekAgo)->sum('hits');
        $orders = Order::count();

        // Спарклайн: унікальні відвідувачі по днях за тиждень
        $byDay = Visit::where('day', '>=', $weekAgo)
            ->selectRaw('day, count(distinct visitor_id) as u')
            ->groupBy('day')
            ->pluck('u', 'day');

        $spark = collect(range(6, 0))
            ->map(fn ($i) => (int) ($byDay[Carbon::today()->subDays($i)->toDateString()] ?? 0))
            ->all();

        return [
            Stat::make('Відвідувачі сьогодні', $uniqueToday)
                ->description('Унікальні люди (боти не рахуються)')
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->chart($spark),
            Stat::make('Відвідувачі за 7 днів', $unique7)
                ->description('Унікальні за тиждень')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('info'),
            Stat::make('Переглядів за 7 днів', $views7)
                ->description('Усього відкриттів сторінки')
                ->descriptionIcon('heroicon-m-eye')
                ->color('warning'),
            Stat::make('Заявок', $orders)
                ->description('Усього з форми замовлення')
                ->descriptionIcon('heroicon-m-inbox-arrow-down')
                ->color('primary'),
        ];
    }
}
