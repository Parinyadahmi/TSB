<?php if(Yii::app()->session['company_id'] === null){?>

<h1>สรุปรายการจอง <?php echo $booking_data->ID; ?></h1>
<br />
<h3>การเดินทางเที่ยวไป</h3>
<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$booking_data,
		'attributes'=>array(
			'start',
			'dest',
			'point',
			'departure_date',
			'price',
			'leave_time',
			'arrive_time',
			'passenger_name',
			'passenger_tel',
			'amount',
			'seat_no'
		)
));?>
<br>
<h3>การเดินทางเที่ยวกลับ</h3>
<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$booking_data,
		'attributes'=>array(
			'start_return',
			'dest_return',	
			'return_point',
			'return_date',					
			'price',
			'leave_time_return',
			'arrive_time_return',
			'passenger_name',
			'passenger_tel',
			'amount',
		)
));?>
<br>
<h1>ข้อมูลการโอนเงิน</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$booking_data,
		'attributes'=>array(
			'companyData.bank',
			'companyData.account_name',
			'companyData.bank_account_number',
		)
));?>
<br>
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'ย้อนกลับ',
	'type'=>'danger',
	'url'=>'index.php?r=booking/choose')); ?>
	
<?php }else{?>





<h1>สรุปรายการ</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$booking_data,
		'attributes'=>array(
			'ID',
			'start',
			'dest',
			'point',
			'departure_date',
			'start_return',
			'dest_return',
			'return_point',
			'return_date',
			'price',
			'leave_time',
			'arrive_time',
			'passenger_name',
			'passenger_tel',
			'amount',
		)
));?>
<br>
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'เลือกที่นั่ง',
	'type'=>'success',
	'url'=>'index.php?r=site/page&view=allotment')); 

		
?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'ย้อนกลับ',
	'type'=>'danger',
	'url'=>'index.php?r=booking/choose')); ?>
	
<?php }?>