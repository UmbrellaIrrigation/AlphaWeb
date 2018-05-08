<template>
    <form method="POST" action="" @submit.prevent="createUser" @keydown="form.errors.clear($event.target.name)">

        <div class="modal-header">
            <h5 class="modal-title">Create a New User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <div>
                    <input id="name" type="text" :class="{ 'form-control': true, 'is-invalid': form.errors.has('name') }" name="name" v-model="form.name" required autofocus> 
                    <small class="form-text alert alert-danger" role="alert" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></small>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="control-label">E-Mail Address</label>
                <div>
                    <input id="email" type="email" :class="{ 'form-control': true, 'is-invalid': form.errors.has('email') }" name="email" v-model="form.email" required>
                    <small class="form-text alert alert-danger" role="alert" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></small>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <div>
                    <input id="password" type="password" :class="{ 'form-control': true, 'is-invalid': form.errors.has('password') }" name="password" v-model="form.password" required> 
                </div>
            </div>
            
            <div class="form-group">
                <label for="password-confirm" class="control-label">Confirm Password</label>
                <div>
                    <input id="password-confirm" type="password" :class="{ 'form-control': true, 'is-invalid': form.errors.has('password') }" name="password_confirmation" v-model="form.password_confirmation" required>
                    <small class="form-text alert alert-danger" role="alert" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></small>
                </div>
            </div>

            <div class="form-group">
                <label for="permission" class="control-label">Permission</label>
                <div>
                    <select id="permission" :class="{ 'custom-select': true, 'is-invalid': form.errors.has('permission') }" name="permission" v-model="form.permission" required>
                        <option value="1" selected>Guest</option>
                        <option value="2">Employee</option>
                        <option value="3">Admin</option>
                    </select>
                    <small class="form-text alert alert-danger" role="alert" v-if="form.errors.has('permission')" v-text="form.errors.get('permission')"></small>
                </div>
            </div>

            <div class="form-group">
                <label for="group_id">Group</label>

                <input v-if="groupName === ''" class="form-control" value="None" disabled>
                <input v-else v-cloak class="form-control" :value="groupName" disabled>
                
                <small class="form-text alert alert-danger" role="alert"  v-if="form.errors.has('group_id')" v-text="form.errors.get('group_id')"></small>                            
                
                <div style="display: none;">
                    <input id="group_id" type="text" name="group_id" v-model="form.group_id" required disabled> 
                </div>

                <fancytree :route="treeRoute" :name="tree"></fancytree>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" :disabled="form.errors.any()">Create User</button>
        </div>

    </form>

</template>

<script>
import Fancytree from '../Fancytree';

export default {
    name: 'create-user',
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
                email: '',
                password: '',
                password_confirmation: '',
                permission: '',
                group_id: 'null'
            }),
            groupName: ''
        }
    },
    methods: {
        createUser() {
            this.form.post('/users/user/store')
                .then(response => {
                    flash('New User Added!', 'success');
                    $('#createModal').modal('hide');
                    Event.$emit('main-tree-refresh');
                    this.form.group_id = 'null';
                    this.groupName = '';
                } 
            );
        }
    },
    created: function() {
        Event.$on(this.tree + '-clicked-folder', (data) => {
            this.form.group_id = data.id;
            this.groupName = data.name;
        });
    }
}
</script>

