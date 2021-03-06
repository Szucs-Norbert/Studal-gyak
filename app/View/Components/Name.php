<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Name extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $message;
    public $name;
    public function __construct($message,$name)
    {
        $this->message=$message;
        $this->name=$name;
       
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.name');
    }
}
