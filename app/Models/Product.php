<?php

namespace App\Models;

use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    static public function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->where('archive','=',0)->count();
    }

    static public function getProduct()
    {
        return self::select('products.*','users.name as created_by_name')
                ->join('users','users.id','=','products.created_by')
                ->where('products.archive','=',0)
                ->orderBy('products.id','desc')
                ->get();
    }

    static public function showProduct($category_id='', $sub_category_id='')
    {
        $return = Product::select('products.*','users.name as created_by_name','category.name as category_name','category.slug as category_slug','sub_category.name as sub_category_name','sub_category.slug as sub_category_slug')
                ->join('users','users.id','=','products.created_by')
                ->join('category','category.id','=','products.category_id')
                ->join('sub_category','sub_category.id','=','products.sub_category_id');
                if(!empty($category_id))
                {
                    $return = $return->where('products.category_id', $category_id);
                }
                if(!empty($sub_category_id))
                {
                    $return = $return->where('products.sub_category_id', $sub_category_id);
                }

                // Filter SubCategory
                // if(!empty(Request::get('category_id')))
                // {
                //     $sub_category_id = rtrim(Request::get('category_id'), ',');
                //     dd($sub_category_id);
                // }
                $return = $return->where('products.status','=',0)
                ->where('products.archive','=',0)
                ->orderBy('products.id','desc')
                ->paginate(10);

        return $return;
    }


    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function productImage($product_id)
    {
        return ProductImage::where('product_id', $product_id)->orderBy('order_by', 'asc')->first();
    }
    public static function getById($id)
    {
        return static::where('id', $id)->update(['archive' => 1]);
    }

    public function getColor()
    {
        return $this->hasMany(ProductColor::class, 'product_id');
    }


    public function getSize()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }

    public function getImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id')->orderBy('order_by', 'asc');
    }

}
