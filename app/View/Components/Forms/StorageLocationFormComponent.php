<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StorageLocationFormComponent extends Component
{
    public string $name;
    public string $metod;
    public string $methodAttribute;
    public string $action;
    public string $massiv;
    public string $massiv_name_id;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $name,
        $metod='post',
        $methodAttribute = '',
        $action,
        $massiv='divisions',
        $massiv_name_id='division_id'
    )
    {
        $this->name=$name;
        $this->metod=$metod;
        $this->methodAttribute = $methodAttribute;
        $this->action = $action;
        $this->massiv=$massiv;
        $this->massiv_name_id=$massiv_name_id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.storage-location-form-component');
    }
}
