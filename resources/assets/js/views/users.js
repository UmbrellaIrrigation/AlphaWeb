/**
 * Form and Vue Element
 */

import Fancytree from '../components/Fancytree';
import Flash from '../components/Flash';

import CreateUser from '../components/form/CreateUser';
import CreateUserGroup from '../components/form/CreateUserGroup';
import DeleteUser from '../components/form/DeleteUser';
import DeleteUserGroup from '../components/form/DeleteUserGroup';

const app = new Vue({
    el: '#app',

    components: {
        Fancytree,
        Flash,
        CreateUser,
        CreateUserGroup,
        DeleteUser,
        DeleteUserGroup
    },

    data: {
        viewMode: 0,
        currentUser: Object,
        currentUserGroup: Object,
        currentParentGroup: Object
    },

    methods: {
        getUser(data) {
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
        },
        getUserGroup(data) {
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
                }
            );
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
        Event.$on('reset-view', () => this.viewMode = 0);
        Event.$on('main-tree-clicked-item', (data) => this.getUser(data));
        Event.$on('main-tree-clicked-folder', (data) => this.getUserGroup(data));
    }
});
