<!-- 引入脚本文件 -->




<div class="easyui-layout" data-options="fit:true" >
	<div data-options="region:'north',title:'查询条件',headerCls:'headerCss',bodyCls:'bodyCls' " style="height:120px;border-top:0px;">
				<div class="query">
					<form id="queryForm" method="post">
						<div>
								文章标题：<input class="easyui-textbox"  name="article"  style="height:25px;">
						</div>
						<div style="width: 600px;">
								创建日期：<input class="easyui-datebox"  name="startTime"  style="height:25px;"> 至 <input class="easyui-datebox"  name="endTime"  style="height:25px;">
						</div>
						
					</form>
					    <div class="querybtn">
					    	<a href="javascript:;" class="easyui-linkbutton" data-options="iconCls:'icon-remove'" style="width:100px" onclick="clearForm()">清空</a>
					    	<a href="javascript:;" class="easyui-linkbutton" data-options="iconCls:'icon-search'" style="width:100px" onclick="query()">查询</a>
							
						</div>	
				</div>

	</div>
	 <div data-options="region:'center',title:'文章列表',iconCls:'icon-save',border:false">
	 		<table id="dg">
	 		</table>
	 </div>
</div>
<div  id="sc" class="easyui-dialog" title="上传附件" data-options="modal:true,closed:true,buttons:'#newtb'" 
             style="height:150px;width:400px;">
           <form id="scform" method="post" enctype="multipart/form-data">

           		 <div class="" style="padding-top:15px;padding-left:15px;padding-right:15px;">	
						<input class="easyui-filebox" name="file" data-options="required:true,prompt:'选择文件',buttonText:'浏览'" style="width:100%">
                 </div>

           </form>
            
</div>
<div id="newtb">
	<a href="javascript:;" class="easyui-linkbutton" onclick="saveFile()">保存</a>
	<a href="javascript:;" class="easyui-linkbutton" onclick="cancleDig('sc')">取消</a>
</div>


<script type="text/javascript">
	
     function cancleDig(id){

		$('#'+id).dialog('close');
	}

	function clearForm(){

		$('#queryForm').form('clear');

	}

    function query(){

		$('#dg').datagrid('load',$('#queryForm').serializeJson());

	}



	function saveFile(){

		var rows = $('#dg').datagrid('getSelections');
						if(rows.length==0){
							$.messager.alert('提示','请选择需要设置图片的文章！','info');
							return;
						}else if(rows.length > 1){

							$.messager.alert('提示','只能选择一条文章！','info');
							return;
						}



		$('#scform').form('submit',{
			url:'<?php echo $this->createUrl('article/uploadImage') ;?>',
			onSubmit:function(param){

				param.Id = rows[0].id;
				var isValid = $(this).form('validate');
				if (isValid){
						var win = $.messager.progress({
							title:'提示',
							text:'正在上传中...'
						});
						$('#sc').dialog('close');
					}
				return isValid;

			},
			success:function(data){

					var data =  eval('(' + data + ')')
					$.messager.progress('close')
					if(data.flag == 'SUCCESS'){
						$.messager.alert('提示',data.message,'info',function(){
							$('#dg').datagrid('reload');
						})
					}else if(data.flag == 'ERROR'){

						$.messager.alert('提示',data.message,'error');
					}else{

						$.messager.alert('提示',data.message,'error');
					}


			},
			error:function(data){

				var data =  eval('(' + data + ')')
					$.messager.progress('close')
					$.messager.alert('提示',data.message,'error')
			}

		});

	}

	

	$(function(){

		 


		    $('#dg').datagrid({
		    	url:'<?php echo $this->createUrl('article/loadGrid') ;?>/tag/<?php echo $channelIdentify;?>',
		        columns:[[
		         	{field:'ck',checkbox:true},
		            {field:'title',title:'标题',width:200,align:'center'},
		            {field:'author',title:'作者',width:200,align:'center'},
		            {field:'createTime',title:'创建时间',width:200,align:'center'},
		            {field:'publish',title:'文章状态',width:200,align:'center',formatter:function(value,row,index){

		            	if(value == 0){

		            		 return '<span style="color:red;">草稿</span>';
		            	}else if(value == 1){

		            		return '<span style="color:green;">发布</span>';
		            	}

		            	
		            }},{field:'imagePath',title:'文章图片',width:200,align:'center',formatter:function(value,row,index){
		            	if(value == '' || value == undefined){

		            		return '无';

		            	}else{

		            		return '<img style="height:50px;width:50px;"  src ="<?php echo Yii::app()->request->baseUrl;?>/assets/'+value+'" />';
		            	}
		            	

		            }}
		        ]],
		        border:false,
		        fit:true,
		        striped:true,
		        pagination:true,
		        rownumbers:true,
		        pageList:[5,10,15,20],
		        toolbar: [{
					iconCls: 'icon-add',
					plain:true,
					text:'新建',
					handler: function(){
						
						if (typeof ue != 'undefined') {  
							ue.destroy();  
						} 
							var url = '<?php echo $this->createUrl('article/newTitle') ;?>/tag/<?php echo $channelIdentify;?>';
                            $('#center').panel('refresh',url)
					}
				},'-',{
					iconCls: 'icon-edit',
					plain:true,
					text:'编辑',
					handler: function(){

						var rows = $('#dg').datagrid('getSelections');
						if(rows.length==0){
							$.messager.alert('提示','请选择需要编辑的文章！','info');
							return;
						}else if(rows.length > 1){

							$.messager.alert('提示','只能选择一条文章进行编辑','info');
							return;
						}

						if (typeof ue != 'undefined') {  
							ue.destroy();  
						} 

						var url = '<?php echo $this->createUrl('article/editArticle') ;?>/'+rows[0].id;
                            $('#center').panel('refresh',url);



					}
				},'-',{
					iconCls: 'icon-remove',
					plain:true,
					text:'删除',
					handler: function(){
						
					  var ids = [];
				 	   var rows = $('#dg').datagrid('getSelections');
						if(rows.length==0){
							$.messager.alert('提示','请选择需要删除的数据！','info');
							return;
						}

					  for(var i=0; i<rows.length; i++){
						 var row = rows[i];
						 ids.push(row.id);
				       }	

				       $.messager.confirm('提示', '是否删除所选择文章？', function(r){
								if (r){
									var win = $.messager.progress({
											title:'提示',
											text:'正在删除中...'
										});

								        $.ajax({
								        	url:'<?php echo $this->createUrl('article/deleteArticles') ;?>',
								        	data:{"ids":ids.join(',')},
								        	dataType:'json',
								        	type:'post',
								        	success:function(data){
								        		$.messager.progress('close');
								        		if(data.flag='SUCCESS'){

								        			$.messager.alert('提示',data.message,'info',function(){

								        				$('#dg').datagrid('reload');
								        			})
								        		}else{

								        			$.messager.alert('提示',data.message,'error')

								        		}


								        	},
								        	error:function(data){

								        		$.messager.alert('提示',data.message,'error')


								        	}


								        });
								}
							});

				       


				      




					}

				},'-',{
					iconCls: 'icon-publish-title',
					plain:true,
					text:'设置文章图片',
					handler:function(){

						var rows = $('#dg').datagrid('getSelections');
						if(rows.length==0){
							$.messager.alert('提示','请选择文章！','info');
							return;
						}else if(rows.length > 1){

							$.messager.alert('提示','只能选择一条文章！','info');
							return;
						}


						$('#scform').form('clear');
						$('#sc').dialog('open');

					}



				},'-',{
					iconCls: 'icon-publish-title',
					plain:true,
					text:'发布',
					handler: function(){

					var ids=[];
					 var rows = $('#dg').datagrid('getSelections');
						if(rows.length==0){
							$.messager.alert('提示','请选择需要删除的数据！','info');
							return;
						}

						var win = $.messager.progress({
											title:'提示',
											text:'正在发布中...'
										});

					  for(var i=0; i<rows.length; i++){
						 var row = rows[i];
						 ids.push(row.id);
				       }

				       $.ajax({

				       		url:'<?php echo $this->createUrl('article/publishArticle') ;?>',
				       		data:{"ids":ids.join(',')},
				       		dataType:'json',
				       		Type:'post',
				       		success:function(data){

				       			       $.messager.progress('close');
								        		if(data.flag='SUCCESS'){

								        			$.messager.alert('提示',data.message,'info',function(){

								        				$('#dg').datagrid('reload');
								        			})
								        		}else{

								        			$.messager.alert('提示',data.message,'error')

								        		}


				       		},
				       		error:function(data){

				       			$.messager.alert('提示',data.message,'error')

				       		}













				       });







					}
				}]

		    });
	});

</script>