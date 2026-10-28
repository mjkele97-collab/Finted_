<div>
    <div class="mb-4">
        <div class="d-flex justify-content-between align-items-end gap-3 flex-wrap">
            <div>
                <span class="badge-accent mb-3 gestione-annunci">
                    {{ __('ui.gestione-annunci') }}
                </span>
                <h2 class="h3 fw-bold text-primary mb-0 annunci-rifiutati">
                    {{ __('ui.annunci-rifiutati') }}
                </h2>
            </div>

            <div class="input-group rejected-articles-search">
                <input
                    type="text"
                    class="form-control rejected-search-field placeholder-cerca-annuncio"
                    placeholder="{{ __('ui.placeholder-cerca-annuncio') }}"
                    aria-label="{{ __('ui.placeholder-cerca-annuncio') }}"
                    wire:model.live="search"
                >

                <button
                    class="btn rejected-search-clear"
                    type="button"
                    aria-label="{{ __('ui.cancella-ricerca') }}"
                    wire:click="$set('search', '')"
                >
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
        </div>
    </div>

    @if (session('rejected_articles_message'))
        <div class="alert alert-success" role="status">
            {{ session('rejected_articles_message') }}
        </div>
    @endif

    @if ($rejected_articles->isNotEmpty())

        <div class="table-responsive rejected-articles-container">

            <table class="table table-hover rejected-articles-table align-middle mb-0">

                <thead>
                    <tr>
                        <th class="titolo">{{ __('ui.titolo') }}</th>
                        <th class="descrizione">{{ __('ui.descrizione') }}</th>
                        <th class="rejected-category-column categoria">{{ __('ui.categoria') }}</th>
                        <th class="rejected-actions-column azioni">{{ __('ui.azioni') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($rejected_articles as $article)

                        <tr wire:key="rejected-article-{{ $article->id }}">

                            <td class="fw-semibold">
                                {{ $article->title }}
                            </td>

                            <td>
                                {{ Str::limit($article->body, 80) }}
                            </td>

                            <td>
                                <span class="badge rejected-category-badge">
                                    {{ $article->category ? __('ui.' . $article->category->name) : __('ui.senza-categoria') }}
                                </span>
                            </td>

                            <td>
                                <div class="rejected-action-buttons">

                                    {{-- Ripristina --}}
                                    <button
                                        type="button"
                                        class="btn btn-sm rejected-restore-btn text-nowrap"
                                        wire:click="restore({{ $article->id }})"
                                        wire:confirm="{{ __('ui.conferma-ripristino') }}"
                                        wire:loading.attr="disabled"
                                        wire:target="restore({{ $article->id }})">

                                        <i class="bi bi-arrow-counterclockwise me-1"></i>
                                        <span class="ripristina">{{ __('ui.ripristina') }}</span>
                                    </button>

                                    {{-- Elimina definitivamente --}}
                                    <button
                                        type="button"
                                        class="btn btn-sm rejected-delete-btn text-nowrap"
                                        wire:click="destroy({{ $article->id }})"
                                        wire:confirm="{{ __('ui.conferma-eliminazione') }}"
                                        wire:loading.attr="disabled"
                                        wire:target="destroy({{ $article->id }})">

                                        <i class="bi bi-trash me-1"></i>
                                        <span class="elimina-definitivamente">{{ __('ui.elimina-definitivamente') }}</span>
                                    </button>

                                </div>
                            </td>

                        </tr>

                    @endforeach
                </tbody>

            </table>

        </div>

    @else

        <div class="rejected-empty-state text-center py-4">
            <i class="bi bi-search fs-3 d-block mb-2"></i>

            @if (trim($search) !== '')
                <h3 class="h5 nessun-risultato-trovato">{{ __('ui.nessun-risultato-trovato') }}</h3>
                <p class="text-secondary mb-0">
                    {{ __('ui.nessun-risultato-ricerca', ['search' => $search]) }}
                </p>
            @else
                <h3 class="h5 nessun-annuncio-rifiutato">{{ __('ui.nessun-annuncio-rifiutato') }}</h3>
                <p class="text-secondary mb-0 nessun-annuncio-da-ripristinare">
                    {{ __('ui.nessun-annuncio-da-ripristinare') }}
                </p>
            @endif
        </div>
    @endif
</div>