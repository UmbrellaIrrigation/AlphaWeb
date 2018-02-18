<div class="modal fade" id="editEmailModal" tabindex="-1" role="dialog" aria-labelledby="editEmailModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form method="POST" action="">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="name" class="control-label">Email</label>

                        <div>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->email }}" required autofocus> 
                            <!--@if ($errors->has('name'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('name') }}</small>
                            @endif-->
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Email</button>
                </div>

            </form>

        </div>
    </div>
</div>