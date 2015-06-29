<?php

class UserController extends Controller
{
	/*加载用户管理主页*/
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	/*加载表格*/
	public function actionLoadGrid(){


		$page = yii::app() -> request -> getParam('page');
		$rows = yii::app() -> request -> getParam('rows');
		$username = yii::app() -> request -> getParam('username');
		$startTime = yii::app() -> request -> getParam('startTime');
		$endTime = yii::app() -> request -> getParam('endTime');


		$sql = ' SELECT
				t.ID AS id,
				t.User_Name AS username,
				t.Create_Time AS createTime,
				t.Login_Time AS loginTime,
				t.Enable AS enable
				  FROM
					t_s_user t
		  			WHERE 1 = 1 ';

		 $countSql = 'SELECT count(*) as num from t_s_user t where 1=1 ';

		if(isset($username) && !empty($username)){

			$sql.="and t.User_Name = '".$username."'";

			 $countSql.= " and t.User_Name = '".$username."'";


		}
		if(isset($startTime) && !empty($startTime)){

			$sql.=' and t.Create_Time >= '.$startTime;
			 $countSql.= ' and t.Create_Time >='.$startTime;

		}

		if(isset($endTime) && !empty($endTime)){

			$sql.=' and t.Create_Time <= '.$endTime;
			 $countSql.= ' and t.Create_Time <='.$endTime;

		}

		 $sql.=' order by t.Create_Time desc';


		$easyui = EasyUIModel::getPageData($countSql,$sql,$page,$rows);


        echo json_encode($easyui,JSON_UNESCAPED_UNICODE);

	}


	//新建用户
	public function actionSaveNewUser(){

		try {
			
			$username  = yii::app() -> request -> getParam('username');
			$password = yii::app() -> request -> getParam('password');
			$enable = yii::app() -> request -> getParam('enable');

			$list = yii::app() -> db -> createCommand()
				-> select('id')
				-> from('t_s_user ')
				-> where('User_Name = :username',array(':username' => $username,))
				-> queryAll();

			if(count($list) > 0){

				echo json_encode(array('flag' =>'ERROR' , 'message' => '用户名重复！'),JSON_UNESCAPED_UNICODE);

			}else{

				$user = new TSUser;

				$user -> User_Name  = $username;
				$user -> Password = md5($password);	
				$user -> Create_Time = date("Y-m-d H:i:s",time());
				$user -> Enable = $enable;

				 $f = $user -> save();

				if($f){

					echo json_encode(array('flag' =>'SUCCESS' , 'message' => '新建用户成功！'),JSON_UNESCAPED_UNICODE);
				}else{

					echo json_encode(array('flag' =>'ERROR' , 'message' => '新建用户失败！'),JSON_UNESCAPED_UNICODE);
				}


			}


		} catch (Exception $e) {
			
			echo json_encode(array('flag' =>'Exception' , 'message' => $e->getMessage(),),JSON_UNESCAPED_UNICODE);
		}

	}


	/*编辑用户*/	
	public function  actionEditUser(){

		try {
			
				$id = yii::app() -> request -> getParam("id");
				$username = yii::app() -> request -> getParam("username");
			
				$enable = yii::app() -> request -> getParam("enable");


				$num = yii::app() -> db -> createCommand()
					->update('t_s_user',array('Enable' =>$enable, ),'ID =:id',array(':id' => $id,));


			
				
				if($num >0){

							echo json_encode(array('flag' =>'SUCCESS' , 'message' => '修改用户成功！'),JSON_UNESCAPED_UNICODE);
				}else{

							echo json_encode(array('flag' =>'ERROR' , 'message' => '修改用户失败！'),JSON_UNESCAPED_UNICODE);
				}

		} catch (Exception $e) {

			echo json_encode(array('flag' =>'Exception' , 'message' => $e->getMessage(),),JSON_UNESCAPED_UNICODE);
		}
	}


	public function actionEdit(){

		$id = yii::app() -> request -> getParam("id");

		$user = TSUser::model() -> findByPk($id);

		echo json_encode(array('username' =>$user -> User_Name, 'enable' => $user ->  Enable ),JSON_UNESCAPED_UNICODE);


	}

	public function actionDeleteUser(){

		try {
			
			$ids = yii::app() -> request -> getParam('ids');

			$count  = TSUser::model() -> deleteAll('Id in ('.$ids.')');
			if($count > 0){

				echo json_encode(array('flag' =>'SUCCESS' ,'message' => '删除成功！' ),JSON_UNESCAPED_UNICODE);

			}else{

				echo json_encode(array('flag' =>'SUCCESS' ,'message' => '删除失败！' ),JSON_UNESCAPED_UNICODE);
			}

			

		} catch (Exception $e) {
			
			echo json_decode(array('flag' =>'Exception' ,'message' => $e -> getMessage(), ),JSON_UNESCAPED_UNICODE);
		}




	}
	
}