<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;

class sidebar extends Component
{   
    public $title;
    public $varibale;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $varibale)
    {
        $this->title = $title;
        $this->varibale = $varibale;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {   
        $products = $this->list();
        return view('components.sidebar', compact('products'));
    }
    public function list()
    {
        return  Product::all();
    }
}
