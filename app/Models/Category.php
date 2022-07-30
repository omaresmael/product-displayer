<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class,'parent_id');
    }

    public static function productsForParent(int $parentId): Collection
    {
        $subCategories = self::query()
            ->where('parent_id', $parentId)->get();

        $subIds = $subCategories->map(function ($category){
           return $category->id;
        })->toArray();

        return Product::query()
            ->whereIn('category_id', $subIds)->get();
    }
}
