<?php
class EasyUIModel{

	//总数
	public $total;
	
	//数据数值
	public $rows ;


	public  static  function getPageData($countSql,$sql,$page,$rows){

		$easyui = new EasyUIModel();

		$count  = yii::app() -> db ->createCommand($countSql) -> queryAll();
		$count  = $count[0]['num'] * 1;

		$easyui -> total = $count;

		$model = yii::app() -> db ->createCommand($sql.' limit :offset, :limit');
		$model -> bindValue(':offset',($page-1)*$rows);
		$model -> bindValue(':limit',$rows * 1);

		$list =$model -> queryAll();

		$easyui -> rows = $list ;

		return $easyui;



	}

}












































?>