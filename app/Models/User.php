<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'status',
        'archive',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    static function getAdmin()
    {
        return User::select('users.*')
            ->where('role', '=', '1')
            ->where('archive', '=', '0')
            ->orderBy('id', 'desc')
            ->get();
    }

    static function getSingle($id)
    {
        // return User::select('users.*')->where('id', '=', $id)->first();
        return User::find($id);
    }

    // public function getUpdateSingle($slug)
    // {
    //     return DB::table('users')->where(['id'=>$slug])->update(['archive'=>1]);
    // }

    public static function getById($id)
    {
        return static::where('id', $id)->update(['archive' => 1]);
    }

}
