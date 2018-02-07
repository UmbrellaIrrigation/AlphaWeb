@extends ('layouts.simple')

@section ('content')
    <form method="" action="">
        <h3 data-editable data-type="text" data-name="name">{{ $usergroup->name }}</h3>

        <hr>

        <div class="form-group">
            @if($usergroup->getParentGroup != null)
                <label for="parent_id">Parent User Group: <b>{{$usergroup->getParentGroup->name}}</b></label>
            @else
                <label for="parent_id">Parent User Group: <b>None</b></label>
            @endif
            <select class="form-control" id="parent_id" name="parent_id">
            <option value="None" selected>None</option>
                @foreach ($rootGroups as $group)
                    @if($group->id != $usergroup->id && ($usergroup->getParentGroup==null || $usergroup->getParentGroup->id != $group->id))
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @if (count($group->getChildGroups))
                            @include('components.user.group.loop', ['childGroups' => $group->getChildGroups, 'usergroup'=>$usergroup, 'currGroup' => $group, 'space' => '&#x02514;&nbsp;'])
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <hr>
    </form>
    <div class="container col-5">
        <a href="/users/group/delete/{{$usergroup->id}}" class="btn btn-primary btn-block btn-lg">Delete</a>
    </div>
@endsection
