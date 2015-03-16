<?php

/**
 * This is the model class for table "staff_profile".
 *
 * The followings are the available columns in table 'staff_profile':
 * @property integer $id
 * @property string $title
 * @property string $s_firstname
 * @property string $s_lastname
 * @property string $company_name
 * @property integer $manager_id
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 */
class StaffProfile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'staff_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, s_firstname, s_lastname, tel', 'required'),
			array('tel', 'length', 'is'=>10),
			array('tel','numerical','integerOnly'=>true),
			array('title, s_firstname, s_lastname, company_name', 'length', 'max'=>45),
			array('id, title, s_firstname, s_lastname, company_name, manager_id, user_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'title' => 'คำนำหน้า',
			's_firstname' => 'ชื่อจริง',
			's_lastname' => 'นามสกุล',
			'company_name' => 'บริษัท',
			'tel' => 'เบอร์โทรศัพท์',
			'manager_id' => 'รหัสผู้ประกอบการ',
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
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('s_firstname',$this->s_firstname,true);
		$criteria->compare('s_lastname',$this->s_lastname,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('manager_id',$this->manager_id);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StaffProfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
