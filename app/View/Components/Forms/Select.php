<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{
    public $options;
    public $selected;
    public bool $isSubmit;
    public string $name;
    public string $labelTitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $options,
        $selected = null,
        $isSubmit = true,
        $name = "type_evidence",
        $labelTitle = ""
    ) {
        $this->options = $options;
        $this->selected = $selected;
        $this->isSubmit = $isSubmit;
        $this->name = $name;
        $this->labelTitle = $labelTitle;
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
