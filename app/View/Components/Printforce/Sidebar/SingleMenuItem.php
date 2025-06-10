<?php

namespace App\View\Components\Printforce\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SingleMenuItem extends Component
{
    public $isActive;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $menuLink = 'javascript:void(0);',
        public string $menuIcon = 'payroll-check',
        public string $menuText = 'Menu Text'
    )
    {
        $this->isActive = $this->evaluateRoute();
    }


    private function evaluateRoute()
    {
        return url()->current() === $this->menuLink;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.printforce.sidebar.single-menu-item');
    }
}
