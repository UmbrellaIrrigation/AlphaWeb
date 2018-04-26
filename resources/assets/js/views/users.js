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
        userGroupForm: new Form({
            name: '',
            parent_id: 'null'
        }),
        parentName: '',
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
                    Event.$emit('main-tree-refresh');
                } 
            );
        },
        createUserGroup() {
            this.userGroupForm.post('/users/group/store')
                .then(response => {
                    alert('New User Group Added!');
                    $('#createGroupModal').modal('hide');
                    Event.$emit('main-tree-refresh');
                    Event.$emit('new-group-tree-refresh');
                    this.userGroupForm.parent_id = 'null';
                }
            );
        },
        deleteUser() {
            if (this.currentUser) {
                axios.delete('/users/user/delete/' + this.currentUser.id)
                    .then((response) => {
                        alert('User Deleted');
                        $('#deleteModal').modal('hide');
                        Event.$emit('main-tree-refresh');
                    })
                    .catch((error) => {
                        console.log(error);
                    }
                );
            }
            else {
                alert('Please choose a user first');
            }
        },
        deleteUserGroup(keepChildren) {
            let route = '';
            if (keepChildren === true) {
                route = '/users/group/delete/';
            }
            else {
                route = '/users/group/deleteWithChildren/'
            }
            if (this.currentUserGroup) {
                axios.delete(route + this.currentUserGroup.id)
                    .then((response) => {
                        alert('User Group Deleted');
                        $('#deleteGroupModal').modal('hide');
                        Event.$emit('main-tree-refresh');
                        Event.$emit('new-group-tree-refresh');
                    })
                    .catch((error) => {
                        console.log(error);
                    }
                );
            }
            else {
                alert('Please choose a user group first');
            }
        }
    },

    mounted: function() {
        
    },

    created: function() {
        Event.$on('main-tree-clicked-folder', (data) => {
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
                            }
                        );
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
        Event.$on('main-tree-clicked-item', (data) => {
            axios.get('/users/user/show/' + data.id)
                .then((response) => {
                    this.currentUser = response.data;
                    this.viewMode = 1;
                })
                .catch((error) => {
                    this.currentUser = null;
                    console.log(error);
                }
            );
        });
        Event.$on('new-group-tree-clicked-folder', (data) => {
            this.userGroupForm.parent_id = data.id;
            this.parentName = data.name;
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