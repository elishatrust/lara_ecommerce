<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    static public function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->where('archive','=',0)->count();
    }

    static public function getProduct()
    {
        return self::select('product.*','users.name as created_by_name')
                ->join('users','users.id','=','product.created_by')
                ->where('product.archive','=',0)
                ->orderBy('product.id','desc')
                ->get();
    }
}
