<?php

namespace App\View\Components\Form;
// Correct namespace and capitalization

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $type;
    public $value;
    public $placeholder;
    public $label;
    public $required;
    public $class;

    public function __construct(
        $name,
        $type = 'text',
        $value = '',
        $placeholder = '',
        $label = null,
        $required = false,
        $class = 'form-control'
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->required = $required;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input'); // Corrected view path
    }
}