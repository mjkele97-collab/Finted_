<x-layout>
    <x-slot name="title">
        Finted | {{ __('ui.area-revisore') }}
    </x-slot>

    <div class="container-fluid px-0 py-4">

        @if (session('review_message'))
            <div class="promo-banner-box d-flex align-items-center gap-3 py-3 px-4 mb-4" role="status">
                <span class="nav-circle-btn btn-filled"><i class="bi bi-check-lg"></i></span>
                <span class="text-primary">{{ session('review_message') }}</span>
            </div>
        @endif

        @if ($article_to_check)
            {{-- Intestazione --}}
            <div class="mb-4 mt-4">
                <span class="badge-accent mb-4 area-revisore">{{ __('ui.area-revisore') }}</span>
                <h1 class="h2 fw-bold text-primary mb-2 revisiona-annunci">{{ __('ui.revisiona-annunci') }}</h1>
            </div>

            <div class="row g-4 align-items-start">
                <section class="col-12 col-lg-7" aria-label="{{ __('ui.foto') }}">
                    @if ($article_to_check->images->isNotEmpty())
                        <div class="d-flex flex-column gap-3">
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="p-3 rounded-4 shadow-sm" style="background-color: var(--card-body-color); border: 1px solid var(--border-color);">
                                    <div class="row g-3 align-items-center">
                                        {{-- Immagine --}}
                                        <div class="col-12 col-md-4">
                                            <div class="revisor-article-image shadow-sm" style="background-color: var(--body-color);">
                                                <img src="{{ $image->getUrl() }}"
                                                    alt="{{ __('ui.immagine-articolo', ['key' => $key + 1, 'title' => $article_to_check->title]) }}"
                                                >
                                            </div>
                                        </div>

                                        {{-- Labels --}}
                                        <div class="col-12 col-md-5 px-md-2">
                                            <h6 class="fw-bold text-accent mb-2" style="font-size: 13px; letter-spacing: 0.5px;">
                                                <i class="bi bi-tags me-1"></i> {{ __('ui.labels') }}
                                            </h6>
                                            @if ($image->labels && count($image->labels) > 0)
                                                <div class="d-flex flex-wrap gap-1">
                                                    @foreach ($image->labels as $label)
                                                        <span class="badge rounded-pill fw-normal px-2 py-1"
                                                              style="background-color: var(--body-color); color: var(--text-secondary); border: 1px solid var(--border-color); font-size: 11px;">
                                                            #{{ $label }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @else
                                                <p class="small text-secondary fst-italic mb-0">{{ __('ui.nessuna-etichetta') }}</p>
                                            @endif
                                        </div>

                                        {{-- Ratings --}}
                                        <div class="col-12 col-md-3 ps-md-2">
                                            <h6 class="fw-bold text-accent mb-2" style="font-size: 13px; letter-spacing: 0.5px;">
                                                <i class="bi bi-shield-check me-1"></i> {{ __('ui.ratings') }}
                                            </h6>
                                            <div class="d-flex flex-column gap-1">
                                                <div class="d-flex align-items-center justify-content-between py-1 border-bottom" style="border-color: rgba(255, 255, 255, 0.07) !important;">
                                                    <span class="small text-secondary">{{ __('ui.adult') }}</span>
                                                    <i class="{{ $image->adult ?: 'bi bi-circle-fill text-secondary' }}"></i>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between py-1 border-bottom" style="border-color: rgba(255, 255, 255, 0.07) !important;">
                                                    <span class="small text-secondary">{{ __('ui.violence') }}</span>
                                                    <i class="{{ $image->violence ?: 'bi bi-circle-fill text-secondary' }}"></i>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between py-1 border-bottom" style="border-color: rgba(255, 255, 255, 0.07) !important;">
                                                    <span class="small text-secondary">{{ __('ui.spoof') }}</span>
                                                    <i class="{{ $image->spoof ?: 'bi bi-circle-fill text-secondary' }}"></i>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between py-1 border-bottom" style="border-color: rgba(255, 255, 255, 0.07) !important;">
                                                    <span class="small text-secondary">{{ __('ui.racy') }}</span>
                                                    <i class="{{ $image->racy ?: 'bi bi-circle-fill text-secondary' }}"></i>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between py-1">
                                                    <span class="small text-secondary">{{ __('ui.medical') }}</span>
                                                    <i class="{{ $image->medical ?: 'bi bi-circle-fill text-secondary' }}"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="revisor-no-images">
                            <i class="bi bi-image" aria-hidden="true"></i>
                            <span class="nessuna-immagine">{{ __('ui.nessuna-immagine') }}</span>
                        </div>
                    @endif
                </section>

                {{-- Dati dell'annuncio e azioni --}}
                <aside class="col-12 col-lg-5">
                    <div class="revisor-article-card position-sticky">

                        <span class="badge-accent mb-3">
                            {{ $article_to_check->category ? __('ui.' . $article_to_check->category->name) : __('ui.senza-categoria') }}
                        </span>

                        <h2 class="h3 fw-bold text-primary lh-sm mb-2">
                            {{ $article_to_check->title }}
                        </h2>

                        <div class="fs-2 fw-bold text-accent mb-3">
                            € {{ number_format($article_to_check->price, 2, ',', '.') }}
                        </div>

                        <p class="footer-muted mb-4">{{ $article_to_check->body }}</p>

                        <div class="create-preview-divider mb-4"></div>
                        <div class="small text-secondary mb-4 pubblicato">
                            <span class="pubblicato-testo">{{ __('ui.pubblicato') }}</span> {{ $article_to_check->created_at->diffForHumans() }}
                        </div>
                        <div class="row g-2">
                            @if ($article_to_check->hasRedFlags())
                                <div class="col-12">
                                    <form action="{{ route('revisor.destroy', ['article' => $article_to_check]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-custom-outline w-100">
                                            <i class="bi bi-trash me-1"></i> {{ __('ui.elimina-definitivamente') }}
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="col-6">
                                    <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-custom-outline w-100 rifiuta">
                                            <i class="bi bi-x-lg me-1"></i> {{ __('ui.rifiuta') }}
                                        </button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-custom-accent w-100 accetta">
                                            <i class="bi bi-check-lg me-1"></i> {{ __('ui.accetta') }}
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </aside>
            </div>
        @else
            {{-- Nessun annuncio da revisionare --}}
            <div class="d-flex align-items-center justify-content-center" style="min-height: 70vh;">
                <div class="promo-banner-box text-center" style="max-width: 520px;">
                    <span class="nav-circle-btn btn-filled reviewer-empty-state-icon mx-auto mb-3" style="width: 56px; height: 56px;">
                        <i class="bi bi-check2-all fs-4"></i>
                    </span>
                    <h2 class="h4 fw-bold text-primary mb-2 nessun-annuncio-da-revisionare">{{ __('ui.nessun-annuncio-da-revisionare') }}</h2>
                    <p class="footer-muted mb-4 tutti-annunci-controllati">{{ __('ui.tutti-annunci-controllati') }}</p>
                    <a href="{{ route('home') }}" class="btn-custom-accent torna-homepage">{{ __('ui.torna-homepage') }}</a>
                </div>
            </div>
        @endif
    </div>


    <div class="mt-5 pt-4 border-top" style="border-color: var(--border-color) !important;">
        <livewire:revisor.rejected-articles />
    </div>

</x-layout>