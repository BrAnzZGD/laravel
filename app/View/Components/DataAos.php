<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DataAos extends Component
{
    public string $title;
    public string $icon;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $icon)
    {
        $this->title = $title;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.data-aos');
    }
}