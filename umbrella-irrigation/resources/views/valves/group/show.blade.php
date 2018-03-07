@extends ('layouts.simple')

@section ('modal')
    @include ('components.delete')
@endsection

@section ('content')
    <form method="" action="">
        <h3 data-editable data-type="text" data-name="name">{{ $valvegroup->name }}</h3>

        <hr>

        <div class="form-group">
            @if($valvegroup->getParentGroup != null)
                <label for="parent_id">Parent Valve Group: <b>{{$valvegroup->getParentGroup->name}}</b></label>
            @else
                <label for="parent_id">Parent Valve Group: <b>None</b></label>
            @endif
            <select class="form-control" id="parent_id" name="parent_id">
            <option value="None" selected>None</option>
                @foreach ($rootGroups as $group)
                    @if($group->id != $valvegroup->id && ($valvegroup->getParentGroup==null || $valvegroup->getParentGroup->id != $group->id))
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @if (count($group->getChildGroups))
                            @include('components.valve.group.loop', ['childGroups' => $group->getChildGroups, 'valvegroup'=>$valvegroup, 'currGroup' => $group, 'space' => '&#x02514;&nbsp;'])
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <hr>

        <a href="#deleteModal" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-block btn-lg">Delete Group</a>

    </form>

@endsection
