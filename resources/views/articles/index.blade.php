<x-layout>

    <x-slot name="title">
        Finted | {{ __('ui.articoli') }}
    </x-slot>

    <div class="container-fluid pt-4 m-0 px-0">
        <section aria-labelledby="articles-index-title">
            <header class="pt-2 mb-4">
                <span class="badge-accent mb-3 marketplace">{{ __('ui.marketplace') }}</span>
                <h1 id="articles-index-title" class="h2 fw-bold text-primary mb-2 tutti-gli-annunci">
                    {{ __('ui.tutti-gli-annunci') }}
                </h1>
                <p class="text-secondary mb-0 esplora-proposte">
                    {{ __('ui.esplora-proposte') }}
                </p>
            </header>

            <div class="pt-2">
                <livewire:article-index-table />
            </div>
        </section>
    </div>
</x-layout>