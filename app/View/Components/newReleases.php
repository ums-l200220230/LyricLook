<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class newReleases extends Component
{
    /**
     * Create a new component instance.
     */

    public $newReleases;
    
    public function __construct($newReleases)
    {
        $this-> newReleases = $newReleases;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.new-releases');
    }
}
