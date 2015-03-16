<?php

class CompanyProfile extends CActiveRecord
{

	public function tableName()
	{
		return 'company_profile';
	}

	public function rules()
	{
		return array(
			array('company_name, m_firstname, m_lastname, tel, fax, 
				   address, bank, account_name, bank_account_number', 'required'),
				
			array('company_name, m_firstname, m_lastname', 'length', 'max'=>45),

			array('tel, fax, bank_account_number','numerical','integerOnly'=>true),
				
			array('tel,fax','length','is'=>9),
			array('fax','safe'),
			array('company_name','unique'),
				
			array('id, company_name, m_firstname, m_lastname, tel, fax, 
				   address', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'รหัสผู้ใช้',
			'company_name' => 'ชื่อบริษัท',
			'm_firstname' => 'ชื่อเจ้าของบริษัท',
			'm_lastname' => 'นามสกุลเจ้าของบริษัท',
			'tel' => 'เบอร์โทรศัพท์',
			'fax' => 'เบอร์แฟกซ์',
			'address' => 'ที่ตั้งบริษัท',
			'bank' => 'ธนาคาร',
			'account_name' => 'ชื่อบัญชีธนาคาร',
			'bank_account_number' => 'เลขบัญชี',
		);
	}
	
	public function relations()
	{
		return array(
				'userCompany' => array(self::HAS_ONE, 'User', 'company_id'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('m_firstname',$this->m_firstname,true);
		$criteria->compare('m_lastname',$this->m_lastname,true);
		$criteria->compare('tel',$this->tel);
		$criteria->compare('fax',$this->fax);
		$criteria->compare('address',$this->address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
