<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Product extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public static function productsForParent(int $parentId): Collection
    {
        $subCategories = Category::query()
            ->where('parent_id', $parentId)->get();

        $subIds = $subCategories->map(function ($category){
            return $category->id;
        })->toArray();

        return self::query()
            ->whereIn('category_id', $subIds)->with('category:id,name')->get();
    }
}
