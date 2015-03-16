<?php

class Bus extends CActiveRecord
{
	public function tableName()
	{
		return 'bus';
	}

	public function rules()
	{
		return array(
			array('bus_number', 'unique'),
			array('bus_number, standard, seat_amount', 'required'),
			array('bus_number, seat_amount', 'numerical', 'integerOnly'=>true),
			array('bus_number, standard, seat_amount', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ลำดับที่',
			'bus_number' => 'หมายเลขรถ',
			'standard' => 'ประเภทรถ',
			'seat_amount' => 'จำนวนที่นั่ง',
		);
	}
	
	public function relations()
	{
		return array(
				'scheduleData' => array(self::HAS_MANY, 'Schedule', 'bus_id'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('bus_number',$this->bus_number);
		$criteria->compare('standard',$this->standard,true);
		$criteria->compare('seat_amount',$this->seat_amount);
		$criteria->compare('company_id',$this->company_id = Yii::app()->session['company_id']);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
