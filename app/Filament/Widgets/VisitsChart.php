<?php

namespace App\Filament\Widgets;

use App\Models\Visit;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class VisitsChart extends ChartWidget
{
    protected ?string $heading = 'Відвідуваність за 14 днів';

    protected static ?int $sort = 2;

    protected static bool $isLazy = false;

    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $from = Carbon::today()->subDays(13)->toDateString();

        $rows = Visit::where('day', '>=', $from)
            ->selectRaw('day, count(distinct visitor_id) as u, sum(hits) as v')
            ->groupBy('day')
            ->get()
            ->keyBy(fn ($r) => (string) $r->getRawOriginal('day'));

        $labels = [];
        $unique = [];
        $views = [];

        foreach (range(13, 0) as $i) {
            $date = Carbon::today()->subDays($i);
            $key = $date->toDateString();
            $labels[] = $date->format('d.m');
            $unique[] = (int) ($rows[$key]->u ?? 0);
            $views[] = (int) ($rows[$key]->v ?? 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Унікальні відвідувачі',
                    'data' => $unique,
                    'borderColor' => '#ffd700',
                    'backgroundColor' => 'rgba(255, 215, 0, 0.15)',
                    'fill' => true,
                    'tension' => 0.3,
                ],
                [
                    'label' => 'Перегляди',
                    'data' => $views,
                    'borderColor' => '#fc8375',
                    'backgroundColor' => 'rgba(252, 131, 117, 0.10)',
                    'fill' => true,
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
