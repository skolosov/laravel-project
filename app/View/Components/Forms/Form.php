<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;


class Form extends Component
{
    public string $method;
    public string $methodAttribute;
    public string $action;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($method, $action, $methodAttribute = '')
    {
        $this->method = $method;
        $this->methodAttribute = $methodAttribute;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.form');
    }
}
