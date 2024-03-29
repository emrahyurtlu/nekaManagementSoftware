<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function isUsed()
    {
        $product = Product::all()->where('category_id', '==', $this->id);
        return $product->isNotEmpty();
    }

    public function scopeSubCategories($query)
    {
        return $query->where('parent_id', '=', $this->id)->get();
        // return Category::all()->where('parent_id', '==', $this->id);
    }

    public function scopeRootCategories($query)
    {
        return $query->where('parent_id', '=', 0)->get();
        //return Category::all()->where('parent_id', '==', 0);
    }

    public function rootCategory()
    {
        return Category::all()->where('id', '==', $this->parent_id)->first();
    }

    public function root()
    {
        return $this->hasOne('App\Models\Category', 'id', 'parent_id');
    }
}
