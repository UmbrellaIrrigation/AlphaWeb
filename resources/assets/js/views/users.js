/**
 * Form and Vue Element
 */

import Example from '../components/Example';
import Fancytree from '../components/Fancytree';

const app = new Vue({
    el: '#app',

    components: {
        Example,
        Fancytree
    },

    data: {
        userForm: new Form({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            permission: ''
        }),
        viewMode: 0,
        currentUser: Object,
        currentUserGroup: Object,
        currentParentGroup: Object
    },

    methods: {
        createUser() {
            this.userForm.post('/users/user/store')
                .then(response => {
                    alert('New User Added!');
                    $('#createModal').modal('hide');
                    Event.$emit('user-tree-refresh');
                } 
            );
        },
        deleteUser() {
            if (this.currentUser) {
                axios.delete('/users/user/delete/' + this.currentUser.id)
                    .then((response) => {
                        alert('User Deleted');
                        $('#deleteModal').modal('hide');
                        Event.$emit('user-tree-refresh');
                    })
                    .catch((error) => {
                        console.log(errors);
                    });
            }
            else {
                alert('Please choose a user first');
            }
        },
        deleteUserGroup() {
            if (this.currentUserGroup) {
                axios.delete('/users/user/delete/' + this.currentUserGroup.id)
                    .then((response) => {
                        alert('User Group Deleted');
                        $('#deleteGroupModal').modal('hide');
                        Event.$emit('user-tree-refresh');
                    })
                    .catch((error) => {
                        console.log(errors);
                    });
            }
            else {
                alert('Please choose a user group first');
            }
        }
    },

    mounted: function() {
        
    },

    created: function() {
        Event.$on('user-tree-clicked-folder', (data) => {
            axios.get('/users/group/show/' + data.id)
                .then((response) => {
                    this.currentUserGroup = response.data;
                    if (this.currentUserGroup.parent_id) {
                        axios.get('/users/group/show/' + this.currentUserGroup.parent_id)
                            .then((response) => {
                                this.currentParentGroup = response.data;
                            })
                            .catch((error) => {
                                this.currentParentGroup = null;
                                console.log(error);
                            })
                    }
                    else {
                        this.currentParentGroup = null;
                    }
                    this.viewMode = 2;
                })
                .catch((error) => {
                    this.currentUserGroup = null;
                    console.log(error);
                });
        });
        Event.$on('user-tree-clicked-item', (data) => {
            axios.get('/users/user/show/' + data.id)
                .then((response) => {
                    this.currentUser = response.data;
                    this.viewMode = 1;
                })
                .catch((error) => {
                    this.currentUser = null;
                    console.log(error);
                });
        });
    }
});

$(function() {
    $("#treeSort").click(function() {
        var node = $("#tree").fancytree("getRootNode");
        node.sortChildren(null, true);
    });

    $("#treeExpand").click(function() {
        $("#tree").fancytree("getTree").visit(function(node){
            node.setExpanded();
        });
    });

    $("#treeCollapse").click(function() {
        $("#tree").fancytree("getTree").visit(function(node){
            node.setExpanded(false);
        });
    });
});