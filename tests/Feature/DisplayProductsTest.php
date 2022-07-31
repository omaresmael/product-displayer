<?php

use App\Http\Livewire\Categories;
use App\Http\Livewire\Products;
use App\Models\Category;
use App\Models\Product;
use Livewire\Livewire;

beforeEach(function(){
    $this->parentCategory = Category::factory()->create();

    $this->subCategory1 = Category::factory()->create([
        'parent_id' => $this->parentCategory->id,
    ]);
    $this->subCategory2 = Category::factory()->create([
        'parent_id' => $this->parentCategory->id,
    ]);

    $this->parentCategory2 = Category::factory()->create();

    $this->subCategory3 = Category::factory()->create([
        'parent_id' => $this->parentCategory2->id,
    ]);
    $this->subCategory4 = Category::factory()->create([
        'parent_id' => $this->parentCategory2->id,
    ]);

    $this->product1 = Product::factory()->create([
        'category_id' => $this->subCategory1->id,
    ]);
    $this->product2 = Product::factory()->create([
        'category_id' => $this->subCategory2->id,
    ]);

    $this->product3 = Product::factory()->create([
        'category_id' => $this->subCategory3->id,
    ]);
    $this->product4 = Product::factory()->create([
        'category_id' => $this->subCategory3->id,
    ]);

    $this->product5 = Product::factory()->create([
        'category_id' => $this->subCategory4->id,
    ]);
    $this->product6 = Product::factory()->create([
        'category_id' => $this->subCategory4->id,
    ]);
});
it('renders all the products when visiting the page',function(){
    $response = $this->get('/');
    $response->assertOk();

    $response->assertSee($this->product1->name);
    $response->assertSee($this->product2->name);
    $response->assertSee($this->product3->name);
    $response->assertSee($this->product4->name);
    $response->assertSee($this->product5->name);
    $response->assertSee($this->product6->name);

    $response->assertSee($this->subCategory1->name);
    $response->assertSee($this->subCategory2->name);
    $response->assertSee($this->subCategory3->name);
    $response->assertSee($this->subCategory4->name);


});


it('renders all the products of the parent category',function(){
    Livewire::test(Categories::class)
        ->call('getProducts',$this->parentCategory->id,$this->parentCategory->parent_id)
        ->assertEmittedTo(Products::class,'getParentCategoryProducts');

    $products = Livewire::test(Products::class)
        ->call('getParentCategoryProducts',$this->parentCategory->id);

    $this->assertCount(2, $products->products);
    $this->assertEquals($this->product1->name, $products->products[0]['name']);
    $this->assertEquals($this->product2->name, $products->products[1]['name']);

});

it('renders all the products of the subcategory',function(){
    Livewire::test(Categories::class)
        ->call('getProducts',$this->subCategory1->id,$this->subCategory1->parent_id)
        ->assertEmittedTo(Products::class,'getCategoryProducts');

    $products = Livewire::test(Products::class)
        ->call('getCategoryProducts',$this->subCategory1->id);

    $this->assertCount(1, $products->products);
    $this->assertEquals($this->product1->name, $products->products[0]['name']);

    Livewire::test(Categories::class)
        ->call('getProducts',$this->subCategory3->id,$this->subCategory3->parent_id)
        ->assertEmittedTo(Products::class,'getCategoryProducts');

    $products = Livewire::test(Products::class)
        ->call('getCategoryProducts',$this->subCategory3->id);

    $this->assertCount(2, $products->products);
    $this->assertEquals($this->product3->name, $products->products[0]['name']);

});

it('render description for product',function(){
    Livewire::test(Products::class)
        ->call('getDescription',$this->product1->id)
        ->assertSee($this->product1->description);
});

