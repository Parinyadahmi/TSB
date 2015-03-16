<?php

class Promotion extends CActiveRecord
{

	public function tableName()
	{
		return 'promotion';
	}

	public function rules()
	{
		return array(
			array('name,start_date, end_date, discount_percent, detail', 'required'),
			array('discount_percent, company_id', 'numerical', 'integerOnly'=>true),
			array('name,start_date, end_date, discount_percent, detail, company_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'companyPromotion' => array(self::BELONGS_TO, 'Company', 'company_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'รหัส',
			'name' => 'ชื่อโปรโมชั่น',
			'start_date' => 'วันที่เริ่มโปรโมชั่น',
			'end_date' => 'วันที่สิ้นสุดโปรโมชั่น',
			'discount_percent' => 'ส่วนลด (%)',
			'detail' => 'รายละเอียด',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('discount_percent',$this->discount_percent);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('company_id',$this->company_id = Yii::app()->session['company_id']);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeSave(){
		$this->start_date = date('Y-m-d', strtotime($this->start_date));
		$this->end_date = date('Y-m-d', strtotime($this->end_date));	
		return true;
	}
	
	public function afterFind(){
		$this->start_date = date('d-m-Y', strtotime($this->start_date));
		$this->end_date = date('d-m-Y', strtotime($this->end_date));
		return true;
	}
}
