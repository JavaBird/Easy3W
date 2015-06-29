<ul id="tree" class="ztree"></ul>

 <!-- 右键按钮 -->
  <div id="mm" class="easyui-menu" data-options="" style="width:120px;">
		<div data-options="iconCls:'icon-add'">
			<span>新建</span>
			<div>
				<div onclick="newCatalogue()">
				目录
				</div>
				<div onclick="newNode()">
					 节点
				</div>	
			</div>
		</div>
		<div data-options="iconCls:'icon-remove'" onclick="deleteNode()">删除</div>
		<div  onclick="editlm()">修改</div>
		<div onclick="refreshTree()">刷新</div>
</div>
<div id="mm1" class="easyui-menu" style="width:120px;">
		<div data-options="iconCls:'icon-remove'" onclick="deleteNode()">删除</div>
		<div  onclick="editlm()">修改</div>
		
</div>


<!-- 新建 -->
<div id="newlm" class="easyui-dialog" title="新建栏目"  data-options="modal:true,closed:true,buttons:'#newtb'" 
             style="height:250px;width:400px;">	

	<form id="newlmForm" >
			<div class="container" style="height:150px;" >
				<div class="row">
					<div class="col-md-3" >
						栏目名称：
					</div>
					<div class="col-md-7">
						<input class="easyui-validatebox textbox" data-options="required:true" name="channelName"  style="width:100%;height:25px;">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3" >
						栏目标识：
					</div>
					<div class="col-md-7">
						<input class="easyui-validatebox textbox" data-options="required:true" name="channelIdentify"  style="width:100%;height:25px;">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						内容类型：
					</div>
					<div class="col-md-7">
						<select class="easyui-combobox" data-options="required:true" name="contentType"  style="width:100%;height:25px;">
							<option value="0">文章</option>
							<option value="1">一般业务</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						栏目类型：
					</div>
					<div class="col-md-7">
						<select class="easyui-combobox" data-options="required:true" name="channelType"  style="width:100%;height:25px;">
							<option value="0">目录</option>
							<option value="1">节点</option>
						</select>
					</div>
				</div>
			</div>
	</form>
</div>
<div id="newtb">
	<a href="javascript:;" class="easyui-linkbutton" onclick="saveNew()">保存</a>
	<a href="javascript:;" class="easyui-linkbutton" onclick="cancleDig('newlm')">取消</a>
</div>

<!-- 编辑 -->
<div id="editlm" class="easyui-dialog" title="编辑栏目"  data-options="modal:true,closed:true,buttons:'#edittb'" 
             style="height:250px;width:400px;">
    <form id="editlmForm" method='post' >
    		<input  type="hidden" name="id" />
			<div class="container" style="height:150px;" >
				<div class="row">
					<div class="col-md-3" >
						栏目名称：
					</div>
					<div class="col-md-7">
						<input class="easyui-validatebox textbox" data-options="required:true" name="channelName"  style="width:100%;height:25px;">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3" >
						栏目标识：
					</div>
					<div class="col-md-7">
						<input class="easyui-validatebox textbox" data-options="required:true" name="channelIdentify"  style="width:100%;height:25px;">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						内容类型：
					</div>
					<div class="col-md-7">
						<select class="easyui-combobox" data-options="required:true" name="contentType"  style="width:100%;height:25px;">
							<option value="0">文章</option>
							<option value="1">一般业务</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						栏目类型：
					</div>
					<div class="col-md-7">
						<select class="easyui-combobox" data-options="required:true" name="channelType"  style="width:100%;height:25px;">
							<option value="0">目录</option>
							<option value="1">节点</option>
						</select>
					</div>
				</div>
			</div>
	</form>

</div>
<div id="edittb">
	<a href="javascript:;" class="easyui-linkbutton" onclick="saveEdit()">保存</a>
	<a href="javascript:;" class="easyui-linkbutton" onclick="cancleDig('editlm')">取消</a>
</div>
 <!-- 右键按钮end -->


<script type="text/javascript">


	var zNodes =<?php echo $znodes;?>;
	
   var setting = {
   				data: {
				simpleData: {
					enable: true
				}
			},
				callback: {

		          onRightClick: zTreeOnRightClick

	            }

			};

     function zTreeOnRightClick(event, treeId, treeNode) {

               var zTree = $.fn.zTree.getZTreeObj("tree"); 


               if(treeNode != null){

	               	zTree.selectNode(treeNode);  

	               	 $('#mm').menu('show', {
								left: event.pageX,
								top: event.pageY
							});
					//右键选中节点后，弹出右键菜单
					// if(treeNode.isParent){

					// 	 $('#mm').menu('show', {
					// 			left: event.pageX,
					// 			top: event.pageY
					// 		});
					// }else{
					// 	$('#mm1').menu('show', {
					// 		left: event.pageX,
					// 		top: event.pageY
					// 	});

					// }


               }

				



        };


        function newCatalogue(){
        	
        	$('#newlm').dialog('open');

        	$('#newlmForm').form('clear');


        }
        
        //新建栏目保存
        function  saveNew(){

        	
        	$('#newlmForm').form('submit',{
        		url:'<?php echo $this->createUrl('channel/saveNew') ;?>',
				onSubmit:function(param){
					var isValid = $(this).form('validate');
					if (isValid){
						var zTree = $.fn.zTree.getZTreeObj("tree"); 
						var nodes = zTree.getSelectedNodes();
					      param.pid= nodes[0].id;
						$('#newlm').dialog('close');
						var win = $.messager.progress({
							title:'提示',
							msg:'正在提交中...'
						});
					}
					 return isValid;
				},
				success:function(data){
					var data =  eval('(' + data + ')')
					$.messager.progress('close')
					if(data.flag == 'SUCCESS'){
						$.messager.alert('提示',data.message,'info',function(){
							var zTree = $.fn.zTree.getZTreeObj("tree"); 
						    var nodes = zTree.getSelectedNodes();
						     zTree.addNodes(nodes[0], data.newNodes);
						})
					}else if(data.flag == 'ERROR'){

						$.messager.alert('提示',data.message,'error')
					}
				},
				error:function(data){
					var data =  eval('(' + data + ')')
					$.messager.progress('close')
					$.messager.alert('提示',data.message,'error')
				}
			});



        	


        }

        //取消
        function cancleDig(id){

				$('#'+id).dialog('close');

        }

       function deleteNode(){

         var zTree = $.fn.zTree.getZTreeObj("tree"); 
		 var nodes = zTree.getSelectedNodes();

		 if(nodes[0].isParent){

		 	$.messager.confirm('提示', '此操作会删除其下所有节点，是否继续？', function(r){
				if (r){
					var win = $.messager.progress({
							title:'提示',
							msg:'正在删除中...'
						});

					$.ajax({
						url:'<?php echo $this->createUrl('channel/deleteNode') ;?>',
						data:{"id":nodes[0].id},
						dataType:'json',
						success:function(data){
							$.messager.progress('close');
							if(data.message == 'SUCCESS'){
								$.messager.alert('提示','删除成功！','info',function(){
										var zTree = $.fn.zTree.getZTreeObj("tree"); 
		                                  var nodes = zTree.getSelectedNodes();
										treeNode = nodes[0];
										zTree.removeNode(treeNode);
								})
							}else{

								$.messager.alert('提示','删除失败！','error')
							}


						},error:function(data){
							$.messager.progress('close');
							$.messager.alert('提示',data.message,'error')
						}



					});


				}
			});

		 }else{

		 	$.messager.confirm('提示', '确认删除该节点？', function(r){
				if (r){
					var win = $.messager.progress({
							title:'提示',
							msg:'正在删除中...'
						});

					$.ajax({
						url:'<?php echo $this->createUrl('channel/deleteNode') ;?>',
						data:{"id":nodes[0].id},
						dataType:'json',
						success:function(data){
							$.messager.progress('close');
							if(data.message == 'SUCCESS'){
								$.messager.alert('提示','删除成功！','info',function(){
										var zTree = $.fn.zTree.getZTreeObj("tree"); 
		                                  var nodes = zTree.getSelectedNodes();
										treeNode = nodes[0];
										zTree.removeNode(treeNode);
								})
							}else{

								$.messager.alert('提示','删除失败！','error')
							}


						},error:function(data){
							$.messager.progress('close');
							$.messager.alert('提示',data.message,'error')
						}



					});
				}
			});

		 }

       }

       //编辑栏目
       function editlm(){
       			
       			$('#editlmForm').form('clear');
       			$('#editlm').dialog('open');
       			var treeNode = getNode();
       			var url = '<?php  echo $this->createUrl('channel/editNode');?>'+'/'+treeNode.id;
       			$('#editlmForm').form("load",url);
       }

       //保存编辑
       function saveEdit(){



        	$('#editlmForm').form('submit',{
        		url:'<?php echo $this->createUrl('channel/saveEdit') ;?>',
				onSubmit:function(param){
					var isValid = $(this).form('validate');
					if (isValid){
						$('#editlm').dialog('close');
						var win = $.messager.progress({
							title:'提示',
							msg:'正在提交中...'
						});
					}
					 return isValid;
				},
				success:function(data){

					var data =  eval('(' + data + ')')
					$.messager.progress('close')
					if(data.flag == 'SUCCESS'){
						$.messager.alert('提示',data.message,'info',function(){

							var zTree = $.fn.zTree.getZTreeObj("tree"); 
		                                  var nodes = zTree.getSelectedNodes();
										var treeNode = nodes[0];
										treeNode.name =data.name;
										zTree.updateNode(treeNode,false);

						})
					}else if(data.flag == 'ERROR'){

						$.messager.alert('提示',data.message,'warning');

					}else {

						$.messager.alert('提示',data.message,'error')
					}
				},
				error:function(data){
					var data =  eval('(' + data + ')')
					$.messager.progress('close')
					$.messager.alert('提示',data.message,'error')
				}
			});




       }



       function getNode(){

          	var zTree = $.fn.zTree.getZTreeObj("tree"); 
		    var nodes = zTree.getSelectedNodes();
			var	treeNode = nodes[0];
			return treeNode;

       }



        $(function(){


        		$.fn.zTree.init($("#tree"), setting, zNodes);





        });









</script>