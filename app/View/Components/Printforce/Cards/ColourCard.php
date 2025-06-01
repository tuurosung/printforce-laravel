<?php

namespace App\View\Components\Printforce\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ColourCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = 'Card Title',
        public float|int $value = 0,
        public string $bgColour = 'primary',
        public $link = '#'
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.printforce.cards.colour-card');
    }
}
