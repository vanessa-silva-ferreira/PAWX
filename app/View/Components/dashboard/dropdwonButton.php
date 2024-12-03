<?php

namespace App\View\Components\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class dropdwonButton extends Component
{
    public $icon;
    public $label;
    public $items;

    /**
     * Create a new component instance.
     *
     * @param string $icon
     * @param string $label
     * @param array $items
     */
    public function __construct($icon, $label, $items = [])
    {
        $this->icon = $icon;
        $this->label = $label;
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.dropdwon-button');
    }
}
