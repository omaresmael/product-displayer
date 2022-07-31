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


})->only();


it('renders all the products of the parent category',function(){

});

it('renders all the products of the subcategory',function(){

});

