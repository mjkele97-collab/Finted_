<div>
    {{-- Messaggio di conferma --}}
    @if (session('success'))
        <div class="ann-alert mb-4" role="status">
            <span class="ann-alert__icon" aria-hidden="true">✓</span>
            {{ session('success') }}
        </div>
    @endif
    <div class="row">

    </div>
    {{-- Griglia di card --}}
    <div class="article-cards-row">
        @forelse ($articles as $article)
            <div class="article-card-column">
                <x-card :article="$article" />
            </div>
        @empty
            <div class="article-cards-empty">
                <p class="footer-muted mb-0 nessun-annuncio">{{ __('ui.nessun-annuncio') }}</p>
            </div>
        @endforelse
    </div>
</div>