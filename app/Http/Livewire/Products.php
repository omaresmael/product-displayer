<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Products extends Component
{
    public array $products = [];
    public function mount() :void
    {
        $this->products = Product::select(['id','name','price','category_id'])->with('category:id,name')->get()->toArray();
    }
    public function render() : View
    {
        return view('livewire.products');
    }
}
