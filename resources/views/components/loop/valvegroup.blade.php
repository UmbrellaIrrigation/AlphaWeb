@foreach ($childGroups as $group)
    @if(!isset($valvegroup))
        <option value="{{ $group->id }}">{{ $space }}{{ $group->name }}</option>
    @endif
    @if(isset($valvegroup) && $valvegroup->id != $group->id && ($valvegroup->getParentGroup==null || $valvegroup->getParentGroup->id != $group->id))
        <option value="{{ $group->id }}">{{ $space }}{{ $group->name }}</option>
    @endif
    @if (count($group->getChildGroups))
        @include('components.loop.valvegroup', ['childGroups' => $group->getChildGroups, 'space' => '&nbsp;&nbsp;'.$space])
    @endif
@endforeach
