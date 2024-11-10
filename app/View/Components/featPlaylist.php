<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class featPlaylist extends Component
{
    /**
     * Create a new component instance.
     */
    public $featPlaylist;

    public function __construct($featPlaylist)
    {
        $this->featPlaylist = $featPlaylist;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.feat-playlist');
    }
}
