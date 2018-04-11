<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserGroup;
use App\User;
class UserTree extends Model
{
    public static function getTree()
    {
        $groupTree = new UserTree();
        $jsonTree = $groupTree->createTree(UserGroup::getRootGroups(), User::getRootUsers());

        return $jsonTree;   	
    }

    public static function getSpecificTree($userGroup)
    {
    	$userGroup = UserGroup::find($userGroup);
    	if($userGroup)
    	{
    		$groupTree = new UserTree();
    		$parentGroup = $userGroup->first()->getParentGroup;
    		$rootUsers = $parentGroup->getChildUsers()->get();
    		$jsonTree = $groupTree->createTree($userGroup, $rootUsers);

    		return $jsonTree;

    	}

    	return NULL;	

    }

    private static function createTree($rootGroups, $rootUsers)
    {
        $jsonTree = array();

        foreach($rootGroups as $group)
        {

            $groupData = UserTree::convertGroupToData($group);

            UserTree::recursiveChildGroups($groupData, $group);

            array_push($jsonTree, $groupData);
        }

        foreach($rootUsers as $user){
            array_push($jsonTree, $user->toArray());
        }

        return json_encode($jsonTree, JSON_PRETTY_PRINT);
    }

    private static function recursiveChildGroups(& $groupData, $group)
    {
        $childGroups = $group->getChildGroups()->get();

        if($childGroups->count() > 0)
        {

            foreach($childGroups as $childGroup)
            {
                $childGroupData = UserTree::convertGroupToData($childGroup);

                UserTree::recursiveChildGroups($childGroupData, $childGroup);
                array_push($groupData["children"], $childGroupData);
            }
        }

        return;
    }

    private static function convertGroupToData($userGroup)
    {
        $dataArray = $userGroup->toArray();
        $dataArray["children"] = array();
        //$dataArray["users"] = array();

        //$objArray = & $dataArray["users"];

        $users = $userGroup->getChildUsers()->get();

        foreach($users as $user)
        {
            //$objArray[$user->id] = $user->toArray();
            array_push($dataArray["children"], $user->toArray());
        }
       // eval(\Psy\sh());
        return $dataArray;
    }
}
