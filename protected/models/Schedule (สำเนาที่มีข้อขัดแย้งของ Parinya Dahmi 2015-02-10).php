<?php

class Schedule extends CActiveRecord
{

	public function tableName()
	{
		return 'schedule';
	}

	public function rules()
	{
		return array(
			array('start, dest, price, company, leave_time, arrive_time, standard', 'required'),
			array('price', 'numerical','min'=>1),
			array('start, dest, price, company, standard', 'length', 'max'=>45),
			array('ID, start, dest, price, company, leave_time, arrive_time, standard, bank, bank_account_number, company_id', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'ID' => 'หมายเลข',
			'start' => 'ต้นทาง',
			'dest' => 'ปลายทาง',
			'price' => 'ราคา',
			'company' => 'บริษัท',
			'leave_time' => 'เวลาออก',
			'arrive_time' => 'เวลาถึง',
			'standard' => 'มาตรฐานรถ',
			'bank' => 'ธนาคาร',
			'account_name' => 'ชื่อบัญชีธนาคาร',
			'bank_account_number' => 'เลขบัญชี',
			'company_id' => 'รหัสบริษัท',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('dest',$this->dest,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('leave_time',$this->leave_time,true);
		$criteria->compare('arrive_time',$this->arrive_time,true);
		$criteria->compare('standard',$this->standard,true);
		$criteria->compare('company_id',$this->company_id = Yii::app()->session['company_id']);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>10,
			),
		));
	}
	
	public function searchForBooking()
	{
		$criteria=new CDbCriteria;
	
		$criteria->compare('ID',$this->ID);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('dest',$this->dest,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('leave_time',$this->leave_time,true);
		$criteria->compare('arrive_time',$this->arrive_time,true);
		$criteria->compare('standard',$this->standard,true);
		$criteria->compare('company_id',$this->company_id,true);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'=>10,
				),
		));
	}
	
	public function searchForStaffBooking()
	{
		$criteria=new CDbCriteria;
	
		$criteria->compare('ID',$this->ID);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('dest',$this->dest,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('leave_time',$this->leave_time,true);
		$criteria->compare('arrive_time',$this->arrive_time,true);
		$criteria->compare('standard',$this->standard,true);
		$criteria->compare('company_id',$this->company_id = Yii::app()->session['company_id']);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'=>10,
				),
		));
	}
	
	public function searchForGuest()
	{
		$criteria=new CDbCriteria;
	
		$criteria->compare('ID',$this->ID);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('dest',$this->dest,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('leave_time',$this->leave_time,true);
		$criteria->compare('arrive_time',$this->arrive_time,true);
		$criteria->compare('standard',$this->standard,true);
		$criteria->compare('company_id',$this->company_id,true);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'=>20,
				),
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
