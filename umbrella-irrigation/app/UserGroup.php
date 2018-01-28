<?php
namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
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
        $rootGroups = UserGroup::getRootGroups();
        $jsonUserTree = array();

        foreach($rootGroups as $userGroup)
        {
            $id = $userGroup->id;

            $groupData = UserGroup::convertGroupToData($userGroup);
            $jsonUserTree[$id] = $groupData;

            UserGroup::recursiveChildGroups($jsonUserTree[$id]["child_groups"], $userGroup);
        }

        return json_encode($jsonUserTree, JSON_PRETTY_PRINT);
    }

    private static function recursiveChildGroups(& $childGroupArray, $userGroup)
    {
        $childGroups = $userGroup->getChildGroups()->get();
        if($childGroups->count() > 0)
        {

            foreach($childGroups as $childGroup)
            {
                $id = $childGroup->id;
                $childGroupData = UserGroup::convertGroupToData($childGroup);
                $childGroupArray[$id] = $childGroupData;
                UserGroup::recursiveChildGroups($childGroupArray[$id]["child_groups"], $childGroup);
            }
        }

        return;
    }

    private static function convertGroupToData($userGroup)
    {
        $pid = $userGroup->parent_id;
        $name = $userGroup->name;
        $groupData = array("parent_id" => $pid, "name" => $name, "child_groups" => array(), "users" => array());

        $usersArray = & $groupData["users"];

        $users = $userGroup->getChildUsers()->get();

        foreach($users as $user)
        {
            $usersArray[$user->id] = array
            (
                "name"=>$user->name,
                "description"=>$user->description,
                "permission"=>$user->permission
            );
        }

        return $groupData;
    }

}