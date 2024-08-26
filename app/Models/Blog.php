<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    static public function getBlog()
    {
        return self::select('blogs.*', 'users.name as created_by_name')
            ->join('users','users.id','=','blogs.created_by')
            ->where('blogs.status',0)
            ->where('blogs.archive',0)
            ->orderBy('blogs.id','desc')
            ->get();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getById($id)
    {
        return self::where('id', $id)->update(['archive' => 1]);
    }
}
