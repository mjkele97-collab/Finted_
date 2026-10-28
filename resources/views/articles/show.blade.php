<x-layout>
    <x-slot name="title">
        Finted | {{ $article->title }}
    </x-slot>

    <div class="show-page py-4 my-2">
        
        <!-- Breadcrumb identico al mockup (Home / Categoria / Titolo) -->
        <nav class="show-breadcrumb" aria-label="breadcrumb">
            <a href="{{ url('/') }}" class="home">{{ __('ui.home') }}</a>
            <span class="separator">/</span>
            <a href="{{ route('tutti-gli-articoli') }}">
                {{ __('ui.' . $article->category->name) }}
            </a>
            <span class="separator">/</span>
            <span class="current">{{ $article->title }}</span>
        </nav>

        <div class="pt-3 pb-3 align-items-center d-inline-flex">
            <a href="{{ route('tutti-gli-articoli') }}" class="d-inline-flex align-items-center btn-ui-outline py-2 px-3 text-decoration-none fw-bold gap-2" style="font-size: 14px;">
                <div class="container-fluid px-0 gap-2 d-flex align-items-center">
                    <i class="bi bi-arrow-left" style="line-height: 1"></i>
                    <span class="torna-agli-annunci">{{ __('ui.torna-agli-annunci') }}</span>
                </div>
            </a>
        </div>

        <div class="row g-4 g-xl-5 align-items-start show-detail-layout">

            <!-- ==========================================
                 COLONNA SINISTRA: GALLERIA + DESCRIZIONE
                 ========================================== -->
            <div class="col-12 col-lg-6 show-gallery-column">

                <div class="show-gallery-layout {{ $article->images->count() <= 1 ? 'show-gallery-single' : '' }} mb-4">
                    <!-- Miniature interattive a sinistra del carosello -->
                    @if ($article->images->count() > 1)
                        <div class="show-carousel-thumbnails">
                            @foreach ($article->images as $key => $image)
                            <button type="button"
                                    class="show-thumb-btn {{ $loop->first ? 'active' : '' }}"
                                    data-bs-target="#article-carousel"
                                    data-bs-slide-to="{{ $key }}"
                                    aria-label="Visualizza immagine {{ $key + 1 }}">
                                <img src="{{ $image->getUrl(800, 1200) }}" alt="Miniatura {{ $key + 1 }}">
                            </button>
                            @endforeach
                        </div>
                    @endif

                    <!-- Immagine principale verticale con carosello -->
                    <div id="article-carousel" class="carousel slide show-carousel-box" data-bs-ride="false">
                        <div class="carousel-inner">
                            @forelse ($article->images as $key => $image)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img src="{{ $image->getUrl(800, 1200) }}"
                                        class="d-block w-100 rounded shadow"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                            @empty
                                <div class="carousel-item active">
                                    <div class="show-image-placeholder" role="img" aria-label="{{ __('ui.nessuna-immagine') }}">
                                        <i class="bi bi-image" aria-hidden="true"></i>
                                        <span>{{ __('ui.nessuna-immagine') }}</span>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        @if ($article->images->count() > 1)
                            <button class="show-carousel-arrow prev" type="button" data-bs-target="#article-carousel" data-bs-slide="prev">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                            <button class="show-carousel-arrow next" type="button" data-bs-target="#article-carousel" data-bs-slide="next">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        @endif

                        @if ($article->images->count() > 1)
                            <div class="show-carousel-counter" id="carousel-counter">
                                1/{{ $article->images->count() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- ==========================================
                 COLONNA DESTRA: CARD DETTAGLIO PRODOTTO
                 ========================================== -->
            <aside class="col-12 col-lg-6 show-details-column">
                <div class="show-product-card">
                    
                    <!-- Badge Categoria -->
                    <div class="mb-3">
                        <span class="badge-accent">
                            {{ __('ui.' . $article->category->name) }}
                        </span>
                    </div>

                    <!-- Titolo Prodotto -->
                    <h1 class="show-product-title fw-bold text-primary mb-2 text-break">
                        {{ $article->title }}
                    </h1>

                    <!-- Prezzo -->
                    <div class="show-product-price fw-bold text-primary mb-4 text-break">
                        € {{ number_format($article->price, 2, ',', '.') }}
                    </div>
                    
                    <!-- Descrizione Prodotto -->

                    <div class="mb-3 pt-2">
                        <h2 class="fw-bold text-primary mb-3 descrizione" style="font-size: 20px;">{{ __('ui.descrizione') }}</h2>
                        <p class="text-secondary small lh-base mb-4 text-break" style="font-size: 14px;">
                            {{ $article->body }}
                        </p>
                    </div>

                    <!-- Linea divisoria sottile -->
                    <div class="my-4" style="border-top: 1px solid var(--border-color);"></div>

                    <!-- Informazioni Venditore -->
                    <div class="d-flex align-items-center gap-3">
                        <div>
                            <div class="text-secondary small pubblicato" style="font-size: 12px;">
                                <span class="pubblicato-testo">{{ __('ui.pubblicato') }}</span> {{ $article->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</x-layout>