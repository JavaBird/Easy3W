<script type="text/javascript">


   var root="<?php echo $this->assetsUrl;?>/";
</script>
<div class="container"> 
   <div class="case_banner"></div> 
   <div class="content"> 
    <div class="case"> 
     <div class="general_title"> 
      <table width="400" border="0" cellspacing="0" cellpadding="0"> 
       <tbody>
        <tr> 
         <td><img src="<?php echo $this->assetsUrl;?>/images/inner_content_title.png"  /></td> 
         <td>成功案例</td> 
         <td><img src="<?php echo $this->assetsUrl;?>/images/inner_content_title.png" /></td> 
        </tr> 
       </tbody>
      </table> 
     </div> 
     <div class="case_class"> 
      <ul class="fl"> 
       <li><a class="a2" href="cases.html">所有案例</a></li>

       <?php 
          foreach ($cList as  $value) {
              
       ?>
       <li><a href="<?php echo  $value['href'] ;?>"><?php echo $value['ctitle'];?></a></li>
       <?php




           }
       ?>
      
       <div class="clear"></div> 
      </ul> 
      <div class="search fr"> 
       <form > 
        <div class="search_le">
         <img src="<?php echo $this->assetsUrl;?>/images/search_le.gif" alt="搜索案例" />
        </div> 
        <div class="search_input"> 
         <input type="text" name="keywords" id="keywords" value="请输入搜索内容" onblur="if(this.value=='')this.value='请输入搜索内容';" onfocus="if(this.value=='请输入搜索内容')this.value='';" /> 
        </div> 
        <div class="search_ri">
         <input type="image" src="<?php echo $this->assetsUrl;?>/images/search_ri.gif" alt="搜索案例" />
        </div> 
        <div class="clear"></div> 
       </form> 
      </div> 
      <div class="clear"></div> 
     </div> 
     <div class="clear"></div> 
     <div class="item_list" id="case_list">

      <?php 
              foreach ($list as $value) {
              
                $article = $value['article'];
                $channel = $value ['channel'];


      ?>

      <div class="item"> 
       <dl> 
        <dt>
         <a target="_blank" href="<?php echo $this->createUrl('cases/caseDetail',array('id' => $article -> Id,'year' => 2016)) ;?>"><img alt="<?php echo $article -> Article_Title ;  ?>" src="<?php echo Yii::app()->request->baseUrl;?>/assets/<?php echo $article -> Logo_Image_path; ?>"  /></a>
        </dt> 
        <dd class="case_name">
         <a target="_blank" href="<?php echo $this->createUrl('cases/caseDetail',array('id' => $article -> Id,'year' => 2016)) ;?>"><?php echo $article -> Article_Title ;  ?></a>
        </dd> 
        <dd class="case_tag">
         <a href="<?php echo $this->createUrl('cases/caseForOne',array('id' => $article -> Channel_Identify,));?>"><?php echo $channel -> Channel_Name;?></a>
        </dd> 
        <dd class="case_int">
         <a target="_blank" href="<?php echo $this->createUrl('cases/caseDetail',array('id' => $article -> Id,'year' => 2016)) ;?>"><?php echo $article -> Article_Summary ;  ?>...</a>
        </dd> 
       </dl> 
      </div>

      <?php } ?>
      
     </div> 
     <div id="ajax-loader" style="width: 120px; height: 20px; margin: 0px auto; display: none; ">
      <img src="" />
     </div> 
     <div id="pagenavi" style="display: none; ">
      <span id="post-current">1</span> / 
      <span id="post-count">14</span>
     </div> 
     <div id="cate" data-animate="" data-ajax=""></div> 
    </div> 
   </div> 
  </div> 
  <div style="display:none;" id="gotopbtn" class="to_top">
   <a title="返回顶部" href="javascript:void(0);"></a>
  </div> 
  
 
  <script type="text/javascript" src="<?php echo $this->assetsUrl;?>/js/jquery.waterfall.min.js"></script> 
  <script type="text/javascript" src="<?php echo $this->assetsUrl;?>/js/case3.js"></script>  
