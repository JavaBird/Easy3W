<?php

/**
 * This is the model class for table "t_s_article".
 *
 * The followings are the available columns in table 't_s_article':
 * @property integer $Id
 * @property string $Article_Title
 * @property string $Article_Sub_Title
 * @property string $Article_Author
 * @property string $Article_Create_Time
 * @property string $Article_Content
 * @property string $Article_Summary
 * @property integer $Article_Is_Top
 * @property integer $Article_Is_Publish
 * @property string $Channel_Identify
 * @property string $Channel_Parent_Identify
 * @property string $Logo_Image_path
 */
class TSArticle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_s_article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Article_Is_Top, Article_Is_Publish', 'numerical', 'integerOnly'=>true),
			array('Article_Title, Article_Sub_Title, Article_Author, Article_Summary, Channel_Identify, Channel_Parent_Identify, Logo_Image_path', 'length', 'max'=>255),
			array('Article_Create_Time, Article_Content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Article_Title, Article_Sub_Title, Article_Author, Article_Create_Time, Article_Content, Article_Summary, Article_Is_Top, Article_Is_Publish, Channel_Identify, Channel_Parent_Identify, Logo_Image_path', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Article_Title' => 'Article Title',
			'Article_Sub_Title' => 'Article Sub Title',
			'Article_Author' => 'Article Author',
			'Article_Create_Time' => 'Article Create Time',
			'Article_Content' => 'Article Content',
			'Article_Summary' => 'Article Summary',
			'Article_Is_Top' => 'Article Is Top',
			'Article_Is_Publish' => 'Article Is Publish',
			'Channel_Identify' => 'Channel Identify',
			'Channel_Parent_Identify' => 'Channel Parent Identify',
			'Logo_Image_path' => 'Logo Image Path',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('Article_Title',$this->Article_Title,true);
		$criteria->compare('Article_Sub_Title',$this->Article_Sub_Title,true);
		$criteria->compare('Article_Author',$this->Article_Author,true);
		$criteria->compare('Article_Create_Time',$this->Article_Create_Time,true);
		$criteria->compare('Article_Content',$this->Article_Content,true);
		$criteria->compare('Article_Summary',$this->Article_Summary,true);
		$criteria->compare('Article_Is_Top',$this->Article_Is_Top);
		$criteria->compare('Article_Is_Publish',$this->Article_Is_Publish);
		$criteria->compare('Channel_Identify',$this->Channel_Identify,true);
		$criteria->compare('Channel_Parent_Identify',$this->Channel_Parent_Identify,true);
		$criteria->compare('Logo_Image_path',$this->Logo_Image_path,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TSArticle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
		public function scopes(){

		return array(
			'recently' => array(
				'order' => 'Article_Create_Time DESC', 
			  ),
			'publish' => array(

					'condition' => 'Article_Is_Publish = 1',

				),
			 'limit' => array(

			 	'limit' => 6,


			 	),
			 'limit1' => array(
			 	'limit' => 1,


			 	),
			 'limit3' => array(
			 	'limit' => 3,


			 	),




		 );

	}
}
