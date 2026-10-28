<div class="create-article-page">
    {{-- Messaggio di conferma pubblicazione --}}
    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center mb-4 rounded-4" role="alert">
            <i class="bi bi-check-circle-fill me-2 fs-5"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    <header class="create-page-heading mb-4">
        <span class="badge-accent mb-2 nuovo-annuncio">{{ __('ui.nuovo-annuncio') }}</span>
        <h1 class="fw-bold text-primary mb-2 cosa-vuoi-vendere">{{ __('ui.cosa-vuoi-vendere') }}</h1>
        <p class="text-secondary small mb-0 crea-annuncio-sottotitolo">{{ __('ui.crea-annuncio-sottotitolo') }}</p>
    </header>

    <div class="row g-4 align-items-stretch create-article-layout">
        <div class="col-12 col-lg-6">
            <div class="create-form-card">
                <form wire:submit.prevent="store" novalidate>
                    <div class="create-upload-section mb-4">
                        <div class="d-flex align-items-center justify-content-between gap-3 mb-2">
                            <span class="form-label fw-semibold mb-0 foto">{{ __('ui.foto') }}</span>
                            <span class="create-image-count">{{ count($images) }} / 6</span>
                        </div>
                        <p class="text-secondary small mb-3 aggiungi-immagini-info">{{ __('ui.aggiungi-immagini-info') }}</p>
                        <input id="temporary_images" type="file" wire:model.live="temporary_images" accept=".jpg,.png,image/jpeg,image/png" multiple
                            class="create-upload-input @error('temporary_images.*') is-invalid @enderror @error('temporary_images') is-invalid @enderror @error('images') is-invalid @enderror"/>
                        <div class="create-upload-grid">
                            @for ($slot = 0; $slot < 6; $slot++)
                                @if (isset($images[$slot]))
                                    <button type="button"
                                            class="create-upload-slot has-image"
                                            wire:click="removeImage({{ $slot }})"
                                            aria-label="Rimuovi immagine {{ $slot + 1 }}">
                                        <img src="{{ $images[$slot]->temporaryUrl() }}" alt="Immagine caricata {{ $slot + 1 }}">
                                        <span class="create-upload-remove" aria-hidden="true">&times;</span>
                                    </button>
                                @else
                                    <label for="temporary_images" class="create-upload-slot" aria-label="Aggiungi immagine {{ $slot + 1 }}">
                                        <i class="bi bi-plus-lg" aria-hidden="true"></i>
                                    </label>
                                @endif
                            @endfor
                        </div>
                        <div wire:loading wire:target="temporary_images" class="text-secondary small mt-2 caricamento-immagini">
                            {{ __('ui.caricamento-immagini') }}
                        </div>
                        @error('temporary_images.*')
                            <p class="fst-italic text-danger mt-2">{{ $message }}</p>
                        @enderror
                        @error('temporary_images')
                            <p class="fst-italic text-danger mt-2">{{ $message }}</p>
                        @enderror
                        @error('images')
                            <p class="fst-italic text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                <div class="mb-4">
                    <label for="title" class="form-label text-secondary small fw-semibold mb-1 titolo">
                        {{ __('ui.titolo') }} *
                    </label>
                    <input 
                        type="text" 
                        id="title" 
                        wire:model.live="title" 
                        class="form-control create-input-pill placeholder-titolo @error('title') is-invalid @enderror" 
                        placeholder="{{ __('ui.placeholder-titolo') }}"
                    >
                    @error('title')
                        <div class="invalid-feedback ps-3">{{ $message }}</div>
                    @enderror
                </div>

                <!-- 2. Categorie a Pillola -->
                <div class="mb-4">
                    <label class="form-label text-secondary small fw-semibold mb-2 d-block categoria">
                        {{ __('ui.categoria') }} *
                    </label>
                    
                    <div class="d-flex flex-wrap gap-2">
                        @forelse ($categories as $category)
                            <button
                                type="button"
                                wire:click="selectCategory({{ $category->id }})"
                                wire:key="create-category-{{ $category->id }}"
                                class="create-cat-pill {{ (string)$category_id === (string)$category->id ? 'active' : '' }}"
                                aria-pressed="{{ (string)$category_id === (string)$category->id ? 'true' : 'false' }}"
                            >
                                {{ __('ui.' . $category->name) }}
                            </button>
                        @empty
                            <p class="text-secondary small mb-0">{{ __('ui.categorie-non-disponibili') }}</p>
                        @endforelse
                    </div>
                    @error('category_id')
                        <div class="text-danger small mt-2 ps-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- 3. Prezzo (€) -->
                <div class="mb-4">
                    <label for="price" class="form-label text-secondary small fw-semibold mb-1 prezzo">
                        {{ __('ui.prezzo') }} (€) *
                    </label>
                    <input 
                        type="text" 
                        id="price" 
                        wire:model.live="price" 
                        class="form-control create-input-pill create-price-input @error('price') is-invalid @enderror" 
                        placeholder="0,00"
                    >
                    @error('price')
                        <div class="invalid-feedback ps-3">{{ $message }}</div>
                    @enderror
                </div>

                <!-- 4. Descrizione -->
                <div class="mb-4">
                    <label for="body" class="form-label text-secondary small fw-semibold mb-1 descrizione">
                        {{ __('ui.descrizione') }} *
                    </label>
                    <textarea 
                        id="body" 
                        wire:model.live="body" 
                        rows="6" 
                        class="form-control create-textarea placeholder-descrizione @error('body') is-invalid @enderror" 
                        placeholder="{{ __('ui.placeholder-descrizione') }}"
                    ></textarea>
                    @error('body')
                        <div class="invalid-feedback ps-3">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bottone di invio -->
                <div class="pt-2">
                    <button type="submit" class="btn btn-ui-accent py-2 px-4 fw-bold pubblica-annuncio">
                        {{ __('ui.pubblica-annuncio') }}
                    </button>
                </div>

                </form>
            </div>
        </div>

        <aside class="col-12 col-lg-6">
            <div class="create-preview-panel">
                <div class="create-preview-heading">
                    <span class="fw-semibold anteprima">{{ __('ui.anteprima') }}</span>
                    <span class="text-secondary small come-nel-catalogo">{{ __('ui.come-nel-catalogo') }}</span>
                </div>

                <div class="card-item create-preview-card">
                    <div class="card-media-box create-preview-media mb-3">
                        @if ($selectedCategoryName)
                            <span class="badge-accent position-absolute top-0 start-0 m-2">
                                {{ __('ui.' . $selectedCategoryName) }}
                            </span>
                        @else
                            <span class="badge-accent position-absolute top-0 start-0 m-2 categoria">
                                {{ __('ui.categoria') }}
                            </span>
                        @endif
                        <div id="create-preview-carousel" class="carousel slide create-preview-carousel" data-bs-ride="false">
                            <div class="carousel-inner">
                                @for ($slot = 0; $slot < 6; $slot++)
                                    <div class="carousel-item {{ $slot === 0 ? 'active' : '' }}">
                                        @if (isset($images[$slot]))
                                            <img src="{{ $images[$slot]->temporaryUrl() }}"
                                                alt="Anteprima immagine {{ $slot + 1 }} dell'annuncio">
                                        @else
                                            <div class="create-preview-empty-image" aria-label="Immagine {{ $slot + 1 }} non ancora selezionata">
                                                <i class="bi bi-image" aria-hidden="true"></i>
                                            </div>
                                        @endif
                                    </div>
                                @endfor
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#create-preview-carousel" data-bs-slide="prev" aria-label="Immagine precedente">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#create-preview-carousel" data-bs-slide="next" aria-label="Immagine successiva">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>

                        </div>
                    </div>

                    <div class="create-preview-details">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h5 class="fw-bold mb-0 text-truncate text-primary create-preview-title anteprima-titolo-default">
                                {{ !empty($title) ? $title : __('ui.anteprima-titolo-default') }}
                            </h5>
                        </div>

                        <p class="small text-truncate mb-3 text-secondary create-preview-body anteprima-descrizione-default">
                            {{ !empty($body) ? $body : __('ui.anteprima-descrizione-default') }}
                        </p>

                        <div class="pt-2 d-flex justify-content-between px-0 align-items-center create-preview-price">
                            <span class="fw-bold fs-6 text-primary">
                                € {{ !empty($price) && is_numeric($price) ? number_format((float) $price, 2, ',', '.') : '00,00' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>