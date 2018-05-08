<template>
    <form method="POST" action="" @submit.prevent="createUserGroup" @keydown="form.errors.clear($event.target.name)">

        <div class="modal-header">
            <h5 class="modal-title">Create a New User Group</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <div>
                    <input id="groupname" type="text" :class="{ 'form-control': true, 'is-invalid': form.errors.has('name') }" name="name" v-model="form.name" required autofocus> 
                    <small class="form-text alert alert-danger" role="alert"  v-if="form.errors.has('name')" v-text="form.errors.get('name')"></small>
                </div>
            </div>

            <div class="form-group">
                <label for="parent_id">Parent User Group
                    <button type="button" @click="reset" class="btn btn-danger btn-sm">None</button>
                </label>

                <input v-show="parentName === ''" class="form-control" value="None" disabled>
                <input v-show="parentName !== ''" v-cloak class="form-control" :value="parentName" disabled>

                <small class="form-text alert alert-danger" role="alert"  v-if="form.errors.has('parent_id')" v-text="form.errors.get('parent_id')"></small>                            
                
                <div style="display: none;">
                    <input id="parent_id" type="text" name="parent_id" v-model="form.parent_id" required disabled> 
                </div>

                <fancytree :route="treeRoute" :name="tree"></fancytree>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Create User Group</button>
        </div>

    </form>
</template>

<script>
import Fancytree from '../Fancytree';

export default {
    name: 'create-user-group',
    props: {
        tree: String,
        treeRoute: String
    },
    components: {
        Fancytree
    },
    data: function() {
        return {
            form: new Form({
                name: '',
                parent_id: 'null'
            }),
            parentName: ''
        }
    },
    methods: {
        reset() {
            this.form.parent_id = 'null';
            this.parentName = '';
        },
        createUserGroup() {
            this.form.post('/users/group/store')
                .then(response => {
                    flash('New User Group Added!', 'success');
                    $('#createGroupModal').modal('hide');
                    Event.$emit('refresh-all');
                    this.reset();
                }
            );
        },
    },
    created: function() {
        Event.$on(this.tree + '-clicked-folder', (data) => {
            this.form.parent_id = data.id;
            this.parentName = data.name;
        });
    }
}
</script>
