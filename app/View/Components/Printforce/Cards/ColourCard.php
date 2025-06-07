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
        public $link = '#',
        public $valueType = 'money'
    )
    {
        // if the provided value is neither a float nor an int, default to 0
        // if (!is_float($value) && !is_int($value)) {
        //     $this->value = 0;
        // }

        // if the valueType is money, format the value as a currency
        if ($this->valueType === 'money') {
            $this->value = 'GHS '. number_format($this->value, 2);
        } elseif ($this->valueType === 'count') {
            $this->value = number_format($this->value);
        } elseif ($this->valueType === 'percentage') {
            $this->value = number_format($this->value, 2) . '%';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.printforce.cards.colour-card');
    }
}
