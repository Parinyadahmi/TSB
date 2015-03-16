<?php
$this->breadcrumbs=array(
	'ข้อมูลการจองทั้งหมด'=>array('customerindex'),
	'ข้อมูลการจองรหัส '.$model->ID,
);
$this->menu=array(
	array('label'=>'ข้อมูลการจองทั้งหมด', 'url'=>array('customerindex')),
);
?>

<div class="view">
<h1>ข้อมูลการจอง รหัส<?php echo $model->ID; ?></h1>
	<br />
	<h3>ข้อมูลเที่ยวรถ</h3>
	<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'start',
			'dest',
			'point',
			'companyData.company_name',
			'price',
			'leave_time',
			'arrive_time',
			)
		));?><br />
	<h3>ข้อมูลเที่ยวรถเที่ยวกลับ</h3>
	<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'start_return',
			'dest_return',
			'return_point',
			'companyData.company_name',
			'price',
			'leave_time_return',
			'arrive_time_return',
			)
		));?><br />	
	<h3>ข้อมูลผู้โดยสาร</h3>
	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'passenger_name',
			'passenger_tel',
			'amount',
			'departure_date',
			'return_date',
			)
	 ));?><br />
	 <h3>ข้อมูลการชำระเงิน</h3>
	 <?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'companyData.bank',
			'companyData.account_name',
			'companyData.bank_account_number',
			'pay_stat',
		 )
	  ));?>
</div>