<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $team = [
            ['nome' => 'Ivan', 'email' => 'ivan@example.com', 'tel' => '+39 000 123 4561'],
            ['nome' => 'Mikele', 'email' => 'mikele@example.com', 'tel' => '+39 000 123 4562'],
            ['nome' => 'Fabio', 'email' => 'fabio@example.com', 'tel' => '+39 000 123 4563'],
            ['nome' => 'Nadeesh', 'email' => 'nadeesh@example.com', 'tel' => '+39 000 123 4564'],
        ];

        $link = fn (string $name): string => Route::has($name) ? route($name) : '#';

        return view('components.footer', [
            'team' => $team,
            'link' => $link,
        ]);
    }
}
