<?php

class ChannelController extends Controller
{

	public $layout = '//layouts/adminLayout';

	//保存栏目信息
	public function actionSaveNew(){
         
		try {
			
			$channelName = Yii::app()->request->getParam('channelName');
	       	$contentType = Yii::app()->request->getParam('contentType');
	       	$channelType = Yii::app()->request->getParam('channelType');
	       	$channelIdentify = Yii::app()->request->getParam('channelIdentify');
	       	$pid = yii::app()->request->getParam('pid');
	        $list = TSChannel::model() -> findAll('Channel_Identify=:channelIdentify', array(':channelIdentify' =>$channelIdentify , ));

	        if(count($list) >=1 ){
	        	$result = array('flag' =>'ERROR' ,'message'=>'栏目标识符已经存在！' );
	        	echo json_encode($result,JSON_UNESCAPED_UNICODE);
	        }else{
			        $model= new TSChannel;
					$model-> Channel_Pid= $pid;
					$model-> Channel_Is_Title=$contentType;
					$model-> Channel_Is_Parent= $channelType == '0'?'true':'false';
					$model-> Channel_Name=$channelName;
					$model-> Channel_Is_Open='true';
					$model-> Channel_Identify = $channelIdentify;

					$flag = $model-> save();

					$result = array('flag' =>'SUCCESS', 'message' => '栏目添加成功！','newNodes' => array('id' => $model->Id ,'name' => $model->Channel_Name,'pId'=>$model->Channel_Pid,'isParent'=> $model->Channel_Is_Parent,'open'=>$model->Channel_Is_Open) );
					echo json_encode($result,JSON_UNESCAPED_UNICODE);

	        }
	       	

	       	
		} catch (Exception $e) {
			$result = array('flag' => 'Exception','message' =>$e->getMessage(), );
			echo  json_encode($result,JSON_UNESCAPED_UNICODE);
		}

	}


	//删除栏目信息
	public function actionDeleteNode(){
		try {
			
			$id = Yii::app()->request->getParam('id');
			$this -> dNode($id);
			$result = array('message'=>'SUCCESS');
			echo json_encode($result,JSON_UNESCAPED_UNICODE);

		} catch (Exception $e) {
			
			$result = array('message' =>$e->getMessage(), );
			echo  json_encode($result,JSON_UNESCAPED_UNICODE);
		}
			

	}

	//递归删除
	public function dNode($id){

		$lists = TSChannel::model() -> findAll('Channel_Pid =:id',array(':id' => $id, ));
		if(  count($lists) > 0 )
		{

			foreach ($lists as  $value) {
				$this -> dNode($value -> Id);
			}
		 $tmodel =	TSChannel::model() -> findByPk($id);
		  $tmodel -> delete();
		}else{

		  $tmodel =	TSChannel::model() -> findByPk($id);
		  $tmodel -> delete();
		}

	}


	/*加载栏目树*/
	public function actionLoadChannels(){

		$channels = TSChannel::model()->findAll();

		$result = array();

		for ($i=0; $i <count($channels) ; $i++) { 
			$c = $channels[$i];
			$result[$i] =  array('id' => $c->Id ,'name' => $c->Channel_Name,'pId'=>$c->Channel_Pid,'isParent'=> $c->Channel_Is_Parent,'open'=>$c->Channel_Is_Open );
		}


		$json = json_encode($result,JSON_UNESCAPED_UNICODE);

		$this ->renderPartial('channelsTree',array(

			'znodes' => $json ,

			));

	}

	//编辑节点
	public function actionEditNode(){


		 $id = Yii::app()->request->getParam('id');
		 $tmodel =	TSChannel::model() -> findByPk($id);
		 $result  = array('id' =>$tmodel -> Id , 'channelType' => ($tmodel -> Channel_Is_Parent)=='true'?'0':'1','contentType' => $tmodel -> Channel_Is_Title,'channelName' => $tmodel ->Channel_Name,'channelIdentify'=> $tmodel -> Channel_Identify,);
		 echo json_encode($result);
	}

	//保存节点
	public function actionSaveEdit(){

		try {
			$channelName = Yii::app()->request->getParam('channelName');
	       	$contentType = Yii::app()->request->getParam('contentType');
	       	$channelType = Yii::app()->request->getParam('channelType');
	       	$channelIdentify = Yii::app()->request->getParam('channelIdentify');

	       	$id = Yii::app()->request->getParam('id');
	        $list =	TSChannel::model() -> findAll('Id=:id and Channel_Identify =:ident', array(':id' =>$id , ':ident' => $channelIdentify));
	        if(count($list) >0 ){

	        	$tmodel = $list[0];
		        $tmodel-> Channel_Is_Title=$contentType;
				$tmodel-> Channel_Is_Parent= $channelType == '0'?'true':'false';
				$tmodel-> Channel_Name=$channelName;
				$tmodel-> Channel_Identify=$channelIdentify;
				$tmodel -> save();
				$result = array('flag' =>'SUCCESS' ,'message' => '栏目修改成功！','name'=> $channelName);
			    echo json_encode($result);

	        }else{

	          $list_ =	TSChannel::model() -> findAll('Channel_Identify =:ident',array(':ident' => $channelIdentify , ));

	        	if(count($list_) > 0){

	        	  $result = array('flag' =>'ERROR','message' => '栏目标示已存在！');

			      echo json_encode($result);

	        	}else{

	        		$tmodel = TSChannel::model() -> findByPk($id );
			        $tmodel-> Channel_Is_Title=$contentType;
					$tmodel-> Channel_Is_Parent= $channelType == '0'?'true':'false';
					$tmodel-> Channel_Name=$channelName;
					$tmodel-> Channel_Identify=$channelIdentify;
					$tmodel -> save();
					$result = array('flag' =>'SUCCESS' ,'message' => '栏目修改成功！','name'=> $channelName);
				    echo json_encode($result);


	        	}

	        }

	      
		} catch (Exception $e) {
			
			$result = array('flag' => 'Exception','message' => $e->getMessage(), );
			echo json_encode($result);
		}
		    
	}

	//说明
	public function actionNote(){


		$this -> renderPartial('note');
	}

	
}