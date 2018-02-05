<?php
namespace App;
interface TreeInterface
{
	public function createTree($rootGroups);
	public function recursiveChildGroups(& $groupData, $group);
	private function convertGroupToData($group);
}
