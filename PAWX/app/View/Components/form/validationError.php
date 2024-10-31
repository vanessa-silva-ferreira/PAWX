<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class validationError extends Component
{
    public $name;

    /**
     * Create a new component instance.
     *
     * @param string $name The name of the input field to check for errors.
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.validation-error');
    }
}
