<?php

class ReportPaid extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'report_paid';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('booking_code, paid_date, paid_time, company_id, cust_account_name, price', 'required'),
			array('booking_code', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical','min'=>1),
			array('slip', 'file', 'types'=>'jpg,gif,png,jpeg','allowEmpty'=>true, 'on'=>'update'),
			array('booking_code', 'length', 'is'=>8),
			array('cust_account_name, price, slip', 'length', 'max'=>45),
			array('id, booking_code, paid_date, paid_time, company_id, cust_account_name, price, slip', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'booking_code' => 'รหัสการจอง',
			'paid_date' => 'วันที่ชำระเงิน',
			'paid_time' => 'เวลาที่ชำระเงิน',
			'company_id' => 'บริษัทที่ใช้บริการ',
			'cust_account_name' => 'ชื่อบัญชีของท่าน',
			'price' => 'ยอดเงิน',
			'slip' => 'หลักฐาน',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('booking_code',$this->booking_code);
		$criteria->compare('paid_date',$this->paid_date,true);
		$criteria->compare('paid_time',$this->paid_time,true);
		$criteria->compare('company_id',$this->company_id = Yii::app()->session['company_id']);
		$criteria->compare('cust_account_name',$this->cust_account_name,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('slip',$this->slip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeSave(){
		$this->paid_date = date('Y-m-d', strtotime($this->paid_date));
	
		return true;
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReportPaid the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
