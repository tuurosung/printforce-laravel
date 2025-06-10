<?php

namespace App\View\Components\Printforce\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuHasSub extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $menuText = '',
        public string $menuIcon = '',
        public array $submenus = [],
        public bool $isActive = false,
        public string $iconType = '',
    )
    {
        $this->isActive = $this->evaluateRoute();
    }


    public function evaluateRoute()
    {

        // check if the current route contains any route in the submenus
        foreach ($this->submenus as $submenu) {
            if (url()->current() === $submenu['route']) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.printforce.sidebar.menu-has-sub');
    }
}
