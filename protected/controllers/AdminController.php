<?php

class AdminController extends Controller
{

	// 配置模块默认布局layout   zhangxh   2015-5-16
    public $layout = '//layouts/adminLayout';


    private $_assetsUrl;  
  

    public function actions(){
		    	 return array( 
		        // captcha action renders the CAPTCHA image displayed on the contact page
		        'captcha'=>array(
		                'class'=>'CCaptchaAction',
		                'backColor'=>0xFFFFFF, 
		                'maxLength'=>4,       // 最多生成几个字符
		                'minLength'=>4,       // 最少生成几个字符
		                'height'=>'30',
		                'width'=>'90',
		                'transparent'=>true,
		        ), 
		    ); 
    }

		   public function accessRules(){
			return array(
				array('allow',
		            'actions'=>array('captcha'),
		            'users'=>array('*'),
		            ),
			);
		}



    public function getAssetsUrl()  
    {  
        if($this->_assetsUrl===null)  
            $this->_assetsUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.assets.admin'),false, -1, YII_DEBUG);  
        return $this->_assetsUrl;  
    }  
  
    public function setAssetsUrl($value)  
    {  
        $this->_assetsUrl=$value;  
    }


    //系统登录页
	public function actionIndex()
	{
		
		$this->renderPartial('index',array('title' =>'登录后台系统'  ),false,true);
	}

	public function actionShort(){

		$flag = Yii::app()->user->isGuest;
		if(!$flag){

			$this->render('main');
		}else{
			$this -> redirect($this->createUrl('admin/index'));
		}



		
	}

	//系统首页跳转
	public function actionLogin()
	{

		try {
				
				$username = $_POST['username'];
				$password = $_POST['password'];
				$verifyCode = $_POST['verifyCode'];

				$_verifyCode =$this->createAction('captcha')->getVerifyCode();

				if($verifyCode === $_verifyCode){

					$identity=new UserIdentity($username,$password);
					if($identity->authenticate()){
						Yii::app()->user->login($identity);
						yii::app() ->user->setState('currUserName',$username);
						echo json_encode(array('flag' =>'SUCCESS' ,'message' => '登录成功！' ),JSON_UNESCAPED_UNICODE);
						
					}else{

						echo json_encode(array('flag' =>'ERROR' ,'message' => '用户名或者密码错误！' ),JSON_UNESCAPED_UNICODE);


					}

				}else{

					echo json_encode(array('flag' =>'ERROR' ,'message' => '验证码不正确！' ),JSON_UNESCAPED_UNICODE);

				}
			    
				


		} catch (Exception $e) {
			
			echo json_encode(array('flag' =>'Exception' ,'message' => $e -> getMessage(),),JSON_UNESCAPED_UNICODE);
		}

	}

	//注销当前用户
	public function actionLoginOut(){

		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
		
	}
}