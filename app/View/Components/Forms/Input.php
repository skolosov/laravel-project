<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public string $labelTitle;
    public string $inputType;
    public string $placeholder;
    public string $nameInput;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($inputType, $nameInput, $labelTitle = '', $placeholder = '')
    {
        $this->labelTitle = $labelTitle;
        $this->inputType = $inputType;
        $this->placeholder = $placeholder;
        $this->nameInput = $nameInput;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
