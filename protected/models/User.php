<?php

class User extends CActiveRecord
{
	public $confirmation_password;
	
	public function tableName()
	{
		return 'user';
	}

	public function rules()
	{
		return array(
			array('username, password, confirmation_password', 'required'),
			array('type_id, company_id', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>45),			
			array('confirmation_password', 'compare', 'compareAttribute'=>'password'),
			array('username', 'unique'),
			array('username', 'email'),
			array('fax', 'safe'),
			array('password', 'length', 'min'=>6, 'max'=>12),
			array('id, username, password, tel, create_date, last_login_date, type_id, company_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'companyProfile' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'userProfile' => array(self::HAS_ONE, 'UserProfile', 'user_id'),
			'staffProfile' => array(self::HAS_ONE, 'StaffProfile', 'user_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'รหัส',
			'username' => 'ชื่อผู้ใช้',
				
			'password' => 'รหัสผ่าน',
			'confirmation_password' => 'ยืนยันรหัสผ่าน',
				
			'oldPassword' => 'รหัสผ่านปัจจุบัน',
								
			'create_date' => 'วันที่สมัคร',
			'last_login_date' => 'เข้าใช้งานล่าสุดเมื่อ',
			'type_id' => 'ประเภทผู้ใช้งาน',
			'company_id' => 'บริษัท',
		);
	}

	public function search()
	{	
		$criteria=new CDbCriteria;
		$criteria->addCondition('type_id <> 4');
		$criteria->compare('username',$this->username,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>5,
			),
		));
	}
	
	public function searchStaff()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('type_id',$this->type_id='2',true);
		$criteria->compare('company_id',$this->company_id = Yii::app()->session['company_id'],true);
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'=>5,
				),
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
