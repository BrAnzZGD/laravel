<?php

namespace App\View\Components;

use Clouser;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class teknologi extends Component
{
    public string $title;
    public string $icon3;
    public function __construct(string $title, string $icon3)
    {
        $this->title = $title;
        $this->icon3 = $icon3;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.teknologi');
    }
}