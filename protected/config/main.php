<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	'homeUrl' =>'/show/index.html',

	// 设置默认的action
	'defaultController'=>'show',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			
			'ipFilters'=>array('127.0.0.1','::1'),
		),*/
		
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl' => 'admin/index',
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
				'show/<action:\w+>' => array('show/<action>','urlSuffix'=>'.html'),
				'news/<page:\d+>/<id:\w+>' => array('news/newsList','urlSuffix' =>'.html'),
				'news/<id:\d+>' => array('news/detail','urlSuffix' =>'.html'),
				'cases/<id:\w+>' => array('cases/caseForOne','urlSuffix' =>'.html'),
				'cases/<year:\d{4}>/<id:\d+>' => array('cases/caseDetail','urlSuffix' =>'.html'),
				'solutions/<id:\d+>' => array('solutions/detial','urlSuffix' =>'.html'),
				'<controller:\w+>/<action:\w+>/tag/<id:\w+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',

				
			),
		),
		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'show/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'trace, info,error,warning',
				
				),
				// uncomment the following to show log messages on web pages
				
				/*array(
					'class'=>'CWebLogRoute',
					'showInFireBug'=>true,
					'categories'=>'system.db.*',

				),*/
				
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
