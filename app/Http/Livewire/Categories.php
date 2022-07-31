<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Categories extends Component
{
    public array $categories;
    public function mount(): void
    {
        $this->categories = Category::with('subCategories:id,name,parent_id')
            ->where('parent_id',null)->get()->toArray();
    }
    public function render(): View
    {
        return view('livewire.categories');
    }

    public function getProducts(int $categoryId,int $parentId = null): void
    {

        is_null($parentId) ?
            $this->emitTo('products','getParentCategoryProducts',$categoryId)
            : $this->emitTo('products','getCategoryProducts',$categoryId);

    }
}
