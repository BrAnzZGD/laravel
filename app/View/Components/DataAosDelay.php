<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DataAosDelay extends Component
{
    public string $span;
    public string $title;
    public string $icon1;

    /**
     * Create a new component instance.
     */
    public function __construct(string $span=null, string $title, string $icon1)
    {
        $this->span = $span;
        $this->title = $title;
        $this->icon1 = $icon1;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.data-aos-delay');
    }
}