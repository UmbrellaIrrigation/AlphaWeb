@foreach ($childGroups as $group)
    @if(!isset($usergroup))
        <option value="{{ $group->id }}">{{ $space }}{{ $group->name }}</option>
    @endif
    @if(isset($usergroup) && $usergroup->id != $group->id && ($usergroup->getParentGroup==null || $usergroup->getParentGroup->id != $group->id))
        <option value="{{ $group->id }}">{{ $space }}{{ $group->name }}</option>
    @endif
    @if (count($group->getChildGroups))
        @include('components.user.group.loop', ['childGroups' => $group->getChildGroups, 'space' => '&nbsp;&nbsp;'.$space])
    @endif
@endforeach
