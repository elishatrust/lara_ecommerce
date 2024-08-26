<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_image';

    ## Delete productID if exist
    static public function deleteProduct($product_id)
    {
        return self::where('product_id', '=', $product_id)->delete();
    }


    public static function getById($id)
    {
        return self::where('id', $id)->delete();
    }

    static function getSingle($id)
    {
        return ProductImage::find($id);
    }

    public function listImage()
    {
        if(!empty($this->name) && file_exists('uploads/product/'.$this->name))
        {
            return url('uploads/product/'.$this->name);
        }else
        {
            return '';
        }
    }
}
