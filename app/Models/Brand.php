<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brand';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getBrand()
    {
        return self::select('brand.*','users.name as created_by_name')
                ->join('users','users.id','=','brand.created_by')
                ->where('brand.archive','=',0)
                ->orderBy('brand.id','desc')
                ->get();
    }

    public static function getById($id)
    {
        return static::where('id', $id)->update(['archive' => 1]);
    }
}
