<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Products extends Component
{
    protected $listeners = ['getCategoryProducts','getParentCategoryProducts'];
    public array $products = [];
    public function mount() :void
    {
        $this->products = Product::select(['id','name','price','category_id'])->with('category:id,name')->get()->toArray();
    }
    public function render() : View
    {
        return view('livewire.products');
    }

    public function getCategoryProducts(int $categoryId) : void
    {
        $this->products = Product::select(['id','name','price','category_id'])
            ->where(['category_id' => $categoryId])
            ->with('category:id,name')->get()->toArray();
    }
    public function getParentCategoryProducts(int $categoryId) : void
    {
        $this->products = Product::productsForParent($categoryId)->toArray();
    }
    public function getDescription(int $productId) : void
    {
        $description = Product::where('id',$productId)->select('description')->value('description');

        foreach($this->products as $key => &$product) {
                if ($product['id'] == $productId) {

                    $product['description'] = $description;
                    unset($product);
                    break;
                }
        }
    }
}
