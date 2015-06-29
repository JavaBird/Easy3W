<!DOCTYPE html>
<html style="width: 100%;height: 100%;overflow: hidden;">
	<head>
		<meta charset="UTF-8">
		<title>山西煤销信工</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/themes/bootstrap/easyui.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/themes/icon.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/css/site.css">
		<style type="text/css">
				.im{
					position:relative;
					left: 250px;
					top: -25px;
					width: 90px;
					z-index: 80;


				}
				.lab{

					position: relative;
					left: -55px;
					top: 0px;


				}

		</style>
		
	</head>
	  <body style="width: 100%;height: 100%;overflow: hidden;padding: 0;margin: 0;">
	  	<div id="w" class="easyui-dialog"  data-options="modal:true,iconCls:'icon-save',noheader:true,draggable:false,buttons:'#bt',resizable:true" style="width:500px;height:300px;">
		        <form id="form-body" action="<?php echo $this->createUrl('admin/login') ;?>" method="post" >
		            <ul>
		                <!-- <li><input class="form-radio-other-input" type="radio" name="type" value="1" checked="checked"><label>普通用户 </label> &nbsp;&nbsp;&nbsp;<input class="form-radio-other-input" type="radio" name="type" value="0"> <label>管理员</label></li> -->
		                <li><label>账&nbsp;&nbsp;号 </label> <input class="easyui-validatebox account form-textbox" type="text" name="username" required="required" ></li>
		                <li><label>密&nbsp;&nbsp;码 </label> <input class="easyui-validatebox  password form-textbox" type="password" name="password"  required="required" ></li>
		                <li style="height:30px;">
		                	<div class="lab">
		                	 <label>验 证 码</label> <input class="easyui-validatebox   form-textbox" data-options="tipPosition:'bottom'" style="width:74px;" type="text" name="verifyCode"  required="required" >
		                   </div>
		                	<div class="im">
		                			<?php $this->widget('CCaptcha',array(
									        'showRefreshButton'=>false,
									        'clickableImage'=>true,
									       
									        'imageOptions'=>array(
									            'alt'=>'点击换图',
									            'title'=>'点击换图',
									            'style'=>'cursor:pointer',
									            )
									        )); ?>

		                	</div>

		                </li>
		            </ul>
		        </form>

		        <div id="logo"  >
		            <h1>山西晋能信工网站管理系统</h1>
		        </div>

	
		        <div id="bt" class="dialog-button">
		          	
				  <a href="javascript:;" class="easyui-linkbutton" id="loginBtn" style="width:100px;">登录</a>
				</div>

       </div>
       
    </body>
<script type="text/javascript" src="<?php echo $this->assetsUrl;?>/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->assetsUrl;?>/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->assetsUrl;?>/locale/easyui-lang-zh_CN.js"></script>
	<script type="text/javascript">
			$(function(){

					$('#loginBtn').on('click',function(){

						$('#form-body').form('submit',{
			        		url:'<?php echo $this->createUrl('admin/login') ;?>',
							onSubmit:function(param){
								var isValid = $(this).form('validate');
								if (isValid){
									
								}
								 return isValid;
							},
							success:function(data){
								var data =  eval('(' + data + ')')
								
								if(data.flag == 'SUCCESS'){

									window.location.href = '<?php echo $this->createUrl('admin/short') ;?>'

								}else if(data.flag == 'ERROR'){

									$('#yw0').click();
									$.messager.show({
											title:'提示',
											msg:data.message,
											showType:'show'
									});

									
								}
							},
							error:function(data){
								var data =  eval('(' + data + ')')
								
								$.messager.show({
									title:'提示',
									msg:data.message,
									showType:'show'
								});

								
							}
						});
						


					})

				//窗口重置响应
				  $(window).resize(function(){

				    $('#w').window('center');

				});


			});



	</script>
</html>