<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'color';

    static public function getColor()
    {
        return self::select('color.*')->where('archive', 0)->orderBy('id','desc')->get();
    }
    static public function getActiveColor()
    {
        return self::select('color.*')->where('archive',0)->where('status',0)->orderBy('name','asc')->get();
    }

    static function getSingle($id)
    {
        return Color::find($id);
    }

    public static function getById($id)
    {
        return static::where('id', $id)->update(['archive' => 1]);
    }


}
