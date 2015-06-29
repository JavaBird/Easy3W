<script type="text/javascript">
  
  $(function() {
    $('.banner').unslider(
    {dots: true
    });
  });



</script>

<div class="container index_header"> 
   <div class="index_banner" id="wrapper"> 
 

    <div class="banner_w">
   <!-- 代码 开始 -->    
    <div class="banner">
        <ul>
            <li style="background-image:url(<?php echo $this->assetsUrl;?>/images/1.jpg);background-size:100% 100%; height:480px;"></li>
            <li style="background-image:url(<?php echo $this->assetsUrl;?>/images/2.jpg);background-size:100% 100%; height:480px;"></li>
            <li style="background-image:url(<?php echo $this->assetsUrl;?>/images/3.jpg);background-size:100% 100%; height:480px;"></li>
        </ul>
    </div>
   <!-- 代码 结束 -->
   </div>
    
  
   </div> 
   <div class="service_bg"> 
    <div class="service"> 
     <dl class="service01"  onmouseover="this.className='service_hover service01'" onmouseout="this.className='service01'"> 
      <dt> 
       <h1 style="font-size:16px;"><a href="###">网站建设一条龙服务</a></h1> 
      </dt> 
      <dd>
       策划、设计、制作、推广
      </dd> 
     </dl> 
     <dl class="service02"  onmouseover="this.className='service_hover service02'" onmouseout="this.className='service02'"> 
      <dt>
       <a href="###">手机+微信网站建设</a>
      </dt> 
      <dd>
       助你迅速全方位占领移动手机平台
      </dd> 
     </dl> 
     <dl class="service03"  onmouseover="this.className='service_hover service03'" onmouseout="this.className='service03'"> 
      <dt>
       <a href="###">主机、域名、邮箱</a>
      </dt> 
      <dd>
       稳定、高速、全能
      </dd> 
     </dl> 
     <dl class="service04"  onmouseover="this.className='service_hover service04'" onmouseout="this.className='service04'"> 
      <dt>
       <a href="###">网站改版、网站维护</a>
      </dt> 
      <dd>
       让你网站更健康、更安全、更高效
      </dd> 
     </dl> 
     <div class="clear"></div> 
    </div> 
   </div> 
  </div> 
  <div class="content"> 
   <div class="cases"> 
    <div class="content_title"> 
     <div class="content_title3">
      <a class="title_ch" href="cases.html">经典案例</a>
      <span class="title_en">classic cases</span>
     </div> 
    </div> 
    <div class="cases_dl" init="false"> 

      <?php

          
            for ($i=0; $i < count($cases); $i++) { 
              
              $case = $cases[$i];
              if($i != 1){

              
            
           

      ?>

     <dl> 
      <?php
        }else{

      ?>
       <dl class="cases_center"> 
        <?php  
        }

      ?>
      <dt>
       <a href="<?php echo $this->createUrl('cases/caseDetail',array('id' => $case -> Id,'year' => 2016)) ;?>"><img class="img_case"  src="<?php echo Yii::app()->request->baseUrl;?>/assets/<?php echo $case -> Logo_Image_path; ?>" width="380px" height="235px" /></a>
      </dt> 
      <dd class="cases_name">
       <?php echo $case -> Article_Title ;  ?>
      </dd> 
      <dd class="cases_int">
       <?php echo $case -> Article_Summary ;  ?>...
      </dd> 
     </dl>
     <?php

        }
     ?>
     

     <div class="clear"></div> 
    </div> 
   </div> 
   <div class="_news_bg"> 
    <div class="_news"> 
     <div class="content_title"> 
      <div class="content_title4">
       <a class="title_ch" href="<?php echo $this->createUrl('show/news') ;?>">新闻资讯</a>
       <span class="title_en">_News</span>
      </div> 
     </div> 
     <div class="_news_con"> 
      <div class="_news_con_left"> 

        <?php

           for ($i=0; $i < count($articleList) ; $i++) { 
               if($i <= 2){


                $art = $articleList[$i];
               
           
        ?>

       <dl> 
        <dt> 
         <div class="_news_title fl">
          <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$art -> Id));?>" target="_blank"><?php  echo $art -> Article_Title; ?></a>
         </div> 
         <div class="_news_date fr"></div> 
         <div class="clear"></div> 
        </dt> 
        <dd>
         <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$art -> Id));?>" target="_blank"> <?php echo  $art -> Article_Summary;?>......</a>
        </dd> 
       </dl>
       <?php

              }

           }
       ?>
      

      </div> 

      <div class="_news_con_right"> 

        <?php

            for ($i=0; $i < count($articleList) ; $i++) { 
              
                if($i > 2){

                   $art = $articleList[$i];

            


        ?>

       <dl> 
        <dt> 
         <div class="_news_title fl">
          <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$art -> Id));?>" target="_blank"><?php  echo $art -> Article_Title; ?></a>
         </div> 
         <div class="_news_date fr"></div> 
         <div class="clear"></div> 
        </dt> 
        <dd>
         <a href="<?php echo $this->createAbsoluteUrl('news/detail',array('id' =>$art -> Id));?>" target="_blank"><?php echo  $art -> Article_Summary;?>......</a>
        </dd> 
       </dl>

        <?php 

              }
            }

        ?>
     

      </div> 
      <div class="clear"></div> 
     </div> 
    </div> 
   </div> 
   <div class="partners"> 
    <div class="content_title"> 
     <div class="content_title2">
      <span class="title_ch">合作伙伴</span>
      <span class="title_en">partners</span>
     </div> 
    </div> 
    <div class="partners_table" init="false"> 
     <ul> 
      <li><img alt="建设银行" class="img_partner" src="<?php echo $this->assetsUrl;?>/images/1393928779.jpg" /></li>
      <li><img alt="康辉旅游" class="img_partner" src="<?php echo $this->assetsUrl;?>/images/1393928816.jpg" /></li>
      <li><img alt="华侨城酒店" class="img_partner" src="<?php echo $this->assetsUrl;?>/images/1393928851.jpg" /></li>
      <li><img alt="华润" class="img_partner" src="<?php echo $this->assetsUrl;?>/images/1393928915.jpg" /></li>
      <li><img alt="大台沟矿业" class="img_partner" src="<?php echo $this->assetsUrl;?>/images/1393929340.jpg" /></li>
      <li><img alt="国微技术" class="img_partner" src="<?php echo $this->assetsUrl;?>/images/1393929016.jpg" /></li>
      <li><img alt="东海航空" class="img_partner" src="<?php echo $this->assetsUrl;?>/images/1393929052.jpg" /></li>
      <li><img alt="环球石材" class="img_partner" src="<?php echo $this->assetsUrl;?>/images/1393929842.jpg" /></li> 
      <div class="clear"></div> 
     </ul> 
     <div class="clear"></div> 
    </div> 
   </div> 
  </div> 