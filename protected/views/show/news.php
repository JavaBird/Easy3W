<div class="container"> 
   <div class="news_banner"></div> 
   <div class="content"> 

    <?php

        for ($i=0; $i < count($result) ; $i++) { 
          
            $channel = $result[$i]['channel'];
            $article = $result[$i]['article'];


          if( ($i+1) % 2 > 0){

         
          

    ?>

    <div class="news"> 
     <div class="news_con"> 
      <div class="general_title"> 
       <table width="400" border="0" cellspacing="0" cellpadding="0"> 
        <tbody>
         <tr> 
          <td><img src="<?php echo $this->assetsUrl;?>/images/inner_content_title.png" /></td> 
          <td><a href="<?php echo $this->createAbsoluteUrl('news/newsList',array('page' =>0,'id'=> $channel -> Channel_Identify));?>" ><?php  echo $channel -> Channel_Name ;?></a></td> 
          <td><img src="<?php echo $this->assetsUrl;?>/images/inner_content_title.png" /></td> 
         </tr> 
        </tbody>
       </table> 
      </div> 
      <div class="news_con_int"> 
       <div class="news_title">
        <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$article[0] -> Id));?>"><?php echo $article[0] -> Article_Title;?></a>
       </div> 
       <div class="news_word">
        <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$article[0] -> Id));?>"><?php echo $article[0] -> Article_Summary;?>......</a>
       </div> 
       <div class="news_add">
        <span>日期：</span><?php echo $article[0] -> Article_Create_Time;?>
        <span style="margin-left:20px;">标签：</span>煤销信工<a href="javascript:;"></a> &nbsp; &nbsp; 
       </div> 
       <div class="news_read_more">
        <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$article[0] -> Id));?>"><img alt="查看详细" src="<?php echo $this->assetsUrl;?>/images/news_read_more.gif" /></a>
       </div> 
      </div> 
      <div class="news_class">
       <a href="<?php echo $this->createUrl('news/newsList',array('page' =>0,'id'=> $channel -> Channel_Identify));?>" >更多 +</a>
      </div> 
      <div class="clear"></div> 
     </div> 
    </div>
    <?php
         }else if( ($i+1) % 2 == 0){


         

    ?>
    <div class="news2"> 
     <div class="news_con"> 
      <div class="general_title"> 
       <table width="400" border="0" cellspacing="0" cellpadding="0"> 
        <tbody>
         <tr> 
          <td><img src="<?php echo $this->assetsUrl;?>/images/inner_content_title.png" /></td> 
          <td><a href="<?php echo $this->createUrl('news/newsList',array('page' =>0,'id'=> $channel -> Channel_Identify));?>" ><?php  echo $channel -> Channel_Name ;?></a></td> 
          <td><img src="<?php echo $this->assetsUrl;?>/images/inner_content_title.png" /></td> 
         </tr> 
        </tbody>
       </table> 
      </div> 
      <div class="news_con_int"> 
       <div class="news_title">
        <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$article[0] -> Id));?>"><span class="news_add"></span><?php echo $article[0] -> Article_Title;?></a>
       </div> 
       <div class="news_word">
        <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$article[0] -> Id));?>"><?php echo $article[0] -> Article_Summary;?>......</a>
       </div> 
       <div class="news_add">
        <span>日期：</span><?php echo $article[0] -> Article_Create_Time;?>
        <span style="margin-left:20px;">标签：</span>
        <a href="javascript:;">煤销信工</a> &nbsp; &nbsp; 
       </div> 
       <div class="news_read_more">
        <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$article[0] -> Id));?>"><img alt="查看详细" src="<?php echo $this->assetsUrl;?>/images/news_read_more.gif" /></a>
       </div> 
      </div> 
      <div class="news_class">
       <a href="<?php echo $this->createUrl('news/newsList',array('page' =>0,'id'=> $channel -> Channel_Identify));?>" >更多 +</a>
      </div> 
      <div class="clear"></div> 
     </div> 
    </div>

    <?php



         }

       }
    ?>

   </div> 
  </div>
 