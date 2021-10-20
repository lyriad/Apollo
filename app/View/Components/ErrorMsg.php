<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ErrorMsg extends Component
{
    var $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.error-msg');
    }
}
