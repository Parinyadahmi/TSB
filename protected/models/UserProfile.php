<?php

/**
 * This is the model class for table "user_profile".
 */
class UserProfile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_profile';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('title, firstname, lastname, tel', 'required'),	
			array('address', 'safe'),
			array('tel','numerical','integerOnly'=>true),
			array('tel', 'length', 'is'=>10),
		);
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id'=>'ID',
				'title'=>'คำนำหน้า',
				'firstname'=>'ชื่อจริง',
				'lastname'=>'นามสกุล',
				'tel'=>'เบอร์โทรศัพท์',
				'address' => 'ที่อยู่',
				'user_id' => 'รหัสผู้ใช้',
		);
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}