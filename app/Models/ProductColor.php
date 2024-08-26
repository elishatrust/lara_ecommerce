<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductColor extends Model
{
    use HasFactory;

    protected $table = 'product_color';

    ## Delete productID if exist
    static public function deleteProduct($product_id)
    {
        return self::where('product_id', '=', $product_id)->delete();
    }

}
