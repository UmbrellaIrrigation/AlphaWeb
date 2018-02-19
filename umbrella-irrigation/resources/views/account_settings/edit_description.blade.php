<div class="modal fade" id="editDescriptionModal" tabindex="-1" role="dialog" aria-labelledby="editDescriptionModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form method="POST" action="{{ route('settings.description', ['user' => $user->id]) }}">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>

                        <div>
                            <input id="description" type="text" class="form-control" name="description" value="{{ $user->description }}" required autofocus> 
                            <!--@if ($errors->has('description'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('description') }}</small>
                            @endif-->
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Description</button>
                </div>

            </form>

        </div>
    </div>
</div>