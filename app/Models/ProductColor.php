<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $table = 'product_color';

    ## Delete productID if exist
    static public function deleteProduct($productID)
    {
        return self::where('product_id', '=', $productID)->delete();
    }
}
