@extends ('layouts.simple')

@section ('content')
    <form method="" action="">
        <h3 data-editable data-type="text" data-name="name">{{ $usergroup->name }}</h3>
        
        <hr>

        <div class="form-group">
            <label for="parent_id">Parent User Group</label>
            <select class="form-control" id="parent_id" name="parent_id">
                @if (count($usergroup->getParentGroup))
                    <option value="{{ $usergroup->getParentGroup->id }}" selected>{{ $usergroup->getParentGroup->name }}</option>
                @else
                    <option value="None" selected>None</option>
                @endif

                @foreach ($rootGroups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @if (count($group->getChildGroups)) 
                        @include('components.user.group.loop', ['childGroups' => $group->getChildGroups, 'space' => '&#x02514;&nbsp;']) 
                    @endif
                @endforeach
            </select>
        </div>
        
        <hr>

    </form>
@endsection