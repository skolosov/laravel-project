<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public string $labelTitle;
    public string $inputType;
    public string $placeholder;
    public string $nameInput;
    public string $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($inputType, $nameInput, $labelTitle = '', $placeholder = '', $value = '')
    {
        $this->labelTitle = $labelTitle;
        $this->inputType = $inputType;
        $this->placeholder = $placeholder;
        $this->nameInput = $nameInput;
        $this->value = $value;
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
