<?php

namespace App\Models;

use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
                // ->paginate(2);
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
    public static function getById($id)
    {
        return static::where('id', $id)->update(['archive' => 1]);
    }

    static public function getColor()
    {
        return $this->hasMany(ProductColor::class, "product_id");
    }

}
