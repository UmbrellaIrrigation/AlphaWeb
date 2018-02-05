<?php
namespace App;
use App\Tree;
Use App\TreeInterface;
class UserGroupTree extends Tree implements TreeInterface
{

    private static function convertGroupToData($userGroup)
    {
        $dataArray = $userGroup->toArray();
        $dataArray["child_groups"] = array();
        $dataArray["users"] = array();

        $objArray = & $groupData["users"];

        $users = $userGroup->getChildUsers()->get();

        foreach($users as $user)
        {
            $objArray[$user->id] = $user->toArray();
        }

        return $groupData;
    }

}