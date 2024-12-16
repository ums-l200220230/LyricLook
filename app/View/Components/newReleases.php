<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class newreleases extends Component
{
    /**
     * Create a new component instance.
     */

    public $newreleases;
    
    public function __construct($newreleases)
    {
        $this-> newreleases = $newreleases;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.new-releases');
    }
}
