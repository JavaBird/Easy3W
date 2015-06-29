<?php
/*文章控制器*/
class ArticleController extends Controller
{




	

	/*加载栏目树*/
	public function actionLoadChannels(){

		$channels = TSChannel::model()->findAll();

		$result = array();

		for ($i=0; $i <count($channels) ; $i++) { 
			$c = $channels[$i];
			$result[$i] =  array('id' => $c->Id ,'name' => $c->Channel_Name,'pId'=>$c->Channel_Pid,'isParent'=> $c->Channel_Is_Parent,'open'=>$c->Channel_Is_Open,'channelIdentify'=>$c->Channel_Identify, );
		}


		$json = json_encode($result,JSON_UNESCAPED_UNICODE);

		$this ->renderPartial('index',array(

			'znodes' => $json ,

			));

	}

	/*跳转表格*/
	public function actionGrid(){

		$id = yii::app() -> request ->getParam('id');

		$this -> renderPartial('grid',array('channelIdentify' => $id , ));

	}


	//加载表格数据
	public function actionLoadGrid(){

		$id = yii::app() -> request ->getParam('id');
		$page = yii::app() -> request -> getParam('page');
		$rows = yii::app() -> request -> getParam('rows');
		$article = yii::app() -> request -> getParam('article');
		$startTime = yii::app() -> request -> getParam('startTime');
		$endTime = yii::app() -> request -> getParam('endTime');


		$sql = " SELECT
			t.Id as id,
			t.Article_Title AS title,
			t.Article_Author AS author,
			t.Article_Create_Time AS createTime,
			t.Article_Is_Publish AS publish,
			t.Logo_Image_path AS imagePath
		FROM
			t_s_article t
		WHERE
			1 = 1 
			and t.Channel_Identify ='".$id."'";

		 $countSql = "SELECT count(*) as num from t_s_article t where 1=1 and t.Channel_Identify = '".$id."'";

		 if(isset($article) && !empty($article)){

			$sql.="and t.Article_Title like '%".$article."%'";

			 $countSql.= " and t.Article_Title like '%".$article."%'";


		}
		if(isset($startTime) && !empty($startTime)){

			$sql.=' and t.Article_Create_Time >= '.$startTime;
			 $countSql.= ' and t.Article_Create_Time >='.$startTime;

		}

		if(isset($endTime) && !empty($endTime)){

			$sql.=' and t.Article_Create_Time <= '.$endTime;
			 $countSql.= ' and t.Article_Create_Time <='.$endTime;

		}

		 $sql.=' order by t.Article_Create_Time desc';

		$easyui = EasyUIModel::getPageData($countSql,$sql,$page,$rows);


        echo json_encode($easyui,JSON_UNESCAPED_UNICODE);
	}

	
	//新建文章
	public function actionNewTitle(){

		$id = yii::app() -> request ->getParam('id');

		$this ->renderPartial('newArticle',array('channelIdentify' =>$id , ));

	}

	//操作说明

	public function actionNote(){


		$this -> renderPartial('note');

	}

	function left($str, $len, $charset="utf-8"){
	    //如果截取长度小于等于0，则返回空
	    if( !is_numeric($len) or $len <= 0 )
	    {
	        return "";
	    }

	    //如果截取长度大于总字符串长度，则直接返回当前字符串
	    $sLen = strlen($str);
	    if( $len >= $sLen )
	    {
	        return $str;
	    }
	 
	    //判断使用什么编码，默认为utf-8
	    if ( strtolower($charset) == "utf-8" )
	    {
	        $len_step = 3; //如果是utf-8编码，则中文字符长度为3  
	    }else{
	        $len_step = 2; //如果是gb2312或big5编码，则中文字符长度为2
	    } 

	    //执行截取操作
	    $len_i = 0; 
	    //初始化计数当前已截取的字符串个数，此值为字符串的个数值（非字节数）
	    $substr_len = 0; //初始化应该要截取的总字节数

	    for( $i=0; $i < $sLen; $i++ )
	    {
	        if ( $len_i >= $len ) break; //总截取$len个字符串后，停止循环
	        //判断，如果是中文字符串，则当前总字节数加上相应编码的中文字符长度
	        if( ord(substr($str,$i,1)) > 0xa0 )
	        {
	            $i += $len_step - 1;
	            $substr_len += $len_step;
	        }else{ //否则，为英文字符，加1个字节
	            $substr_len ++;
	        }
	    $len_i ++;
	    }
	    $result_str = substr($str,0,$substr_len );
	    return $result_str;
}


	//新建文章
	public function actionSaveNewArticle(){

		try {
			$channelId = yii::app() -> request ->getParam('id');
			$title = yii::app() -> request -> getParam('title');
			$author = yii::app() -> request -> getParam('author');
			$content = yii::app() -> request -> getParam('content');

			$summany = $this -> left(strip_tags($content),70);

			$currChannel = TSChannel::model() -> find('Channel_Identify =:channelId',array(':channelId' => $channelId,));
			$paretnChannel = TSChannel::model() -> findByPk($currChannel -> Channel_Pid);

			$article = new TSArticle;

			$article -> Article_Title = $title;
			$article -> Article_Author = $author;
			$article -> Article_Content = $content;
			$article -> Channel_Identify = $channelId;
			$article -> Article_Create_Time = date("Y-m-d H:i:s", time());
			$article -> Article_Summary = $summany;
			$article -> Channel_Parent_Identify = $paretnChannel -> Channel_Identify;
			
			$article -> save();
			echo json_encode(array('flag' =>'SUCCESS' , 'message' => '新建文章成功！'),JSON_UNESCAPED_UNICODE);

		} catch (Exception $e) {
			
			echo json_decode(array('flag' =>'Exception' ,'message' => '系统异常！' ),JSON_UNESCAPED_UNICODE);


		}


	}

	//删除文章
	public function actionDeleteArticles(){

		try {
			
			$ids = yii::app() -> request -> getParam('ids');

			$count  = TSArticle::model() -> deleteAll('Id in ('.$ids.')');
			if($count > 0){

				echo json_encode(array('flag' =>'SUCCESS' ,'message' => '删除成功！' ),JSON_UNESCAPED_UNICODE);

			}else{

				echo json_encode(array('flag' =>'SUCCESS' ,'message' => '删除失败！' ),JSON_UNESCAPED_UNICODE);
			}

			

		} catch (Exception $e) {
			
			echo json_decode(array('flag' =>'Exception' ,'message' => '系统异常！' ),JSON_UNESCAPED_UNICODE);
		}
	}

	//编辑文章
	public function actionEditArticle(){

		$id = yii::app() -> request -> getParam('id');

		$article = TSArticle::model() -> find('Id ='.$id);

		$this -> renderPartial('editArticle',array(
			'id' =>$article -> Id , 
			'title' => $article -> Article_Title,
			'author' => $article -> Article_Author,
			 'content' => $article -> Article_Content,
			 'channelIdentify' => $article -> Channel_Identify,

			));


	}



	// 更新文章
	public function actionUpateArticle(){

		try {
			$articleId = yii::app() -> request ->getParam('id');
			$title = yii::app() -> request -> getParam('title');
			$author = yii::app() -> request -> getParam('author');
			$content = yii::app() -> request -> getParam('content');

			$article = TSArticle::model() -> find('Id ='.$articleId);

			$article -> Article_Title = $title;
			$article -> Article_Author = $author;
			$article -> Article_Content = $content;
			$article -> save();
			echo json_encode(array('flag' =>'SUCCESS' , 'message' => '更新文章成功！'),JSON_UNESCAPED_UNICODE);

		} catch (Exception $e) {
			
			echo json_decode(array('flag' =>'Exception' ,'message' => '系统异常！' ),JSON_UNESCAPED_UNICODE);


		}


	}


	//发布文章
	public function actionPublishArticle(){


	  try {
	  	
	  	$ids = yii::app() -> request ->getParam("ids");

	  	yii::app() -> db ->createCommand()
	  			-> update('t_s_article',array('Article_Is_Publish' => 1,),'Id in ('.$ids.')');

	  	echo json_encode(array('flag' =>'SUCCESS' , 'message' => '发布文章成功！'),JSON_UNESCAPED_UNICODE);

	  	
	  } catch (Exception $e) {
	  	
	  	echo json_encode(array('flag' =>'SUCCESS' , 'message' => '发布文章失败！'),JSON_UNESCAPED_UNICODE);
	  }

	}


	/*获取文章中第一个图片的地址*/
	public function getImagePath($str){


		preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $str, $thumbUrl);  //通过正则式获取图片地址

		
		$img_src = $thumbUrl[1][0];  //将赋值给img_src
   
        $img_counter = count($thumbUrl[0]);  //一个src地址的计数器

        switch ($img_counter > 0) {
	       case $allPics = 1:
	           return $img_src;  //当找到一个src地址的时候，输出缩略图
	           break;
	       default:
	           return Yii::getPathOfAlias('application.assets.admin').'/images/default.png';  //没找到(默认情况下)，不输出任何内容
	   };

	}


     //  上传文章logo图片
	public function actionUploadImage(){

		try {
			
			$id = yii::app() -> request -> getParam("Id");
			$file = CUploadedFile::getInstanceByName('file');
			$oldName = $file -> getName();
			$ext = substr($oldName,stripos($oldName,'.'));
			$typeList = array(".jpg",".png",".jpeg",".gif",".bmp",);
			if(in_array(strtolower($ext), $typeList)){// 图片格式正确

				$article =TSArticle::model() -> findByPk($id);

				$article -> Logo_Image_path = 'upload/'.$oldName;

				$uploadFile = './assets/upload/'.$oldName;

			    $flag  =  $file -> saveAs($uploadFile);
			
			    $length = $article -> save();

				if($flag && $length > 0){

				echo json_encode(array('flag' =>'SUCCESS' , 'message' => '上传附件成功！'),JSON_UNESCAPED_UNICODE);
				
				}else{

					echo json_encode(array('flag' =>'ERROR' , 'message' => '上传附件失败！'),JSON_UNESCAPED_UNICODE);
				}

			}else{

				echo json_encode(array('flag' =>'ERROR' , 'message' => '图片必须是jpg,png,jpeg,gif,bmp中的一种格式！'),JSON_UNESCAPED_UNICODE);

			}

			





		} catch (Exception $e) {
			
				echo json_encode(array('flag' =>'SUCCESS' , 'message' => $e -> getMessage(),),JSON_UNESCAPED_UNICODE);
		}

		

	}
	
}