<template>
    <div id="tree"></div>
</template>

<script>
export default {
    props: {
        route: String
    },
    data: function() {
        return {
            data: Object
        }
    },
    methods: {
        updateTree: function() {
            // '/api/users/treeData'
            axios.get(this.route)
                .then( response => {
                    this.data = response.data;
                    console.log(this.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
                
            $(this.$el).fancytree('option', 'source', this.data);
        }
    },
    created: function() {
        this.updateTree();
    },
    mounted: function() {
        $(this.$el).fancytree({
            checkbox: false,
            debugLevel: 2,
            minExpandLevel: 1,
            
            source: this.data,

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
            var node = this.$el.fancytree("getRootNode");
            node.sortChildren(null, true);
        });
    
        $( "#treeExpand" ).click(function() {
            this.$el.fancytree("getTree").visit(function(node){
                node.setExpanded();
            });
        });
    
        $( "#treeCollapse" ).click(function() {
            this.$el.fancytree("getTree").visit(function(node){
                node.setExpanded(false);
            });
        });
    }
}
</script>

