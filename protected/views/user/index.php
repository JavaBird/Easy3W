<!-- 引入脚本文件 -->




<div class="easyui-layout" data-options="fit:true" >
	<div data-options="region:'north',title:'查询条件',headerCls:'headerCss',bodyCls:'bodyCls' " style="height:120px;border-top:0px;">

		<div class="query">
			<form id="queryForm" method="post">
				<div>
						用户名称：<input class="easyui-textbox"  name="username"  style="height:25px;">
				</div>
				<div style="width: 600px;">
						创建日期：<input class="easyui-datebox"  name="startTime"  style="height:25px;"> 至 <input class="easyui-datebox"  name="endTime"  style="height:25px;">
				</div>
				
			</form>
			    <div class="querybtn">
			    	<a href="javascript:;" class="easyui-linkbutton" data-options="iconCls:'icon-search'" style="width:100px" onclick="clearForm()">清空</a>
			    	<a href="javascript:;" class="easyui-linkbutton" data-options="iconCls:'icon-remove'" style="width:100px" onclick="query()">查询</a>
					
				</div>	
		</div>

	</div>
	 <div data-options="region:'center',title:'用户列表',iconCls:'icon-save',border:false">
	 		<table id="dg">
	 		</table>
	 </div>
</div>

<!-- 新建 -->
<div id="newUser" class="easyui-dialog" title="创建用户"  data-options="modal:true,closed:true,buttons:'#newtb'" 
             style="height:250px;width:400px;">	

	<form id="newUserForm" method="post">
			<div class="container" style="height:150px;" >
				<div class="row">
					<div class="col-md-3" >
						用户名称：
					</div>
					<div class="col-md-7">
						<input class="easyui-validatebox textbox" data-options="required:true" name="username"  style="width:100%;height:25px;">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3" >
						用户密码：
					</div>
					<div class="col-md-7">
						<input class="easyui-validatebox textbox" data-options="required:true" name="password"  style="width:100%;height:25px;">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						是否启用：
					</div>
					<div class="col-md-7">
						<select class="easyui-combobox" data-options="required:true" name="enable"  style="width:100%;height:25px;">
							<option value="0">不启用</option>
							<option value="1">启用</option>
						</select>
					</div>
				</div>
			</div>
	</form>
</div>
<div id="newtb">
	<a href="javascript:;" class="easyui-linkbutton" onclick="saveNewUser()">保存</a>
	<a href="javascript:;" class="easyui-linkbutton" onclick="cancleDig('newUser')">取消</a>
</div>
<!-- 编辑 -->
<div id="editUser" class="easyui-dialog" title="编辑用户"  data-options="modal:true,closed:true,buttons:'#edittb'" 
             style="height:250px;width:400px;">	

	<form id="editUserForm" method="post">
			<div class="container" style="height:150px;" >
				<div class="row">
					<div class="col-md-3" >
						用户名称：
					</div>
					<div class="col-md-7">
						<input class="easyui-textbox" data-options="readonly:true" name="username"  style="width:100%;height:25px;">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						是否启用：
					</div>
					<div class="col-md-7">
						<select class="easyui-combobox" data-options="required:true" name="enable"  style="width:100%;height:25px;">
							<option value="0">不启用</option>
							<option value="1">启用</option>
						</select>
					</div>
				</div>
			</div>
	</form>
</div>
<div id="edittb">
	<a href="javascript:;" class="easyui-linkbutton" onclick="saveEditUser()">保存</a>
	<a href="javascript:;" class="easyui-linkbutton" onclick="cancleDig('editUser')">取消</a>
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



	function saveEditUser(){

		$('#editUserForm').form('submit',{
        		url:'<?php echo $this->createUrl('user/editUser') ;?>',
				onSubmit:function(param){
					var isValid = $(this).form('validate');

					if (isValid){
						var rows = $('#dg').datagrid('getSelections');

						param.id=rows[0].id;

						$('#editUser').dialog('close');
						var win = $.messager.progress({
							title:'提示',
							msg:'正在修改中...'
						});
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

						$.messager.alert('提示',data.message,'error')
					}else{
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





	//保存用户
	function saveNewUser(){

		$('#newUserForm').form('submit',{
        		url:'<?php echo $this->createUrl('user/saveNewUser') ;?>',
				onSubmit:function(param){
					var isValid = $(this).form('validate');
					if (isValid){
						$('#newUser').dialog('close');
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
							$('#dg').datagrid('reload');
						})
					}else if(data.flag == 'ERROR'){

						$.messager.alert('提示',data.message,'error')
					}else{
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

	

	$(function(){

		    $('#dg').datagrid({
		    	url:'<?php echo $this->createUrl('user/loadGrid') ;?>',
		        columns:[[
		         	{field:'ck',checkbox:true},
		            {field:'username',title:'用户名',width:200,align:'center'},
		            {field:'createTime',title:'创建时间',width:200,align:'center'},
		            {field:'loginTime',title:'登录时间',width:200,align:'center'},
		            {field:'enable',title:'启用状态',width:200,align:'center',formatter:function(value,row,index){

		            	if(value == 0){

		            		 return '<span style="color:red;">否</span>';
		            	}else if(value == 1){

		            		return '<span style="color:green;">是</span>';
		            	}

		            	
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
					text:'新建',
					handler: function(){
						
						$('#newUser').dialog('open');
					}
				},'-',{
					iconCls: 'icon-edit',
					plain:true,
					text:'编辑',
					handler: function(){

						var rows = $('#dg').datagrid('getSelections');
						if(rows.length==0){
							$.messager.alert('提示','请选择需要编辑的数据！','info');
							return;
						}else if(rows.length > 1){

							$.messager.alert('提示','只能选择一条数据进行编辑','info');
							return;
						}

						$('#editUserForm').form('load','<?php echo $this->createUrl('user/edit') ;?>/'+rows[0].id);
						$('#editUser').dialog('open');


					



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

				       $.messager.confirm('提示', '是否删除所选择用户？', function(r){
								if (r){
									var win = $.messager.progress({
											title:'提示',
											text:'正在删除中...'
										});

								        $.ajax({
								        	url:'<?php echo $this->createUrl('user/deleteUser') ;?>',
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