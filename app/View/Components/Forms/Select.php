<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{
    public $options;
    public $selected;
    public bool $isSubmit;
    public string $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options, $selected, $isSubmit = true, $name = "type_evidence")
    {
        $this->options = $options;
        $this->selected = $selected;
        $this->isSubmit = $isSubmit;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
