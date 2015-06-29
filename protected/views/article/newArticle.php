<div class="easyui-panel" data-options="fit:true,border:false,title:'新建文章',bodyCls:'tbd'" style="padding-top:20px;padding-bottom:20px;">
		<div class="titleContainer">
			<form id="newTitle" method="post">
				<div class="tf">
					<div class="tit"> <span>文章标题</span></div>
					<div class="ipt"><input class="easyui-validatebox textbox" data-options="required:true" name="title"  style="width:100%;height:25px;"></div>
				</div>
				<div class="tf">
					<div class="tit"><span>文章作者</span></div>
					<div class="ipt"><input class="easyui-validatebox textbox" data-options="required:true" name="author"  style="width:100%;height:25px;"></div>
				</div>
				<div >
					<div style="margin-bottom: 15px;">

						 <script id="uedit" name="content" type="text/plain" >
						  
						 </script>
					</div>
				</div>
				<div class="tf">
					<div class="tbtn">
						<a href="javascript:;" class="easyui-linkbutton" data-options="iconCls:'icon-save'"  style="width:45%;" onclick="newSave()">保存</a>
						<a href="javascript:;" class="easyui-linkbutton" data-options="iconCls:'icon-remove'" style="width:45%;" onclick="cancelEdit()">取消</a>
					</div>
				</div>

			</form>

		</div>
</div>

<script type="text/javascript">

	var aTreeId = '<?php echo $channelIdentify;?>';
    var ue;
	$(function(){

		 ue = UE.getEditor('uedit',{
		 	 toolbars: [
                    [
                    'source', '|','undo', 'redo','|','bold', 
                    'italic', //斜体
        			'underline', //下划线
        			'strikethrough', //删除线
        			'|',
        			'superscript', //上标
        			'subscript', //下标
        			'|',
                   	 'forecolor', //字体颜色
                    'backcolor', //背景色
                    '|',
                     'removeformat', 
                     '|',
                     'insertorderedlist', //有序列表
                     'insertunorderedlist', //无序列表
                     '|',
                     'selectall', //全选
                     'cleardoc', //清空文档
                     '|',
                     'paragraph', //段落格式
                     'fontfamily', //字体
                     'fontsize', //字号
                     'justifyleft', //居左对齐
                     'fullscreen', //全屏
			        'justifyright', //居右对齐
			        'justifycenter', //居中对齐
			        'justifyjustify', //两端对齐
			        '|',
			        'link', //超链接
			        'unlink', //取消链接
			        '|',
			         'emotion', //表情
			         'simpleupload', 
			         'insertvideo', //视频
			         '|',
			         'horizontal', //分隔线
			         'print', //打印
			        'preview' //预览
			        

			        ]
			    ],
			    autoHeightEnabled:false,
			    initialFrameHeight:460,
			    enableAutoSave:false,
			    elementPathEnabled:false 
		   
		 });

	});

	function cancelEdit(){

		
		var url = '<?php echo $this->createUrl('article/grid') ;?>/tag/<?php echo $channelIdentify;?>';
         
        $('#center').panel('refresh',url);

	}

	function newSave(){

		$('#newTitle').form('submit',{
        		url:'<?php echo $this->createUrl('article/saveNewArticle') ;?>/tag/<?php echo $channelIdentify;?>',
				onSubmit:function(param){
					var isValid = $(this).form('validate');
					if (isValid){
						var win = $.messager.progress({
							title:'提示',
							text:'正在提交中...'
						});
					}
					 return isValid;
				},
				success:function(data){
					var data =  eval('(' + data + ')')
					$.messager.progress('close')
					if(data.flag == 'SUCCESS'){
						$.messager.alert('提示',data.message,'info',function(){
							cancelEdit();
						})
					}else if(data.flag == 'ERROR'){

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










</script>