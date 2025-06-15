<?php

namespace App\View\Components\Printforce\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormModal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $modalId = 'defaultModalId',
        public string $modalTitle = 'Default Modal Title',
        public string $modalSize = 'modal-md', // Default size can be 'modal-sm', 'modal-lg', etc.
        public string $formType = 'create', // Can be 'create' or 'edit'
        public string $btnLabel = 'Save',
        public ?string $action = null // Action URL for the form submission
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.printforce.modals.form-modal');
    }
}
