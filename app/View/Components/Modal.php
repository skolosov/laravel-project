<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public string $modalId;
    public string $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $modalId,
        string $title
    ) {
        $this->modalId = $modalId;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
