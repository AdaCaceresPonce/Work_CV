<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Badge extends Component
{
    /**
     * Create a new component instance.
     */

    public $type;
    public $url;
    public $isLink;

    public function __construct($type = 'simple', $url = '#', $isLink = true)
    {
        $this->type = $type;
        $this->url = $url;
        $this->isLink = $isLink;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.badge');
    }
}
