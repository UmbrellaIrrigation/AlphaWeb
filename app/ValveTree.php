<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ValveGroup;
use App\Valve;
class ValveTree extends Model
{
    public static function getTree()
    {
        $groupTree = new ValveTree();
        $jsonTree = $groupTree->createTree(ValveGroup::getRootGroups(), Valve::getRootValves());

        return $jsonTree;   	
    }

    public static function getSpecificTree($valveGroup)
    {
    	$valveGroup = ValveGroup::find($userGroup);
    	if($valveGroup)
    	{
    		$groupTree = new ValveGroup();
    		$parentGroup = $valveGroup->first()->getParentGroup;
    		$rootValves = $parentGroup->getChildValves()->get();
    		$jsonTree = $groupTree->createTree($valveGroup, $rootValves);

    		return $jsonTree;

    	}

    	return NULL;	

    }

    private static function createTree($rootGroups, $rootValves)
    {
        $jsonTree = array();

        foreach($rootGroups as $group)
        {

            $groupData = ValveTree::convertGroupToData($group);

            ValveTree::recursiveChildGroups($groupData, $group);

            array_push($jsonTree, $groupData);
        }

        foreach($rootValves as $valve){
            array_push($jsonTree, $valve->toArray());
        }

        return json_encode($jsonTree);
    }

    private static function recursiveChildGroups(& $groupData, $group)
    {
        $childGroups = $group->getChildGroups()->get();

        if($childGroups->count() > 0)
        {

            foreach($childGroups as $childGroup)
            {
                $childGroupData = ValveTree::convertGroupToData($childGroup);

                ValveTree::recursiveChildGroups($childGroupData, $childGroup);
                array_push($groupData["children"], $childGroupData);
            }
        }

        return;
    }

    private static function convertGroupToData($valveGroup)
    {
        $dataArray = $valveGroup->toArray();
        $dataArray["children"] = array();

        $valves = $valveGroup->getChildValves()->get();

        foreach($valves as $valve)
        {
            //$objArray[$user->id] = $user->toArray();
            array_push($dataArray["children"], $valve->toArray());
        }
       // eval(\Psy\sh());
        return $dataArray;
    }
}
