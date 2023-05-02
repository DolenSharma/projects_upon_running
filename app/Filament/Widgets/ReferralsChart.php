<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Referral;
use App\Models\Consultant;
use App\Models\Interview;
use App\Models\Submission;
use App\Models\Bdmpost;
use App\Models\Layer;
use App\Models\Uploadownprofile;
use Filament\Widgets\LineChartWidget;
use Illuminate\Support\Carbon;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ReferralsChart extends LineChartWidget
{
    protected static ?string $heading = 'Yearly Chart';
    protected static ?string $maxHeight = '500px';
    protected static ?string $pollingInterval = '5s';
    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => true,
            ],
        ],
    ];

    protected function getData(): array
    {

        $data1 = Trend::model(Post::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

        $data2 = Trend::model(Referral::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

        $data3 = Trend::model(Consultant::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

        $data4 = Trend::model(Submission::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

        $data5 = Trend::model(Interview::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

        $data6 = Trend::model(Uploadownprofile::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
        $data7 = Trend::model(Bdmpost::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
        $data8 = Trend::model(Layer::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Posts',
                'data' => $data1->map(fn (TrendValue $value) => $value->aggregate),

                    'fill' => 'false',
                    'borderColor' => 'green',
                    'tension' => '0.1',
                    'borderWidth' => '2',
            ],

            [
                'label' => 'Referrals',
                'data' => $data2->map(fn (TrendValue $value) => $value->aggregate),

                    'fill' => 'false',
                    'borderColor' => 'skyblue',
                    'tension' => '0.1',
                    'borderWidth' => '2',
            ],

            [
                'label' => 'Consultants',
                'data' => $data3->map(fn (TrendValue $value) => $value->aggregate),

                    'fill' => 'false',
                    'borderColor' => 'red',
                    'tension' => '0.1',
                    'borderWidth' => '2',
            ],

            [
                'label' => 'Submissions',
                'data' => $data4->map(fn (TrendValue $value) => $value->aggregate),

                    'fill' => 'false',
                    'borderColor' => 'purple',
                    'tension' => '0.1',
                    'borderWidth' => '2',
            ],

            [
                'label' => 'Interviews',
                'data' => $data5->map(fn (TrendValue $value) => $value->aggregate),

                    'fill' => 'false',
                    'borderColor' => 'yellow',
                    'tension' => '0.1',
                    'borderWidth' => '2',
            ],

            [
                'label' => 'Profiles Uploaded',
                'data' => $data6->map(fn (TrendValue $value) => $value->aggregate),

                    'fill' => 'false',
                    'borderColor' => 'pink',
                    'tension' => '0.1',
                    'borderWidth' => '2',
            ],
            [
                'label' => 'BDM Posts',
                'data' => $data7->map(fn (TrendValue $value) => $value->aggregate),

                    'fill' => 'true',
                    'borderColor' => 'blue',
                    'tension' => '0.1',
                    'borderWidth' => '2',
            ],

            [
                'label' => 'Layer Submissions',
                'data' => $data8->map(fn (TrendValue $value) => $value->aggregate),

                    'fill' => 'true',
                    'borderColor' => 'black',
                    'tension' => '0.1',
                    'borderWidth' => '2',
            ],
        ],
        'labels' => $data1->map(fn (TrendValue $value) => $value->date),
    ];


        }
}
