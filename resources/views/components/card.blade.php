<div class="card-item d-flex flex-column justify-content-between p-3 rounded-4">
    <div>
        @if(isset($article->id))
            <a href="{{ route('mostra-articolo', $article) }}"
               class="card-image-link"
               aria-label="Apri annuncio: {{ $article->title }}">
        @endif
                <div class="card-media-box position-relative mb-3 overflow-hidden rounded-3">
                    <span class="badge-accent position-absolute top-0 start-0 m-2">
                        {{ __('ui.' . $article->category->name) }}
                    </span>

                    @if($article->images->isNotEmpty())
                        <img src="{{ $article->images->first()->getUrl(800, 1200) }}"
                             alt="{{ $article->title }}"
                             class="w-100 h-100">
                    @else
                        <div class="card-image-placeholder w-100 h-100" role="img" aria-label="{{ __('ui.nessuna-immagine') }}">
                            <i class="bi bi-image" aria-hidden="true"></i>
                        </div>
                    @endif
                </div>
        @if(isset($article->id))
            </a>
        @endif

        <!-- Titolo dell'annuncio -->
        <div class="d-flex justify-content-between align-items-center mb-1">
            <h5 class="fw-bold mb-0 text-truncate text-primary" style="font-size: 16px; max-width: 100%;">
                {{ $article->title }}
            </h5>
        </div>

        <!-- Breve descrizione -->
        <p class="small text-truncate mb-3 text-secondary" style="font-size: 13px;">
            {{ $article->body }}
        </p>
    </div>

    <!-- Prezzo -->
    <div class="pt-2 container d-flex justify-content-between px-0 align-items-center"
        style="border-top: 1px solid var(--border-color, rgba(255, 255, 255, 0.1));">
        <span class="fw-bold fs-6 text-primary">
            € {{ isset($article->price) ? number_format($article->price, 2, ',', '.') : '00,00' }}
        </span>
        @auth
            @if (Auth::user()->is_revisor)
                <form method="POST" action="{{ route('reject', $article) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn-ui-accent btn p-0 d-inline-block" aria-label="{{ __('ui.rifiuta') }}" title="{{ __('ui.rifiuta') }}">
                        <i class="bi bi-arrow-return-left fw-bolder" style="-webkit-text-stroke: 0.5px currentColor; padding: 0 !important; line-height: 1;"></i>
                    </button>
                </form>
            @endif
        @endauth
    </div>
</div>