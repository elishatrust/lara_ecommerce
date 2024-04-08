<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_category';
    static function getSubCategory()
    {
        return SubCategory::select('sub_category.*')->where('archive', 0)->orderBy('id','desc')->get();
    }
    static function selectSubCategory($category_id)
    {
        return SubCategory::select('sub_category.*')->where('category_id', $category_id)->where('archive', 0)->where('status', 0)->orderBy('name','asc')->get();
    }
    static function getSingle($id)
    {
        return SubCategory::find($id);
    }

    public static function getById($id)
    {
        return static::where('id', $id)->update(['archive' => 1]);
    }
}
