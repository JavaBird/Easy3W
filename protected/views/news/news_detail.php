<div class="container"> 
   <div class="news_banner"></div> 
   <div class="content"> 
    <div class="news" style="padding-top:0px;"> 
     <div class="news_con"> 
      <div class="local" style="height: 25px;">
       <div class="po">您的位置：</div>
       <?php

          $this->widget('zii.widgets.CBreadcrumbs', array(
              'links'=>$this->breadcrumbs,
          ));


       ?>
   
      </div> 
      <div class="news_con_int"> 
       <div class="news_title">
        <?php echo $article -> Article_Title;?>
       </div> 
       <div class="news_title_add">
        发表日期：<?php echo $article -> Article_Create_Time;?> &nbsp;&nbsp; 文章编辑：<?php echo $article -> Article_Author;?> &nbsp;&nbsp; 浏览次数：1130
       </div> 
       <div class="news_word">
         <?php echo $article -> Article_Content;?>
        <div style="text-align: center;">
        </div> 
       </div> 
       <div class="news_add">
        <span>标签：</span>
        <a href="/tag/3549.html">网站建设</a> &nbsp; &nbsp; 
       </div> 
       <div class="news_title_add">
        如没特殊注明，文章均为山西煤炭运销集团信息工程有限公司原创
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
   <div class="news_bg_01"> 
    <div class="news_01"> 
     <div class="content_title" style="font-size:24px; font-family:'微软雅黑';">
      相关文章推荐
     </div> 
     <div class="news_con_01"> 
      <div class="news_con_left">

          <?php

              for ($i=0; $i < count($relateArticles); $i++) { 
                  
                  $_article = $relateArticles[$i];

                  if($i < 2){


          ?>

       <dl> 
        <dt> 
         <div class="news_title_01 fl">
          <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$_article -> Id));?>"><?php echo $_article -> Article_Title;?></a>
         </div> 
         <div class="news_date_01 fr"></div> 
         <div class="clear"></div> 
        </dt> 
        <dd>
         <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$_article -> Id));?>"><?php echo $_article -> Article_Summary;?>......</a>
        </dd> 
       </dl>

      <?php      }else if($i == 2){        ?>

       <dl style="border:none"> 
        <dt> 
         <div class="news_title_01 fl">
          <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$_article -> Id));?>"><?php echo $_article -> Article_Title;?></a>
         </div> 
         <div class="news_date_01 fr"></div> 
         <div class="clear"></div> 
        </dt> 
        <dd>
         <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$_article -> Id));?>"><?php echo $_article -> Article_Summary;?>......</a>
        </dd> 
       </dl>
       <?php          break;
                  }


              }      ?>
      </div> 
      <div class="news_con_right"> 
        <?php

            for ($i=0; $i < count($relateArticles); $i++) { 
             
              $_article = $relateArticles[$i];


                if($i > 2){



              



               


        ?>
       <dl> 
        <dt> 
         <div class="news_title_01 fl">
          <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$_article -> Id));?>"><?php echo $_article -> Article_Title;?></a>
         </div> 
         <div class="news_date_01 fr"></div> 
         <div class="clear"></div> 
        </dt> 
        <dd>
        <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$_article -> Id));?>"><?php echo $_article -> Article_Summary;?>......</a>
        </dd> 
       </dl>
       <?php      }else if( $i > 2 && $i == count($relateArticles) - 1){        ?>

       <dl style="border:none"> 
        <dt> 
         <div class="news_title_01 fl">
          <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$_article -> Id));?>"><?php echo $_article -> Article_Title;?></a>
         </div> 
         <div class="news_date_01 fr"></div> 
         <div class="clear"></div> 
        </dt> 
        <dd>
         <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$_article -> Id));?>"><?php echo $_article -> Article_Summary;?>......</a>
        </dd> 
       </dl> 
       <?php          }

            }     ?>
      </div> 
      <div class="clear"></div> 
     </div> 
    </div> 
   </div> 
  </div> 
  