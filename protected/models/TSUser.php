<?php

/**
 * This is the model class for table "t_s_user".
 *
 * The followings are the available columns in table 't_s_user':
 * @property integer $ID
 * @property string $User_Name
 * @property string $Password
 * @property string $Create_Time
 * @property string $Login_Time
 * @property integer $Enable
 */
class TSUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_s_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Enable', 'numerical', 'integerOnly'=>true),
			array('User_Name, Password', 'length', 'max'=>255),
			array('Create_Time, Login_Time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, User_Name, Password, Create_Time, Login_Time, Enable', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'User_Name' => 'User Name',
			'Password' => 'Password',
			'Create_Time' => 'Create Time',
			'Login_Time' => 'Login Time',
			'Enable' => '默认不启用',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('User_Name',$this->User_Name,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Create_Time',$this->Create_Time,true);
		$criteria->compare('Login_Time',$this->Login_Time,true);
		$criteria->compare('Enable',$this->Enable);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TSUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
