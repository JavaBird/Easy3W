<?php

/**
 * This is the model class for table "t_s_channel".
 *
 * The followings are the available columns in table 't_s_channel':
 * @property integer $Id
 * @property string $Channel_Name
 * @property integer $Channel_Pid
 * @property integer $Channel_Is_Title
 * @property string $Channel_Is_Parent
 * @property string $Channel_Is_Open
 * @property string $Channel_Identify
 */
class TSChannel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_s_channel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Channel_Pid, Channel_Is_Title', 'numerical', 'integerOnly'=>true),
			array('Channel_Name, Channel_Is_Parent, Channel_Is_Open, Channel_Identify', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Channel_Name, Channel_Pid, Channel_Is_Title, Channel_Is_Parent, Channel_Is_Open, Channel_Identify', 'safe', 'on'=>'search'),
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
			'Channel_Name' => 'Channel Name',
			'Channel_Pid' => 'Channel Pid',
			'Channel_Is_Title' => 'Channel Is Title',
			'Channel_Is_Parent' => 'Channel Is Parent',
			'Channel_Is_Open' => 'Channel Is Open',
			'Channel_Identify' => 'Channel Identify',
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
		$criteria->compare('Channel_Name',$this->Channel_Name,true);
		$criteria->compare('Channel_Pid',$this->Channel_Pid);
		$criteria->compare('Channel_Is_Title',$this->Channel_Is_Title);
		$criteria->compare('Channel_Is_Parent',$this->Channel_Is_Parent,true);
		$criteria->compare('Channel_Is_Open',$this->Channel_Is_Open,true);
		$criteria->compare('Channel_Identify',$this->Channel_Identify,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TSChannel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
