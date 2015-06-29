<?php

class SolutionsController extends BaseController
{

	// 配置模块默认布局layout   zhangxh   2015-5-16
    public $layout = '//layouts/showLayout';

	public $menu = 'menu6';//默认解决方案
	
	public $breadcrumbs = array();

	//解决方案详细
	public function actionDetial(){

		$id = yii::app() -> request ->getParam('id');

		$article = TSArticle::model() -> findByPk($id);

		$channel = TSChannel::model() -> find('Channel_Identify =:channelIden',array("channelIden" => $article -> Channel_Identify,));

		$this -> breadcrumbs = array($channel -> Channel_Name => $this->createUrl('show/solutions'),$article -> Article_Title,);

		$list = TSArticle::model()  ->publish() -> findAll('Id != :id and Channel_Identify =:ci',array(':id' => $id,':ci' => $article -> Channel_Identify, ));

		$this->render('solutions_detail',array('article' => $article,'list' => $list,
					
		));


	}

	
}