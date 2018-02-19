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
            $model->description = "this is a default description.";
        });
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
            });
        self::saving(function ($model) {
            if(trim($model->description) == '')
                $model->description = "this is a default description";
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
        'name', 'description', 'email', 'password', 'permission', 'notification_preference'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    //many-to-many relationships

    public function user_groups() //fetch collection of user's groups by using $user->user_groups
    {
        return $this->belongsToMany(UserGroup::class,'user_to_group');
    }
    public function employee_to_guest()
    {
        return $this->belongsToMany(User::class,'employee_to_guest','employee_id','guest_id');
    }
    public function guest_to_employee()
    {
        return $this->belongsToMany(User::class,'guest_to_employee','guest_id','employee_id');
    }
    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    //functions
    public function getOverseenGuests()
    {
        return $this->employee_to_guest;
    }
    public function getOverseeingEmployees()
    {
        return $this->guest_to_employee;
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
        return $this->user_groups()->get();
    }
    public static function getRootUsers()
    {
        $ids = DB::table('user_to_group')->pluck('user_id');
        $users = User::all()->keyBy('id');
        foreach($ids as $id)
        {
            $users->pull($id);
        }
        return $users;
    }
    public function editName($newName)
    {
        $this->name = $newName;
    }
    public function editEmail($newEmail){
        
        $this->email = $newEmail;
    }
    public function editDescription($newDescription)
    {
        $this->description = $newDescription;
    }
    public function editPermission($newPermission)
    {
        $this->permission = $newPermission;
    }

    public function getPermission()
    {
        $permission = $this->permission;
        if($permission == 1)
            return "Guest";
        if($permission == 2)
            return "Employee";
        return "Administrator";
    }

    public function addToGroup(UserGroup $group) //call using $user->addToGroup($group);
    {
        $user = $this;
        $assocGroups = $user->getAssocGroups();
        if($assocGroups->contains('id',$group->id))
            return false;
        $user->user_groups()->attach($group);
        return true;
    }
    public function removeFromGroup(UserGroup $group) //call using $user->removeFromGroup($group);
    {
        $user = $this;
        $assocGroups = $user->getAssocGroups();
        if(!$assocGroups->contains('id',$group->id))
            return false;
        $user->user_groups()->detach($group);
        return true;
    }
}
