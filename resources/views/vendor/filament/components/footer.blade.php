{{ \Filament\Facades\Filament::renderHook('footer.before') }}

<div class="filament-footer flex items-center justify-center">
    {{ \Filament\Facades\Filament::renderHook('footer.start') }}

    @if (config('filament.layout.footer.should_show_logo'))
        <a
            href="https://lrainfotech.com"
            target="_blank"
            rel="noopener noreferrer"
            class="text-gray-950 hover:text-yellow-500 transition"
        >
                <text x="0" y="15" fill="yellow">Copyright ©2023. All Right Reserved @LRA Infotech LLC - HRMSV1.0</text>
        </a>
    @endif

    {{ \Filament\Facades\Filament::renderHook('footer.end') }}
</div>

{{ \Filament\Facades\Filament::renderHook('footer.after') }}
