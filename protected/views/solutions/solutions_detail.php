
  <div class="container"> 
   <div class="solution_banner"></div> 
   <div class="solutions_content">
   <div class="local" style="height:20px;">
    <div class="po">您的位置：</div>
       <?php

          $this->widget('zii.widgets.CBreadcrumbs', array(
              'links'=>$this->breadcrumbs,
          ));


       ?>
    </div>  
    <h1 class="solutions_title"><?php echo  $article -> Article_Title;?></h1> 
    <div class="solutions_detail">
      <?php echo $article -> Article_Content;?>
    </div> 
    <div class="solution_detail_class"> 
     <ul> 
      <?php
              foreach ($list as $value) {
                  




              
      ?>
      <li><a href="<?php echo $this->createUrl('solutions/detial',array('id' => $value ->Id, ));?>"><?php echo $value -> Article_Title;?></a></li>
      <?php

          }

      ?>
      <div class="clear"></div> 
     </ul> 
    </div> 
    
   </div> 
  </div> 
  <div class="clear"></div> 
  