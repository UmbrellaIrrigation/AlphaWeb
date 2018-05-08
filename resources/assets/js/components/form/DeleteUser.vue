<template>
    <div>
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
            <button type="button" @click="deleteUser" class="btn btn-danger">Yes, Delete User</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Keep User</button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'delete-user',
    props: {
        user
    },
    methods: {
        deleteUser() {
            if (this.user) {
                axios.delete('/users/user/delete/' + this.user.id)
                    .then((response) => {
                        flash('User Successfully Deleted.', 'success');
                        $('#deleteModal').modal('hide');
                        Event.$emit('main-tree-refresh');
                        Event.$emit('reset-view');
                    })
                    .catch((error) => {
                        flash('Error: Failed to delete user.', 'error');
                        console.log(error);
                    }
                );
            }
            else {
                flash('Error: Please select a user first.', 'error');
            }
        },
    }
}
</script>
