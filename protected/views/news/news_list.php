<div class="container"> 
   <div class="news_banner"></div> 
   <div class="content">
     <div class="general_title"> 
       <table width="400" border="0" cellspacing="0" cellpadding="0"> 
        <tbody>
         <tr> 
          <td><img src="<?php echo $this->assetsUrl;?>/images/inner_content_title.png" /></td> 
          <td><a ><?php echo $channel -> Channel_Name;?></a></td> 
          <td><img src="<?php echo $this->assetsUrl;?>/images/inner_content_title.png" /></td> 
         </tr> 
        </tbody>
       </table> 
      </div>
    <?php

        for ($i=0; $i <count($articles) ; $i++) {

          $article = $articles[$i];
          
          if(($i + 1) % 2 != 0){


    ?>



    <div class="news"> 
     <div class="news_con"> 
      
      <div class="news_con_int"> 
       <div class="news_title">
        <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$article -> Id));?>"><?php echo $article -> Article_Title;?></a>
       </div> 
       <div class="news_word">
        <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$article -> Id));?>"><?php echo $article -> Article_Summary;?>......</a>
       </div> 
       <div class="news_add">
        <span>日期：</span><?php echo $article -> Article_Create_Time;?>
        <span style="margin-left:20px;">标签：</span>煤销信工<a href="news_detail.html"></a> &nbsp; &nbsp; 
       </div>
      </div> 
      <div class="clear"></div> 
     </div> 
    </div>

    <?php

        }else if(($i + 1) % 2 == 0){


    ?>

    <div class="news2"> 
     <div class="news_con">
       <div class="news_con_int"> 
         <div class="news_title">
        <a href="news_detail.html"></a><a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$article -> Id));?>"><?php echo $article -> Article_Title;?></a>
       </div> 
       <div class="news_word">
        <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$article -> Id));?>"><?php echo $article -> Article_Summary;?>......</a>
       </div> 
       <div class="news_add">
        <span>日期：</span><?php echo $article -> Article_Create_Time;?>
        <span style="margin-left:20px;">标签：</span>
        <a href="javascript:;">煤销信工</a> &nbsp; &nbsp; 
       </div>
       </div>
       <div class="clear"></div> 
     </div> 
    </div>
    <?php


            }


       }





    ?>

   
    
    
    

    <div   class="news" align="center">  
  
     
      <table>
        <tr>
              <td>当前第<?php echo $pages -> currentPage + 1; ?>页</td>
               <td>&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->createAbsoluteUrl('news/newsList',array('page' =>0,'id'=> $id));?>"  >首页</a>
               &nbsp;&nbsp;&nbsp;<a href="<?php echo $this->createAbsoluteUrl('news/newsList',array('page' =>($pages -> currentPage -1) < 0? 0 : ($pages -> currentPage -1) ,'id'=> $id));?>" >上一页
               </a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->createAbsoluteUrl('news/newsList',array('page' =>($pages -> currentPage + 1),'id'=> $id));?>">下一页</a>
               &nbsp;&nbsp;&nbsp;<a href="<?php echo $this->createAbsoluteUrl('news/newsList',array('page' =>($pages -> pageCount - 1),'id'=> $id));?>" >尾页</a> &nbsp;&nbsp;&nbsp;</td>
              <td>共<?php echo $pages -> pageCount;?>页</td>
          </tr>
      </table>
  </div> 
   </div> 
  </div> 