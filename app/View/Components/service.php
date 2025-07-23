<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class service extends Component
{
    public string $title;
    public string $icon2;
    public string $span;

    public function __construct(string $title, string $icon2, string $span=null)
    {
        $this->title = $title;
        $this->icon2 = $icon2;
        $this->span = $span;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.services');
    }
}