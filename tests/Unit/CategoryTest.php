<?php

use App\Models\Category;

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
    $this->subCategory5 = Category::factory()->create([
        'parent_id' => $this->parentCategory2->id,
    ]);
});

it('fetches parent categories with their subcategories', function(){

    $categories = Category::with('subCategories')->where('parent_id', '=', null)->get()->toArray();
    $this->assertCount(2,$categories);
    $this->assertCount(2,$categories[0]['sub_categories']);
    $this->assertCount(3,$categories[1]['sub_categories']);

});
