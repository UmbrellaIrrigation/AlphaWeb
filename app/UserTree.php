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
        $jsonTree = $groupTree->createTree(UserGroup::getRootGroups(), User::getRootUsers(), true);

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
    		$jsonTree = $groupTree->createTree($userGroup, $rootUsers, true);

    		return $jsonTree;

    	}

    	return NULL;	

    }

    public static function getGroupTree()
    {
        $groupTree = new UserTree();
        $jsonTree = $groupTree->createGroupTree(UserGroup::getRootGroups(), false);

        return $jsonTree;
    }

    private static function createGroupTree($rootGroups, $withChildren)
    {
        $jsonTree = array();

        foreach($rootGroups as $group)
        {
            $groupData = UserTree::convertGroupToData($group, $withChildren);
            UserTree::recursiveChildGroups($groupData, $group, false);

            array_push($jsonTree, $groupData);
        }

        return json_encode($jsonTree);
    }

    private static function createTree($rootGroups, $rootUsers, $withChildren)
    {
        $jsonTree = array();

        foreach($rootGroups as $group)
        {

            $groupData = UserTree::convertGroupToData($group, $withChildren);

            UserTree::recursiveChildGroups($groupData, $group, $withChildren);

            array_push($jsonTree, $groupData);
        }

        foreach($rootUsers as $user){
            array_push($jsonTree, $user->toArray());
        }

        return json_encode($jsonTree);
    }

    private static function recursiveChildGroups(& $groupData, $group, $withChildren)
    {
        $childGroups = $group->getChildGroups()->get();

        if($childGroups->count() > 0)
        {

            foreach($childGroups as $childGroup)
            {
                $childGroupData = UserTree::convertGroupToData($childGroup, $withChildren);

                UserTree::recursiveChildGroups($childGroupData, $childGroup, $withChildren);
                array_push($groupData["children"], $childGroupData);
            }
        }

        return;
    }

    private static function convertGroupToData($userGroup, $withChildren)
    {
        $dataArray = $userGroup->toArray();
        $dataArray["children"] = array();
        //$dataArray["users"] = array();

        //$objArray = & $dataArray["users"];

        $users = $userGroup->getChildUsers()->get();

        if($withChildren)
        {
            foreach($users as $user)
            {
                //$objArray[$user->id] = $user->toArray();
                array_push($dataArray["children"], $user->toArray());
            }
        }

       // eval(\Psy\sh());
        return $dataArray;
    }
}
