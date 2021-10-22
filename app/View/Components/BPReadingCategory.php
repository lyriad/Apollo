<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BPReadingCategory extends Component
{
    public $text_color;
    public $bg_color;
    public $category;

    public $px;
    public $py;
    public $rounded;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $category, string $size = 'md')
    {
        switch ($size) {
            case 'md':
                $this->px = 2;
                $this->py = 1;
                $this->rounded = 'rounded-full';
                break;

            case 'lg':
                $this->px = 5;
                $this->py = 3;
                $this->rounded = 'rounded-md';
                break;
        }

        switch ($category) {
            case 'normal':
                $this->text_color = 'text-black';
                $this->bg_color = 'bg-green-100';
                $this->category = 'Normal';
                break;
            
            case 'elevated':
                $this->text_color = 'text-black';
                $this->bg_color = 'bg-yellow-100';
                $this->category = 'Elevated';
                break;
            
            case 'high_s1':
                $this->text_color = 'text-white';
                $this->bg_color = 'bg-yellow-500';
                $this->category = 'High Stage 1';
                break;

            case 'high_s2':
                $this->text_color = 'text-white';
                $this->bg_color = 'bg-yellow-700';
                $this->category = 'High Stage 2';
                break;

            case 'high_s2':
                $this->text_color = 'text-white';
                $this->bg_color = 'bg-red-700';
                $this->category = 'Hypertensive Crisis';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bp-reading-category');
    }
}
