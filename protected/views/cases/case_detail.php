
  <div class="container"> 
   <div class="case_detail_bg"> 
    <div class="case_detail"> 
     <div class="local" style="height: 20px;">
     <div class="po">您的位置：</div>
       <?php

          $this->widget('zii.widgets.CBreadcrumbs', array(
              'links'=>$this->breadcrumbs,
          ));


       ?>
     </div> 
      <div class="case_detail_color"> 
       
       <div class="case_detail_name">
        <?php echo $article -> Article_Title ;  ?>
       </div> 
      <!--  <div class="case_tag" style=" margin-left:0;">
        企业网站
       </div>  -->
       <div class="case_int" style="padding:0; padding-right:40px; border-top:none;">
        <?php echo $article -> Article_Content ;  ?>
       </div> 
       <div class="case_detail_date">
        时间 ：<?php echo $article -> Article_Create_Time ;  ?>
       </div> 
       <div class="case_detail_rolling" style="display:none">
        <a class="fl a3" href="#">&lt;</a> 
        <a class="fl" href="#">&gt;</a>
       </div> 
      </div> 
    
     <div class="clear"></div> 
    </div> 
    <div class="case_detail_info"> 
     <div class="clear"></div> 
     <div class="clear"></div> 
    </div> 
   </div> 
  </div> 
  