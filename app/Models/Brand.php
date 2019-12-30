<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function isUsed()
    {
        $product = Product::all()->where('brand_id', '==', $this->id);
        return $product->isNotEmpty();
    }
}
