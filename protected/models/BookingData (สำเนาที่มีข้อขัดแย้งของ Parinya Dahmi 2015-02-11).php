<?php

class BookingData extends CActiveRecord
{
	public $_price;

	public function tableName()
	{
		return 'booking_data';
	}

	public function rules()
	{
		return array(
			array('start, dest, price, company, leave_time, arrive_time, standard, company_id, 
				  passenger_name, passenger_tel, amount, departure_date', 'required'),
			array('start, dest, company, leave_time, arrive_time, standard, passenger_name, pay_stat', 'length', 'max'=>45),
			array('passenger_tel', 'length', 'is'=>10),
			array('passenger_tel','numerical','integerOnly'=>true),
			array('ID, start, dest, price, company, leave_time, arrive_time, standard, 
					company_id, passenger_name, passenger_tel, amount, departure_date, 
					booking_date, pay_stat, user_id, staff_name', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'ID' => 'รหัสการจอง',
			'start' => 'ต้นทาง',
			'dest' => 'ปลายทาง',
			'price' => 'ราคารวม',
			'company' => 'บริษัท',
			'leave_time' => 'เวลาออก',
			'arrive_time' => 'เวลาถึง',
			'standard' => 'มาตรฐานรถ',
			'bank' => 'ธนาคาร',
			'account_name' => 'ชื่อบัญชีธนาคาร',
			'bank_account_number' => 'เลขบัญชี',
			'passenger_name' => 'ชื่อผู้โดยสาร',
			'passenger_tel' => 'เบอร์ผู้โดยสาร',
			'amount' => 'จำนวนที่นั่ง',
			'departure_date' => 'วันที่เดินทาง',
			'pay_stat' => 'สถานะ',
			'staff_name' => 'ผู้ทำรายการ',
			'user_id' => 'รหัสลูกค้า',
			'company_id' => 'รหัสบริษัท',
			'booking_date' => 'วันที่ทำการจอง',
		);
	}

	public function searchForCustomer()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID,true);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('dest',$this->dest,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('leave_time',$this->leave_time,true);
		$criteria->compare('arrive_time',$this->arrive_time,true);
		$criteria->compare('standard',$this->standard,true);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('passenger_name',$this->passenger_name,true);
		$criteria->compare('passenger_tel',$this->passenger_tel,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('departure_date',$this->departure_date,true);
		$criteria->compare('booking_date',$this->booking_date,true);
		$criteria->compare('pay_stat',$this->pay_stat,true);
		$criteria->compare('user_id',$this->user_id = Yii::app()->user->id);
	
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'sort'=>array(
                'defaultOrder'=>'ID DESC',),
			'pagination'=>array(
				'pageSize'=>10,
			),
		));
	}
	
	public function searchForCompany()
	{
		$criteria=new CDbCriteria;
	
		$criteria->compare('ID',$this->ID,true);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('dest',$this->dest,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('leave_time',$this->leave_time,true);
		$criteria->compare('arrive_time',$this->arrive_time,true);
		$criteria->compare('standard',$this->standard,true);
		$criteria->compare('company_id',$this->company_id = Yii::app()->session['company_id']);
		$criteria->compare('passenger_name',$this->passenger_name,true);
		$criteria->compare('passenger_tel',$this->passenger_tel,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('departure_date',$this->departure_date,true);
		$criteria->compare('booking_date',$this->booking_date,true);
		$criteria->compare('pay_stat',$this->pay_stat,true);
		$criteria->compare('staff_name',$this->staff_name,true);
		$criteria->compare('user_id',$this->user_id);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'sort'=>array(
                'defaultOrder'=>'ID DESC',),
			'pagination'=>array(
				'pageSize'=>10,
			),
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeSave(){
		$this->departure_date = date('Y-m-d', strtotime($this->departure_date));
		
		$this->_price = ($this->price*$this->amount);
		
		$this->price = $this->_price;
		
		return true;
	}
	
	public function afterFind(){
		$this->departure_date = date('d-m-Y', strtotime($this->departure_date));
		$this->booking_date = date('d-m-Y', strtotime($this->booking_date));
		return true;
	}
}
