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
    public static function getUsers() //return all other users (for admins)
    {
        return User::where('id','!=',Auth::user()->id)->get();
    }
    public function getGroups() //fetch collection of user's groups by using $user->user_groups
    {
        return $this->belongsToMany(UserGroup::class,'user_to_group')->get();
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
