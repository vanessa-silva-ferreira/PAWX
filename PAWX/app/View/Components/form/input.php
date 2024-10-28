<?php

namespace App\View\Components\Form; // Correct namespace and capitalization

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $type;
    public $value;
    public $placeholder;

    public function __construct($name, $type = 'text', $value = '', $placeholder = '')
    {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder; // Keep it here
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input'); // Corrected view path
    }
}
