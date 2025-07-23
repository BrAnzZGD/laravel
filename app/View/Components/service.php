<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class service extends Component
{
    public string $title;
    public string $icon2;
    public string $span;

    /**
     * Create a new component instance.
     */
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
        return view('components.service');
    }
}