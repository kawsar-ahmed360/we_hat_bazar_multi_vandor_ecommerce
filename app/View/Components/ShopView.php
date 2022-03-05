<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShopView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $allshop;
    public function __construct($allshop)
    {
        $this->allshop = $allshop;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shop-view');
    }
}
