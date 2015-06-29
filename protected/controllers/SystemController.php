<?php
/*系统设置控制器*/
class SystemController extends Controller
{
	/*左侧导航*/
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	/*说明*/
	public function actionNote(){

		$this->renderPartial('note');
	}
}