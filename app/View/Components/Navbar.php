<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $languages = [
            'it' => ['nation' => 'it', 'name' => 'Italiano'],
            'lk' => ['nation' => 'lk', 'name' => 'සිංහල'],
            'en' => ['nation' => 'gb', 'name' => 'English'],
        ];

        $currentRouteCategory = request()->route('category');
        $currentCategoryId = is_object($currentRouteCategory)
            ? $currentRouteCategory->id
            : $currentRouteCategory;

        return view('components.navbar', [
            'languages' => $languages,
            'current' => app()->getLocale(),
            'currentCategoryId' => $currentCategoryId,
        ]);
    }
}
