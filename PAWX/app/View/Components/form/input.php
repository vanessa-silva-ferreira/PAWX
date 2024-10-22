<?php

namespace App\View\Components\Form; // Correct namespace and capitalization

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $ref;          // Property for the reference name
    public $title;        // Property for the label title
    public $val;          // Property for the value
    public $placeholder;  // Property for the placeholder text
    public $class;        // Property for additional classes

    /**
     * Create a new component instance.
     *
     * @param string $ref
     * @param string|null $title
     * @param string|null $val
     * @param string|null $placeholder
     * @param string|null $class
     */
    public function __construct($ref, $title = null, $val = null, $placeholder = null, $class = null)
    {
        $this->ref = $ref;
        $this->title = $title;
        $this->val = $val;
        $this->placeholder = $placeholder;
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
