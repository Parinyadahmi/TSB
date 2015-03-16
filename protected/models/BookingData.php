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
			array('point, start, dest, price, leave_time, arrive_time, company_id, 
				  passenger_name, passenger_tel, amount, departure_date', 'required'),
			array('return_point, return_date', 'required', 'on' => 'hasReturn'),
			array('start, dest, leave_time, arrive_time, passenger_name, pay_stat', 'length', 'max'=>45),
			array('passenger_tel', 'length', 'is'=>10),
			array('passenger_tel','numerical','integerOnly'=>true),
			array('ID, start, dest, price, leave_time, arrive_time, 
					company_id, passenger_name, passenger_tel, amount, departure_date, 
					booking_date, pay_stat, user_id, staff_name, destination_point, 
					return_point, return_date', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
				'companyData' => array(self::BELONGS_TO, 'Company', 'company_id'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'ID' => 'รหัสการจอง',
			'start' => 'ต้นทาง',
			'dest' => 'ปลายทาง',
			'start_return' => 'ต้นทาง',
			'dest_return' => 'ปลายทาง',
			'price' => 'ราคา (บาท)',
			'leave_time' => 'เวลาออก',
			'arrive_time' => 'เวลาถึง',
			'passenger_name' => 'ชื่อผู้โดยสาร',
			'passenger_tel' => 'เบอร์ติดต่อ',
			'amount' => 'จำนวนผู้โดยสาร',
			'seat_no' => 'เลขที่นั่ง',
			'departure_date' => 'วันที่เดินทาง',
			'point' => 'จุดลงรถ',
			'pay_stat' => 'สถานะ',
			'staff_name' => 'ผู้ทำรายการ',
			'user_id' => 'รหัสลูกค้า',
			'company_id' => 'รหัสบริษัท',
			'bus_id' => 'รหัสรถ',
			'booking_date' => 'วันที่ทำการจอง',
			'return_point' => 'จุดลงรถเที่ยวกลับ',
			'return_date' => 'วันที่เดินทางเที่ยวกลับ',
			'leave_time_return' => 'เวลาออก',
			'arrive_time_return' => 'เวลาถึง',				
		);
	}

	public function searchForCustomer()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID,true);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('dest',$this->dest,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('leave_time',$this->leave_time,true);
		$criteria->compare('arrive_time',$this->arrive_time,true);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('passenger_name',$this->passenger_name,true);
		$criteria->compare('passenger_tel',$this->passenger_tel,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('departure_date',$this->departure_date,true);
		$criteria->compare('point',$this->point,true);
		$criteria->compare('return_point',$this->return_point,true);
		$criteria->compare('return_date',$this->return_date,true);
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
		$criteria->compare('leave_time',$this->leave_time,true);
		$criteria->compare('arrive_time',$this->arrive_time,true);
		$criteria->compare('company_id',$this->company_id = Yii::app()->session['company_id']);
		$criteria->compare('passenger_name',$this->passenger_name,true);
		$criteria->compare('passenger_tel',$this->passenger_tel,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('departure_date',$this->departure_date,true);
		$criteria->compare('destination_point',$this->destination_point,true);
		$criteria->compare('return_point',$this->return_point,true);
		$criteria->compare('return_date',$this->return_date,true);
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
		
		if($this->return_date === NULL){
			$this->return_date === '0000-00-00';
		}else{
			$this->return_date = date('Y-m-d', strtotime($this->return_date));
		}
		
		$this->_price = ($this->price*$this->amount);
		
		$this->price = $this->_price;
		
		return true;
	}
	
	public function afterFind(){
		
		if($this->return_date==='1970-01-01'){
			$this->return_date = '-';
		}else{
			$this->return_date = date('d-m-Y', strtotime($this->return_date));
		}
		
		$this->departure_date = date('d-m-Y', strtotime($this->departure_date));
		$this->booking_date = date('d-m-Y', strtotime($this->booking_date));
		
		return true;
	}
}
