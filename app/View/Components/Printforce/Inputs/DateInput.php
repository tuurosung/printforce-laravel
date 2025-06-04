<?php

namespace App\View\Components\Printforce\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DateInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label = '',
        public string $name = '',
        public string $id = '',
        public string|null $value = '',
        )
    {

        // if value is not provided, use today's date
        if (empty($value)) {
            $this->value = now()->format('Y-m-d');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.printforce.inputs.date-input');
    }
}
