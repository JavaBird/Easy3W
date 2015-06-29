<div class="lf">
	<ul>
		<li><a class="easyui-linkbutton" data-options="toggle:true,plain:true,group:'g2'" >用户管理</a></li>
	<!-- 	<li><a class="easyui-linkbutton" data-options="toggle:true,plain:true,group:'g2'">角色管理</a></li> -->
	</ul>
</div>


<script type="text/javascript">
	
	$(function(){

		$('.lf a').on('click',function(){

			if($(this).text() == '用户管理'){

				var url = '<?php echo $this->createUrl('user/index') ;?>';
				
                 $('#center').panel('refresh',url)



			}else if($(this).text() == '角色管理'){




			}





		})














	});










</script>