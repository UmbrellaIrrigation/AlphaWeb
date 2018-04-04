<?php
namespace App;
use App\Tree;

class UserGroupTree
{
    public static function createTree($rootGroups)
    {
        $jsonTree = array();

        foreach($rootGroups as $group)
        {

            $groupData = UserGroupTree::convertGroupToData($group);

            UserGroupTree::recursiveChildGroups($groupData, $group);

            array_push($jsonTree, $groupData);
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
                $childGroupData = UserGroupTree::convertGroupToData($childGroup);

                UserGroupTree::recursiveChildGroups($childGroupData, $childGroup);
                array_push($groupData["child_groups"], $childGroupData);
            }
        }

        return;
    }

    private static function convertGroupToData($userGroup)
    {
        $dataArray = $userGroup->toArray();
        $dataArray["child_groups"] = array();
        $dataArray["users"] = array();

        $objArray = & $dataArray["users"];

        $users = $userGroup->getChildUsers()->get();

        foreach($users as $user)
        {
            $objArray[$user->id] = $user->toArray();
        }
       // eval(\Psy\sh());
        return $dataArray;
    }

}