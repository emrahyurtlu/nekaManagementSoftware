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
}
