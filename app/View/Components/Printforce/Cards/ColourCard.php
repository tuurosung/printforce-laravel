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
        public $value = 0,
        public string $bgColour = 'primary',
        public $link = '#'
    )
    {
        // if the provided value is neither a float nor an int, default to 0
        // if (!is_float($value) && !is_int($value)) {
        //     $this->value = 0;
        // }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.printforce.cards.colour-card');
    }
}
