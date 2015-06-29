
  <div class="container"> 
   <div class="solution_banner"></div> 
   <div class="content" style="padding-top:40px;"> 
    <div class="general_title"> 
     <table style="margin-bottom:0px;" width="400" border="0" cellspacing="0" cellpadding="0"> 
      <tbody>
       <tr> 
        <td><img src="<?php echo $this->assetsUrl;?>/images/inner_content_title.png" /></td> 
        <td>解决方案</td> 
        <td><img src="<?php echo $this->assetsUrl;?>/images/inner_content_title.png" /></td> 
       </tr> 
      </tbody>
     </table> 
    </div> 
    <div class="solution_ul"> 
     <ul> 
              <?php
                     for ($i=0; $i <count($articles) ; $i++) { 
                        
                          $article = $articles[$i];

                            if(($i + 1) % 2 == 0){



              ?>
      <li class="solution_li"> 
       <div class="solution_content"> 
        <div class="solution_li_con"> 
         <div style="margin-left:-600px;" class="solution_img   box-l2 J_Box" init="true">
          <a href="<?php echo $this->createUrl('solutions/detial',array('id' => $article ->Id, ));?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl;?>/assets/<?php echo $article -> Logo_Image_path; ?>"  /></a>
         </div> 
         <div class="solution_con box-r2 J_Box" init="true"> 
          <div class="solution_title">
           <?php echo $article -> Article_Title;?>
          </div> 
          <div class="solution_int">
            <?php echo $article -> Article_Summary;?>
          <div class="read_more">
           <a href="<?php echo $this->createUrl('solutions/detial',array('id' => $article ->Id, ));?>" target="_blank">查看详细</a>
          </div> 
         </div> 
         <div class="clear"></div> 
        </div> 
       </div></li>
       <?php  

            }else if(($i + 1) % 2 > 0){
       ?>
      <li class="solution_li2"> 
       <div class="solution_content"> 
        <div class="solution_li2_con"> 
         <div style="margin-left:-600px;text-align:right;" class="solution_con  box-l J_Box" init="true"> 
          <div class="solution_title">
           <?php echo $article -> Article_Title;?>
          </div> 
          <div class="solution_int">
          <?php echo $article -> Article_Summary;?>
          </div> 
          <div class="read_more">
           <a href="<?php echo $this->createUrl('solutions/detial',array('id' => $article ->Id, ));?>" target="_blank">查看详细</a>
          </div> 
         </div> 
         <div class="solution_img box-r J_Box" init="true">
          <a href="<?php echo $this->createUrl('solutions/detial',array('id' => $article ->Id, ));?>" target="_blank"><img  src="<?php echo Yii::app()->request->baseUrl;?>/assets/<?php echo $article -> Logo_Image_path; ?>" /></a>
         </div> 
         <div class="clear"></div> 
        </div> 
       </div> </li> 
        <?php


                            }


                     }

        ?>
        
      <div class="clear"></div> 
     </ul> 
    </div> 
   </div> 
  </div> 
   <script type="text/javascript" src="<?php echo $this->assetsUrl;?>/js/jquery-1.8.1.min.js"></script> 
  <script type="text/javascript" src="<?php echo $this->assetsUrl;?>/js/jquery.easing.1.3.js"></script> 
  <script type="text/javascript" src="<?php echo $this->assetsUrl;?>/js/solutions.js"></script> 