<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';


    static function getCategory()
    {
        return Category::select('category.*')->where('archive', 0)->orderBy('id','desc')->get();
    }
    static function getActiveCategory()
    {
        return Category::select('category.*')->where('status', 0)->where('archive', 0)->orderBy('name','asc')->get();
    }

    public function getActiveSubCategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id')->where('sub_category.status', 0)->where('sub_category.archive', 0)->orderBy('name', 'asc');
    }

    static function getSingle($id)
    {
        return Category::find($id);
    }

    public static function getById($id)
    {
        return static::where('id', $id)->update(['archive' => 1]);
    }

    static public function getSingleSlug($slug)
    {
        return Category::where('slug', $slug)->where('status', 0)->where('archive', 0)->first();
    }
}
