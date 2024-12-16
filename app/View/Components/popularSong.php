<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class popularsong extends Component
{
    /**
     * Create a new component instance.
     */
    public $popularsong;
    public function __construct($popularsong)
    {
        $this-> popularsong = $popularsong;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.popularsong');
    }
}
