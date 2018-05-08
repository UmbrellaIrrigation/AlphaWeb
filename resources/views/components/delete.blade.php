<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if (Request::is('users*'))

                <delete-user :user="currentUser" />

            @elseif (Request::is('valves*'))
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Valve Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you wish to delete this valve?</p>
                </div>
                <div class="modal-footer">
                    <a href="/valves/valve/delete/{{$valve->id}}" class="btn btn-danger">Yes, Delete Valve</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Keep Valve</button>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="modal fade" id="deleteGroupModal" tabindex="-1" role="dialog" aria-labelledby="deleteGroupModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if (Request::is('users*'))

                <delete-user-group :usergroup="currentUserGroup" />
                
            @elseif (Request::is('valves*'))
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Valve Group Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you wish to delete all Valves and Groups within this Group (Remove Children) or keep those Valves and Groups in this Group (Keep Children)?</p>
                </div>
                <div class="modal-footer">
                    <a href="/valves/group/deleteWithChildren/{{$valvegroup->id}}" class="btn btn-danger">Remove Children</a>
                    <a href="/valves/group/delete/{{$valvegroup->id}}" class="btn btn-primary">Keep Children</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel Deletion</button>
                </div>
            @endif
        </div>
    </div>
</div>
