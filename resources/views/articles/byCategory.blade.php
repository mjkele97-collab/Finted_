<x-layout>
    <x-slot name="title">
        Finted | {{ __('ui.' . $category->name) }}
    </x-slot>

    <div class="container-fluid pt-4 m-0 px-0">

        {{-- Intestazione --}}
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 pt-2">
            <div>
                <h2 class="mb-1 tutti-gli-annunci">{{ __('ui.tutti-gli-annunci') }}</h2>
            </div>
        </div>
        <div class="article-cards-row">
                @forelse ($articles as $article)
                    <div class="article-card-column">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <div class="article-cards-empty vh-100 d-flex justify-content-center align-items-center col-12 text-center">
                        <h2 class="footer-muted mb-0 nessun-annuncio">{{ __('ui.nessun-annuncio') }}</h2>
                    </div>
                @endforelse
        </div>
    </div>
</x-layout>