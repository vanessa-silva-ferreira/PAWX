<?php

namespace App\View\Components\action;

use Illuminate\View\Component;


class Logout extends Component
{
    public $route;
    public $type;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $route,
        $type,
    )
    {
        $this->route = $route;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.action.logout');
    }
}
