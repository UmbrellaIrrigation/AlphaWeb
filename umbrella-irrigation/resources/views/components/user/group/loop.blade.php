@foreach ($childGroups as $group)
    <option value="{{ $group->id }}">{{ $space }}{{ $group->name }}</option>
    @if (count($group->getChildGroups)) 
        @include('components.user.group.loop', ['childGroups' => $group->getChildGroups, 'space' => '&nbsp;&nbsp;'.$space]) 
    @endif
@endforeach