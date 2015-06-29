<?php

class ShowController extends BaseController
{
	// 配置模块默认布局layout   zhangxh   2015-5-16
    public $layout = '//layouts/showLayout';

	public $menu = 'menu1';//默认首页

    //首页
    public function actionIndex()
	{

        // 查询新闻资讯6条新闻

       $articleList = TSArticle::model() ->recently() ->limit() -> findAll('Article_Is_Publish=:id and Channel_Parent_Identify =:id2',array(':id' =>1,':id2'=>'xwzx'));

       // 查询3条经典案例

       $cases = TSArticle::model() -> publish() -> recently() -> limit3() -> findAll('Channel_Parent_Identify =:cpi',array(':cpi' => 'cgal'));

       $this -> menu = 'menu1';

		$this->render('index',array('articleList' => $articleList ,'newChannel' => 'xwzx','cases' => $cases));
	}

    //跳转错误页面
    public function actionError(){


        $this ->renderPartial('error');


    }

    //新闻动态
	public function actionNews(){

        $result = array();

        $channelList = TSChannel::model() -> findAll('Channel_Pid =:id', array(':id' => 2, ));

        for ($i=0; $i <count($channelList) ; $i++) { 
            
            $channel = $channelList[$i];

            $article = TSArticle::model() ->publish() -> recently() ->limit1() -> findAll('Channel_Identify=:id',array(':id' => $channel -> Channel_Identify));

            $result[$i] = array('channel' => $channel,'article' => $article);
        }

        $this -> menu = 'menu7';
		$this -> render('news',array('result' =>$result , ));
	}

    //成功案例
    public function actionCases(){

        $currChannel = TSChannel::model() -> find('Channel_Identify =:ci',array(':ci' => 'cgal'));
        $channelList = TSChannel::model() -> findAll('Channel_Pid=:cpi',array(':cpi' => $currChannel -> Id ));

        $cList = array();

        foreach ($channelList as  $value) {
           
            $cList[] = array('ctitle' => $value ->Channel_Name,'href' => $this->createUrl('cases/caseForOne',array('id' => $value -> Channel_Identify,)));

        }
       

        $articles = TSArticle::model() -> publish() -> recently() -> findAll('Channel_Parent_Identify =:cpi',array(':cpi' => 'cgal'));

        $list = array();

        foreach ($articles as  $value) {
            
          $channel = TSChannel::model() -> find('Channel_Identify = :ci',array(':ci' =>$value ->Channel_Identify, ));

          $list[] = array('article' => $value,'channel' =>$channel,);
        }

        $this -> menu = 'menu3';
        $this -> render('cases', array('list' => $list,'cList' => $cList,));

    }
    

    //解决方案

      public function actionSolutions(){

        $articles = TSArticle::model() -> publish() -> recently() -> findAll('Channel_Identify =:ci',array(':ci' => 'jjfa'));
        $this -> menu = 'menu6';
        $this -> render('solutions',array('articles' => $articles));

      }
   
    //关于我们
      public function actionAbout(){


        $this -> menu = 'menu2';
        $this -> render('about');

      }

      //联系我们
      public function actionContact(){



        $this -> menu = 'menu8';

        $this -> render('contact');



      }







}