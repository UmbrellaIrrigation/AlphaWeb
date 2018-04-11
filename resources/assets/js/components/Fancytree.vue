<template>
    <div id="tree"></div>
</template>

<script>
export default {
    props: {
        route: String
    },
    methods: {
        updateTree: function() {
            $(this.$el).fancytree('option', 'source', {
                url: this.route
            });
        }
    },
    created: function() {
        //this.updateTree();
    },
    mounted: function() {
        $(this.$el).fancytree({
            checkbox: false,
            debugLevel: 2,
            minExpandLevel: 1,
            
            source: {
                url: this.route
            },

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
    }
}
</script>

