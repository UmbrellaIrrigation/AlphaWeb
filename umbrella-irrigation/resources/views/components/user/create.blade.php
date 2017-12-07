<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form method="POST" action="{{ route('users.store') }}">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create a New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Name</label>

                        <div>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> 
                            @if ($errors->has('name'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Description</label>

                        <div>
                            <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required></textarea>

                            @if ($errors->has('description'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('description') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail Address</label>

                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Password</label>

                        <div>
                            <input id="password" type="password" class="form-control" name="password" required> 
                            @if ($errors->has('password'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                        <label for="permission" class="control-label">Permission</label>

                        <div>
                            <input id="permission" type="number" class="form-control" name="permission" required>
                            @if ($errors->has('permission'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('permission') }}</small>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create User</button>
                </div>

            </form>

        </div>
    </div>
</div>