<?php

use App\Models\Category;
use App\Models\Product;

beforeEach(function(){
   $this->parentCategory = Category::factory()->create();
   $this->subCategory1 = Category::factory()->create([
       'parent_id' => $this->parentCategory->id,
   ]);
    $this->subCategory2 = Category::factory()->create([
        'parent_id' => $this->parentCategory->id,
    ]);
    $this->product1 = Product::factory()->create([
       'category_id' => $this->subCategory1->id,
    ]);
    $this->product2 = Product::factory()->create([
        'category_id' => $this->subCategory2->id,
    ]);


});
it('fetches products for parent category', function () {
    $products = Product::ProductsForParent($this->parentCategory->id);
    $this->assertCount(2,$products);
});

it('fetches products for sub category', function () {
    $product = Category::find($this->subCategory1->id)->products;
    $this->assertCount(1,$product);
});


