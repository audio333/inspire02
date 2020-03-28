<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Program extends Component
{
    public $programs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($programs)
    {
        //
        $this->programs = $programs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.program');
    }
}
