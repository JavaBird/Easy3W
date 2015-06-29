<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class BaseController extends CController
{
	protected $_assetsUrl;  
  
    public function getAssetsUrl()  
    {  
        if($this->_assetsUrl===null)  
            $this->_assetsUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.assets.show'),false, -1, YII_DEBUG);  
        return $this->_assetsUrl;  
    }  
  
    public function setAssetsUrl($value)  
    {  
        $this->_assetsUrl=$value;  
    }
}