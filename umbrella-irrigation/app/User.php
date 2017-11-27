<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Webpatser\Uuid\Uuid;
class User extends Authenticatable
{
    public static function boot()
    {
      parent::boot();
      self::creating(function ($model) {
        $model->id = (string) Uuid::generate(4);
        });
    }
    public $incrementing = false;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','permission'
    ];
    public function isAdmin()
    {
        return $this->permission == 3;
    }
    public function isEmployee()
    {
        return $this->permission == 2;
    }
    public static function getUsers()
    {
        return User::where('id','!=',Auth::user()->id)->get();
    }
    public function user_groups() //fetch collection of user's groups by using $user->user_groups
    {
        return $this->belongsToMany(UserGroup::class,'user_to_group');
    }
}
