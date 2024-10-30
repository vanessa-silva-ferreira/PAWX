<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class checkbox extends Component
{
    public $name;
    public $value;
    public $checked;
    public $label;

    public function __construct($name, $value = null, $checked = false, $label = '')
    {
        $this->name = $name;
        $this->value = $value;
        $this->checked = $checked;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..form.checkbox');
    }
}
