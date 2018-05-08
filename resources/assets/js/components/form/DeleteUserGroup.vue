<template>
    <div>
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
            <button type="button" @click="deleteUserGroup(false)" class="btn btn-danger">Remove Children</button>
            <button type="button" @click="deleteUserGroup(true)" class="btn btn-primary">Keep Children</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel Deletion</button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'delete-user-group',
    props: ['usergroup'],
    methods: {
        deleteUserGroup(keepChildren) {
            let route = '';
            if (keepChildren === true) {
                route = '/users/group/delete/';
            }
            else {
                route = '/users/group/deleteWithChildren/'
            }
            if (this.usergroup) {
                axios.delete(route + this.usergroup.id)
                    .then((response) => {
                        flash('User Group Successfully Deleted', 'success');
                        $('#deleteGroupModal').modal('hide');
                        Event.$emit('main-tree-refresh');
                        Event.$emit('new-group-tree-refresh');
                        Event.$emit('reset-view');
                    })
                    .catch((error) => {
                        flash('Error: Failed to delete user group.', 'error');
                        console.log(error);
                    }
                );
            }
            else {
                flash('Error: Please select a user group first.', 'error');
            }
        }
    }
}
</script>
