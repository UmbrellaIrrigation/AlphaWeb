<?php

namespace App;
use Illuminate\Support\Facades\DB;
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
        'name', 'description', 'email', 'password', 'permission',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','permission'
    ];
    public function user_groups() //fetch collection of user's groups by using $user->user_groups
    {
        return $this->belongsToMany(UserGroup::class,'user_to_group');
    }
    public function isAdmin()
    {
        return $this->permission == 3;
    }
    public function isEmployee()
    {
        return $this->permission == 2;
    }
    public static function getAllUsers() //return all other users (can add additional constraints at calltime)
    {
        return User::where('id','!=',Auth::user()->id)->get();
    }
    public static function getAdmins()
    {
        return User::where('permission','=',3)->where('id','!=',Auth::user()->id)->get();
    }
    public static function getEmployees()
    {
        return User::where('permission','=',2)->where('id','!=',Auth::user()->id)->get();
    }
    public static function getGuests()
    {
        return User::where('permission','=',1)->where('id','!=',Auth::user()->id)->get();
    }
    public function getAssocGroups()
    {
        return $this->user_groups;
    }
    public static function getUngroupedUsers()
    {
        $ids = DB::table('user_to_group')->pluck('user_id');
        $users = User::all()->keyBy('id');
        foreach($ids as $id)
        {
            $users->pull($id);
        }
        return $users;
    }
}
