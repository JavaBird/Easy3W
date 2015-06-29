<ul id="tree" class="ztree"></ul>


<script type="text/javascript">



	var zNodes =<?php echo $znodes;?>;
	
    var setting = {

   				data: {
					simpleData: {
						enable: true
					}
				},
				callback: {
					onClick: zTreeOnClick,
					onRightClick: zTreeOnRightClick
				}

			};


	function zTreeOnRightClick(){
		
	}

	function zTreeOnClick(event, treeId, treeNode) {
		
		destroyDom();

		var url = '<?php echo $this->createUrl('attachment/grid') ;?>'+'/tag/'+treeNode.channelIdentify;
        $('#center').panel('refresh',url)
     

	};




        $(function(){

        		$.fn.zTree.init($("#tree"), setting, zNodes);

        });


</script>