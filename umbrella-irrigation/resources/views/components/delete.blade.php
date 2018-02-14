<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if (Request::is('users/user*'))
                <div class="modal-header">
                    <h5 class="modal-title">Confirm User Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you wish to delete this user?</p>
                </div>
                <div class="modal-footer">
                    <a href="/users/user/delete/{{$user->id}}" class="btn btn-danger">Yes, Delete User</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Keep User</button>
                </div>
            @elseif (Request::is('users/group*'))
                <div class="modal-header">
                    <h5 class="modal-title">Confirm User Group Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you wish to delete all Users and Groups within this Group (Remove Children) or keep those Users and Groups in this Group (Keep Children)?</p>
                </div>
                <div class="modal-footer">
                    <a href="/users/group/delete/{{$usergroup->id}}" class="btn btn-danger">Remove Children</a>
                    <a href="" class="btn btn-primary" data-dismiss="modal">Keep Children</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel Deletion</button>
                </div>
            @elseif (Request::is('valves/valve*'))

            @elseif (Request::is('valves/group*'))

            @endif
        </div>
    </div>
</div>