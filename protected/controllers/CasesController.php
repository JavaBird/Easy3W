<?php
/*成功案例*/
class CasesController extends BaseController
{

	public $layout = '//layouts/showLayout';

	public $menu = 'menu3';//成功案例

	public $breadcrumbs = array();

	/*成功案例列表*/
	public function actionCaseForOne(){

		$id = yii::app() -> request ->getParam('id');

		 $currChannel = TSChannel::model() -> find('Channel_Identify =:ci',array(':ci' => 'cgal'));

		$channelList = TSChannel::model() -> findAll('Channel_Pid=:cpi',array(':cpi' =>  $currChannel -> Id  ));

        $cList = array();

        foreach ($channelList as  $value) {
           
           if($value -> Channel_Identify == $id){

           		$cList[] = array('ctitle' => $value ->Channel_Name,'href' => $this->createUrl('cases/caseForOne',array('id' => $value -> Channel_Identify,)),'class' =>'a2');

           }else{

           	 $cList[] = array('ctitle' => $value ->Channel_Name,'href' => $this->createUrl('cases/caseForOne',array('id' => $value -> Channel_Identify,)),'class' =>'');
           }

        }

        $articles = TSArticle::model() -> publish() -> recently() -> findAll('Channel_Identify =:ci',array(':ci' => $id));

        $list = array();

        foreach ($articles as  $value) {
            
          $channel = TSChannel::model() -> find('Channel_Identify = :ci',array(':ci' =>$id, ));

          $list[] = array('article' => $value,'channel' =>$channel,);

        }

     
        $this -> render('cases', array('list' => $list,'cList' => $cList,));


	}

	/*成功案例详情页*/
	public function actionCaseDetail(){
		
		$id = yii::app() -> request ->getParam('id');

		$article = TSArticle::model() -> findByPk($id);

		$parentChannel = TSChannel::model() -> find('Channel_Identify =:pChannelIden',array(':pChannelIden'=>$article -> Channel_Parent_Identify,));

		$channel = TSChannel::model() -> find('Channel_Identify =:channelIden',array("channelIden" => $article -> Channel_Identify,));

		$this -> breadcrumbs = array($parentChannel ->Channel_Name  => $this->createUrl('show/cases'),$channel -> Channel_Name => $this->createUrl('cases/caseForOne',array('id' => $article -> Channel_Identify,)),$article -> Article_Title,);

		
		$this->render('case_detail',array('article' => $article,
					
		));
		
		


	}

	
}