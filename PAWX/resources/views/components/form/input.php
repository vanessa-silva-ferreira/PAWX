<?php

namespace App\View\Components\Form; // Ensure this matches the directory structure

use Illuminate\View\Component;

class Input extends Component
{
    public $ref;
    public $title;
    public $val;
    public $placeholder;
    public $class;

    public function __construct($ref, $title = null, $val = null, $placeholder = null, $class = null)
    {
        $this->ref = $ref;
        $this->title = $title;
        $this->val = $val;
        $this->placeholder = $placeholder;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.form.input'); // Ensure this matches the view location
    }
}
