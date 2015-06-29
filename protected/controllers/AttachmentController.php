<?php

class AttachmentController extends Controller
{
	public function actionNote()
	{
		$this->renderPartial('note');
	}

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

		$this -> renderPartial('grid',array('treeId' => $id , ));

	}

	//加载表格数据
	public function actionLoadGrid(){


		$id = yii::app() -> request ->getParam('id');
		$page = yii::app() -> request -> getParam('page');
		$rows = yii::app() -> request -> getParam('rows');
		$attachmentName = yii::app() -> request -> getParam('attachmentName');
		$startTime = yii::app() -> request -> getParam('startTime');
		$endTime = yii::app() -> request -> getParam('endTime');

		$sql = " SELECT
			t.Attachment_Id as id,
			t.Attachment_Old_Name as attachmentName,
			t.Attachment_File_Type as attachmentType,
			t.Attachment_Upload_Time as attachmentUpdateTime,
			t.Attachment_Author as attachmentAuthor
		FROM
			t_s_attachment t
		where 1=1 
		 and t.Attachment_Belong_Channel = '".$id."'";

		$countSql = "SELECT count(*) as num from t_s_attachment t where 1=1 and t.Attachment_Belong_Channel ='".$id."'";
		
		if(isset($attachmentName) && !empty($attachmentName)){

			$sql.="and t.Attachment_Old_Name like '%".$attachmentName."%'";

			 $countSql.= " and t.Attachment_Old_Name like '%".$attachmentName."%'";


		}
		if(isset($startTime) && !empty($startTime)){

			$sql.=' and t.Attachment_Upload_Time >= '.$startTime;
			 $countSql.= ' and t.Attachment_Upload_Time >='.$startTime;

		}

		if(isset($endTime) && !empty($endTime)){

			$sql.=' and t.Attachment_Upload_Time <= '.$endTime;
			 $countSql.= ' and t.Attachment_Upload_Time <='.$endTime;

		}

		$sql.=' order by t.Attachment_Upload_Time desc';


        $easyui = EasyUIModel::getPageData($countSql,$sql,$page,$rows);


        echo json_encode($easyui,JSON_UNESCAPED_UNICODE);
	}


	//上传文件
	public function actionUploadFile(){

		try {
			$channelId = yii::app() -> request -> getParam('channelId');
			$file = CUploadedFile::getInstanceByName('file');
			$oldName = $file -> getName();
			$type =   $file -> getType();
			$newName = date('Ymdhis').'.'.$file -> getExtensionName();

			$attachment = new TSAttachment;
			$attachment -> Attachment_Old_Name = $oldName;
			$attachment -> Attachment_New_Name = $newName;
			$attachment -> Attachment_File_Type = $type;
			$attachment -> Attachment_Belong_Channel = $channelId;
			$attachment -> Attachment_Upload_Time = date("Y-m-d H:i:s", time());
			$attachment -> Attachment_Author = yii::app() ->user ->currUserName;
			$attachment -> Attachment_Path = Yii::getPathOfAlias('application.assets').'/upload';

			$uploadFile = Yii::getPathOfAlias('application.assets').'/upload//'.$newName;
			$flag  =  $file -> saveAs($uploadFile);
			$length = $attachment -> save();
			if($flag && $length > 0){

				echo json_encode(array('flag' =>'SUCCESS' , 'message' => '上传附件成功！'),JSON_UNESCAPED_UNICODE);
				
				}else{

					echo json_encode(array('flag' =>'ERROR' , 'message' => '上传附件失败！'),JSON_UNESCAPED_UNICODE);
				}
				
		} catch (Exception $e) {
			
			echo json_encode(array('flag' =>'Exception' , 'message' => $e -> getMessage(),),JSON_UNESCAPED_UNICODE);

		}



	}

	/*下载附件*/
	public function actionDownload(){

			$id = yii::app() -> request -> getParam('id');

			$attachment = TSAttachment::model() -> findByPk($id);

			$fileName = $attachment -> Attachment_New_Name;
			$fileOldName = $attachment -> Attachment_Old_Name;

			$this -> renderPartial('download',array('fileName' => $fileName,'fileOldName' => $fileOldName,));


	}


	/*删除附件*/
	public function actionDeleteAttachment(){

		try {
			
			$ids = yii::app() -> request -> getParam('ids');
			
			$path = Yii::getPathOfAlias('application.assets').'/upload/';


			  $list = TSAttachment::model() -> findAll('Attachment_Id in ('.$ids.')');

			  for ($i=0 ; $i < count($list) ; $i++ ) { 
						
					$att = $list[$i];

					$fileName = $att -> Attachment_New_Name;
					if(file_exists ($path.$fileName )){
						
						unlink($path.$fileName);
						TSAttachment::model() -> deleteByPk($att -> Attachment_Id);
					}

				}

				echo json_encode(array('flag' =>'SUCCESS' ,'message' => '删除成功！' ),JSON_UNESCAPED_UNICODE);

		} catch (Exception $e) {
			
			echo json_decode(array('flag' =>'Exception' ,'message' => $e -> getMessage(), ),JSON_UNESCAPED_UNICODE);
		}

	}



	
}