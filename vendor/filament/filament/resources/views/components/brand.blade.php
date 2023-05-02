@if (filled($brand = config('filament.brand')))
    <div @class([
        'filament-brand text-xl font-bold tracking-tight',
        'dark:text-yellow-600' => config('filament.dark_mode'),
    ])>
        {{ $brand }}
    </div>
@endif
