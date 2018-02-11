<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form method="POST" action="">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                        <label for="old_password" class="control-label">Current Password</label>

                        <div>
                            <input id="old_password" type="password" class="form-control" name="old_password" required> 
                            @if ($errors->has('old_password'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('old_password') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">New Password</label>

                        <div>
                            <input id="password" type="password" class="form-control" name="password" required> 
                            @if ($errors->has('password'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                        <label for="confirm_password" class="control-label">Confirm New Password</label>

                        <div>
                            <input id="confirm_password" type="password" class="form-control" name="confirm_password" required> 
                            @if ($errors->has('confirm_password'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('confirm_password') }}</small>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Name</button>
                </div>

            </form>

        </div>
    </div>
</div>