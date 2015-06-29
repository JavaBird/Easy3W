<?php

/**
 * This is the model class for table "t_s_attachment".
 *
 * The followings are the available columns in table 't_s_attachment':
 * @property integer $Attachment_Id
 * @property string $Attachment_Old_Name
 * @property string $Attachment_New_Name
 * @property string $Attachment_File_Type
 * @property string $Attachment_Path
 * @property integer $Attachment_Using
 * @property string $Attachment_Belong_Channel
 * @property string $Attachment_Author
 * @property string $Attachment_Upload_Time
 */
class TSAttachment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_s_attachment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Attachment_Using', 'numerical', 'integerOnly'=>true),
			array('Attachment_Old_Name, Attachment_New_Name, Attachment_File_Type, Attachment_Path, Attachment_Belong_Channel, Attachment_Author', 'length', 'max'=>255),
			array('Attachment_Upload_Time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Attachment_Id, Attachment_Old_Name, Attachment_New_Name, Attachment_File_Type, Attachment_Path, Attachment_Using, Attachment_Belong_Channel, Attachment_Author, Attachment_Upload_Time', 'safe', 'on'=>'search'),
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
			'Attachment_Id' => 'Attachment',
			'Attachment_Old_Name' => 'Attachment Old Name',
			'Attachment_New_Name' => 'Attachment New Name',
			'Attachment_File_Type' => '图片、文档(image,doc)',
			'Attachment_Path' => 'Attachment Path',
			'Attachment_Using' => '附件是否被使用',
			'Attachment_Belong_Channel' => '附件所属栏目标识',
			'Attachment_Author' => '上传者',
			'Attachment_Upload_Time' => '上传时间',
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

		$criteria->compare('Attachment_Id',$this->Attachment_Id);
		$criteria->compare('Attachment_Old_Name',$this->Attachment_Old_Name,true);
		$criteria->compare('Attachment_New_Name',$this->Attachment_New_Name,true);
		$criteria->compare('Attachment_File_Type',$this->Attachment_File_Type,true);
		$criteria->compare('Attachment_Path',$this->Attachment_Path,true);
		$criteria->compare('Attachment_Using',$this->Attachment_Using);
		$criteria->compare('Attachment_Belong_Channel',$this->Attachment_Belong_Channel,true);
		$criteria->compare('Attachment_Author',$this->Attachment_Author,true);
		$criteria->compare('Attachment_Upload_Time',$this->Attachment_Upload_Time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TSAttachment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function scopes(){



		return array('recently' => array('order' => 'Attachment_Upload_Time DESC', ), );

	}
}
