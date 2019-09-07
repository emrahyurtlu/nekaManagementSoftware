<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function brand()
    {
        return $this->hasOne('App\Models\Brand', 'id', 'brand_id');
    }

    public function massUnit()
    {
        return $this->hasOne('App\Models\MassUnit', 'id', 'mass_unit_id');
    }
}
