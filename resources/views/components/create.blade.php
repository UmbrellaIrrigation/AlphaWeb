<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            @if (Request::is('users*'))

                <create-user />

            @elseif (Request::is('valves*'))

                <form method="POST" action="{{ route('valves.store') }}">
                    {{ csrf_field() }}

                <div class="modal-header">
                    <h5 class="modal-title">Create a New Valve</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="parent_id">Parent Valve ID:</label>
                        <input type="text" class="form-control" id="parent_id" name="parent_id" value="{{ old('parent_id') }}" >
                        @if ($errors->has('parent_id'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('parent_id') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                        @if ($errors->has('description'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('description') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude:</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}" required>
                        @if ($errors->has('latitude'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('latitude') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="longitude">Longitude:</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}" required>
                        @if ($errors->has('longitude'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('longitude') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="min_flow_limit">Minimum Flow Limit:</label>
                        <input type="text" class="form-control" id="min_flow_limit" name="min_flow_limit" value="{{ old('min_flow_limit') }}" required>
                        @if ($errors->has('min_flow_limit'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('min_flow_limit') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="max_flow_limit">Maximum Flow Limit:</label>
                        <input type="text" class="form-control" id="max_flow_limit" name="max_flow_limit" value="{{ old('max_flow_limit') }}" required>
                        @if ($errors->has('max_flow_limit'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('max_flow_limit') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="nominal_flow_limit">Nominal Flow Limit:</label>
                        <input type="text" class="form-control" id="nominal_flow_limit" name="nominal_flow_limit" value="{{ old('nominal_flow_limit') }}" required>
                        @if ($errors->has('nominal_flow_limit'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('nominal_flow_limit') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="curr_flow">Current Flow:</label>
                        <input type="text" class="form-control" id="curr_flow" name="curr_flow" value="{{ old('curr_flow') }}" required>
                        @if ($errors->has('curr_flow'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('curr_flow') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="max_gpm">Max Gallons/Min:</label>
                        <input type="text" class="form-control" id="max_gpm" name="max_gpm" value="{{ old('max_gpm') }}" required>
                        @if ($errors->has('max_gpm'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('max_gpm') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="min_voltage">Min Voltage:</label>
                        <input type="text" class="form-control" id="min_voltage" name="min_voltage" value="{{ old('min_voltage') }}" required>
                        @if ($errors->has('min_voltage'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('min_voltage') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="max_voltage">Max Voltage:</label>
                        <input type="text" class="form-control" id="max_voltage" name="max_voltage" value="{{ old('max_voltage') }}" required>
                        @if ($errors->has('max_voltage'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('max_voltage') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="curr_voltage">Current Voltage:</label>
                        <input type="text" class="form-control" id="curr_voltage" name="curr_voltage" value="{{ old('curr_voltage') }}" required>
                        @if ($errors->has('curr_voltage'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('curr_voltage') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="checkbox" class="form-control" id="normally_open" name="normally_open" value="1">
                        <label for="normally_open">Normally Open</label>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" class="form-control" id="is_parent" name="is_parent" value="1">
                        <label for="is_parent">Is Parent</label>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Valve</button>
                </div>

            </form>

            @endif

        </div>
    </div>
</div>

<div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog" aria-labelledby="createGroupModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            @if (Request::is('users*'))

                <create-user-group tree="create-group-tree" tree-route="{{ route('usergroup.tree') }}" />

            @elseif (Request::is('valves*'))

            <form method="POST" action="/">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h5 class="modal-title">Create a New Valve Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="parent_valve_gid">Parent Valve Group Id:</label>
                        <input type="number" class="form-control" id="parent_valve_gid" name="parent_valve_gid">
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Valve Group</button>
                    </div>
                </div>
            </form>

            @endif

        </div>
    </div>
</div>