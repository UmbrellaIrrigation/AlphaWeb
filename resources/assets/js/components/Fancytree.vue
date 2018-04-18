<template>
    <div></div>
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
                if (node.data.id) {
                    alert(node.data.id);
                }
            },
        });
    }
}
</script>

