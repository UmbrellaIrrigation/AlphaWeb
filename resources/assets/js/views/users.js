/**
 * Form and Vue Element
 */

import Example from '../components/Example';

const app = new Vue({
    el: '#app',

    components: {
        Example
    },

    data: {
        userForm: new Form({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            permission: ''
        }),
        tree: '',
        treeData: ''
    },

    methods: {
        createUser() {
            this.userForm.post('/users/user/store')
                .then(response => {
                    alert('New User Added!');
                    $('#createModal').modal('hide');
                } 
            );
        },
        updateTree() {
            axios.get('/api/users/treeData')
                .then( response => {
                    this.treeData = response.data;
                    console.log(this.treeData);
                })
                .catch(function (error) {
                    console.log(error);
                });
                
            $('#tree').fancytree('option', 'source', this.treeData);
        }
    },

    mounted: function() {
        
    },

    created: function() {
        this.updateTree();

    },

    ready: function() {
        this.tree = $("#tree").fancytree({
            checkbox: false,
            debugLevel: 2,
            minExpandLevel: 1,
            
            source: this.treeData,
            init: function(event, data, flag) {
				console.log(this.treeData);
			},
            postinit: function (isReloading, isError) {
                this.reactivate();
            },
            focus: function (event, data) {
                // Auto-activate focused node after 2 seconds
                data.node.scheduleAction("activate", 2000);
            },
            activate: function (event, data) {
                var node = data.node;
                // Use <a> href and target attributes to load the content:
                if (node.data.id) {
                    alert(node.data.id);
                }
            },
        });
    
        $( "#treeSort" ).click(function() {
            var node = this.tree.fancytree("getRootNode");
            node.sortChildren(null, true);
        });
    
        $( "#treeExpand" ).click(function() {
            this.tree.fancytree("getTree").visit(function(node){
                node.setExpanded();
            });
        });
    
        $( "#treeCollapse" ).click(function() {
            this.tree.fancytree("getTree").visit(function(node){
                node.setExpanded(false);
            });
        });
    }
});
