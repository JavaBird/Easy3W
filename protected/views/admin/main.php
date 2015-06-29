<!-- 引入脚本文件 -->
  <?php
  	Yii::app()->clientScript->registerScriptFile($this->assetsUrl . "/jquery.min.js",CClientScript::POS_END);  
	Yii::app()->clientScript->registerScriptFile($this->assetsUrl . "/jquery.easyui.min.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile($this->assetsUrl . "/jquery.json.js",CClientScript::POS_END);   
	Yii::app()->clientScript->registerScriptFile($this->assetsUrl . "/locale/easyui-lang-zh_CN.js",CClientScript::POS_END); 
	Yii::app()->clientScript->registerScriptFile($this->assetsUrl . "/zTree/js/jquery.ztree.core-3.5.min.js",CClientScript::POS_END);
  Yii::app()->clientScript->registerScriptFile($this->assetsUrl . "/UEditor/ueditor.config.js",CClientScript::POS_END);  
  Yii::app()->clientScript->registerScriptFile($this->assetsUrl . "/UEditor/ueditor.all.js",CClientScript::POS_END);   

  ?>
  <script type="text/javascript">

  function destroyDom(){

   //  $('body>div.menu-top').menu('destroy');
     $('body>div.easyui-menu').menu('destroy');
      $('body>div.window>div.window-body').window('destroy');

  }


  $(function(){

  		$('#nav a').on('click',function(){

  			  var text = $(this).text();
              
              $('#west').panel('setTitle',text);
        
                destroyDom();
              if(text == '栏目管理' || text =='主页'){

                 

             	$('#west').panel('refresh',"<?php echo $this->createUrl('channel/loadChannels') ;?>")
              $('#center').panel('refresh',"<?php echo $this->createUrl('channel/note') ;?>")

              }else if(text == '文章管理'){

               

                $('#west').panel('refresh',"<?php echo $this->createUrl('article/loadChannels') ;?>")
                
                var url = '<?php echo $this->createUrl('article/note') ;?>';

                $('#center').panel('refresh',url)
              }else if(text == '系统管理'){
                  
                  
                  $('#west').panel('refresh','<?php echo $this->createUrl('system/index') ;?>')
                  $('#center').panel('refresh','<?php echo $this->createUrl('system/note') ;?>')

              }else if(text == '附件管理'){

                 
                  $('#west').panel('refresh','<?php echo $this->createUrl('attachment/loadChannels') ;?>')
                  $('#center').panel('refresh','<?php echo $this->createUrl('attachment/note') ;?>')

              }


  		})

      lanm();

  });

  function lanm(){

      $('#sel').click();
  }

  //退出
  function loginOut(){

     window.location.href ='<?php  echo $this->createUrl('admin/loginOut');?>';

  }
  </script>


