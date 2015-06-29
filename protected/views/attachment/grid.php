<!-- 引入脚本文件 -->




<div class="easyui-layout" data-options="fit:true" >
	<div data-options="region:'north',title:'查询条件',headerCls:'headerCss',bodyCls:'bodyCls' " style="height:120px;border-top:0px;">
		<div class="query">
					<form id="queryForm" method="post">
						<div>
								附件名称：<input class="easyui-textbox"  name="attachmentName"  style="height:25px;">
						</div>
						<div style="width: 600px;">
								上传日期：<input class="easyui-datebox"  name="startTime"  style="height:25px;"> 至 <input class="easyui-datebox"  name="endTime"  style="height:25px;">
						</div>
						
					</form>
					    <div class="querybtn">
					    	<a href="javascript:;" class="easyui-linkbutton" data-options="iconCls:'icon-remove'" style="width:100px" onclick="clearForm()">清空</a>
					    	<a href="javascript:;" class="easyui-linkbutton" data-options="iconCls:'icon-search'" style="width:100px" onclick="query()">查询</a>
							
						</div>	
		</div>
	</div>
	 <div data-options="region:'center',title:'附件列表',iconCls:'icon-save',border:false">
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

		$('#scform').form('submit',{
			url:'<?php echo $this->createUrl('attachment/uploadFile') ;?>',
			onSubmit:function(param){

				param.channelId = '<?php echo $treeId;?>';
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
		    	url:'<?php echo $this->createUrl('attachment/loadGrid') ;?>/tag/<?php echo $treeId;?>',
		        columns:[[
		         	{field:'ck',checkbox:true},
		            {field:'attachmentName',title:'附件名称',width:200,align:'center'},
		            {field:'attachmentType',title:'附件类型',width:200,align:'center'},
		            {field:'attachmentUpdateTime',title:'上传时间',width:200,align:'center'},
		            {field:'attachmentAuthor',title:'上传人',width:200,align:'center'},
		            {field:'opertate',title:'操作',width:200,align:'center',formatter:function(value,row,index){

		            		 return '<a href="<?php echo $this->createUrl('attachment/download') ;?>/'+ row.id +'" ><span style="color:red;">下载</span></a>';
		            	
		            }}
		        ]],
		        border:false,
		        fit:true,
		        striped:true,
		        pagination:true,
		        rownumbers:true,
		        toolbar: [{
					iconCls: 'icon-add',
					plain:true,
					text:'上传附件',
					handler: function(){
						
						$('#scform').form('clear');
						$('#sc').dialog('open');

							
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

				       $.messager.confirm('提示', '是否删除所选择附件？', function(r){
								if (r){
									var win = $.messager.progress({
											title:'提示',
											text:'正在删除中...'
										});

								        $.ajax({
								        	url:'<?php echo $this->createUrl('attachment/deleteAttachment') ;?>',
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

				}]

		    });
	});

</script>