<?php
/*新闻资讯*/
class NewsController extends BaseController
{

	public $layout = '//layouts/showLayout';

	public $menu = 'menu7';//默认新闻页

	public $breadcrumbs = array();

	//文章内容页
	public function actionDetail()
	{
		$id = yii::app() -> request ->getParam('id');

		$article = TSArticle::model() -> findByPk($id);

		$parentChannel = TSChannel::model() -> find('Channel_Identify =:pChannelIden',array(':pChannelIden'=>$article -> Channel_Parent_Identify,));

		$channel = TSChannel::model() -> find('Channel_Identify =:channelIden',array("channelIden" => $article -> Channel_Identify,));

		$this -> breadcrumbs = array($parentChannel ->Channel_Name  => $this->createUrl('show/news'),$channel -> Channel_Name => $this->createAbsoluteUrl('news/newsList',array('page' =>0,'id'=> $channel -> Channel_Identify)),$article -> Article_Title,);

		//相关文章列表
		$relatedArticles = TSArticle::model() ->publish() ->recently() -> limit() -> findAll('Channel_Identify =:ciden and Id !=:id ',array(':ciden' =>$article -> Channel_Identify,':id' =>$id,));

		$this->render('news_detail',array('article' => $article,
						'relateArticles' => $relatedArticles,
		));
	}


	//栏目列表页
	public function actionNewsList(){

	   $id = yii::app() -> request ->getParam('id');

       $page = yii::app() -> request -> getParam('page');

       $channel = TSChannel::model() -> find('Channel_Identify=:id',array(':id' => $id));

       $criteria=new CDbCriteria();
       $criteria -> condition = "Article_Is_Publish = 1 AND Channel_Identify ='".$id."'";
       $criteria -> order ='Article_Create_Time desc';

      $count=TSArticle::model()->count($criteria);

      $pages= new Pager($count);
 
      $pages -> currentPage = (int)$page;
      
      $pages-> pageSize=3;

     

      $pages->applyLimit($criteria);

      $models=TSArticle::model()->findAll($criteria);

 
      $this->render('news_list', array(
          'articles' => $models,
           'pages' => $pages,
           'id' => $id,
           'channel' => $channel,
      ));


	}

	
}