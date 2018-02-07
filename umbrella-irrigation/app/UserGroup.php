<?php
namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use App\UserGroupTree;
class UserGroup extends Model
{

    public static function boot()
    {
      parent::boot();
      self::creating(function ($model) {
        $model->id = (string) Uuid::generate(4);
        });
    }

    public $incrementing = false;
    
    protected $fillable = [
        'name', 'parent_id'
    ];

    public static function getAllGroups()
    {
        return UserGroup::all();
    }

    public static function getRootGroups()
    {
        return UserGroup::where('parent_id',null)->get();
    }

    public function getChildUsers() //fetch collection of group's users by calling $group->users
    {
        return $this->belongsToMany(User::class,'user_to_group');
    }
    
    public function getChildGroups()
    {
        return $this->hasMany(UserGroup::class, 'parent_id');
    }

    public function getParentGroup()
    {
        return $this->belongsTo(UserGroup::class, 'parent_id');
    }

    public static function getUserGroupTree()
    {
        $groupTree = new UserGroupTree();
        $jsonTree = $groupTree->createTree(UserGroup::getRootGroups());

        return $jsonTree;
    }

}