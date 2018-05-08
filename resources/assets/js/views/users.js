/**
 * Form and Vue Element
 */

import Fancytree from '../components/Fancytree';
import Flash from '../components/Flash';

import CreateUser from '../components/form/CreateUser';
import CreateUserGroup from '../components/form/CreateUserGroup';

const app = new Vue({
    el: '#app',

    components: {
        Fancytree,
        Flash,
        CreateUser,
        CreateUserGroup
    },

    data: {
        viewMode: 0,
        currentUser: Object,
        currentUserGroup: Object,
        currentParentGroup: Object
    },

    methods: {
        deleteUser() {
            if (this.currentUser) {
                axios.delete('/users/user/delete/' + this.currentUser.id)
                    .then((response) => {
                        flash('User Successfully Deleted.', 'success');
                        $('#deleteModal').modal('hide');
                        Event.$emit('main-tree-refresh');
                        this.viewMode = 0;
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
                        flash('User Group Successfully Deleted', 'success');
                        $('#deleteGroupModal').modal('hide');
                        Event.$emit('main-tree-refresh');
                        Event.$emit('new-group-tree-refresh');
                        this.viewMode = 0;
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
    },

    mounted: function() {
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
                    flash('Error: Failed to load user group.', 'error');
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
                    flash('Error: Failed to load user.', 'error');
                    console.log(error);
                }
            );
        });
    }
});
