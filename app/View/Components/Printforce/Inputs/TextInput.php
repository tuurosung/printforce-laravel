<?php

namespace App\View\Components\Printforce\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label,
        public string $id = '',
        public string $placeholder = '',
        public $value = '',
        public bool $readonly = false,
        public bool $required = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.printforce.inputs.text-input');
    }
}
