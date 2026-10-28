<x-layout>
    <x-slot name="title">
        Finted | {{ __('ui.nuovo-annuncio') }}
    </x-slot>

    <div class="py-4 my-2">
        <livewire:create-article-form />
    </div>
</x-layout>