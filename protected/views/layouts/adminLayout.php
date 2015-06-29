
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv=Content-Type content="text/html;charset=utf-8">
		<title>山西煤销信工</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/themes/default/easyui.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/themes/icon.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/zTree/css/zTreeStyle/zTreeStyle.css"> 
		<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/css/main.css"> 
		
	</head>
	<body style="padding:2px;">
		<div class="easyui-layout" fit="true">
			<div data-options="region:'north',border:false" style="height:40px">
			  <div id="nav" class="easyui-panel" style="padding:5px;">
					<a id="sel"  href="javascript:;" class="easyui-linkbutton" data-options="toggle:true,plain:true,group:'g1'">主页</a>
					<a href="javascript:;" class="easyui-linkbutton" data-options="toggle:true,plain:true,group:'g1'">栏目管理</a>
					<a href="javascript:;" class="easyui-linkbutton" data-options="toggle:true,plain:true,group:'g1'">文章管理</a>
					<!-- <a href="javascript:;" class="easyui-linkbutton" data-options="toggle:true,plain:true,group:'g1'">网站管理</a> -->
					<a href="javascript:;" class="easyui-linkbutton" data-options="toggle:true,plain:true,group:'g1'">附件管理</a>
					<a href="#" class="easyui-menubutton" data-options="toggle:true,plain:true,group:'g1',menu:'#mm2'">系统管理</a>
					
			 </div>
			  <div id="mm2" style="width:100px;">
			        <div onclick="loginOut();">退出</div>
			    </div>
			</div>
			<div id="west" data-options="region:'west',split:true,title:'工作台',loadingMessage:'加载中...',cache:false" style="width:150px;">
			
		    </div>
		<!-- 	<div data-options="region:'east',split:true,collapsed:true,title:'East'" style="width:100px;padding:10px;">east region</div> -->
		<div data-options="region:'south',border:true" style="height:50px;padding:10px;"></div>
		<div id="center" data-options="region:'center',split:true,loadingMessage:'加载中...'">



		</div>
	</div>
	
  </body>
  
  <?php echo $content;?>

 


</html>
