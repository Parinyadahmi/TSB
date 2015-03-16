<?php
$this->breadcrumbs=array(
	'ข้อมูลการจองทั้งหมด'=>array('managerindex'),
	'ข้อมูลการจองรหัส '.$model->ID,
);

$this->menu=array(
	array('label'=>'ข้อมูลการจองทั้งหมด', 'url'=>array('managerindex')),
);
?>
<h1>ข้อมูลการจอง รหัส<?php echo $model->ID; ?></h1>
	<br />
	<h3>ข้อมูลเที่ยวรถ</h3>
	<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'start',
			'dest',
			'price',
			'leave_time',
			'arrive_time',
			'standard',
			)
		));?>
	<h3>ข้อมูลผู้โดยสาร</h3>
	<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'passenger_name',
			'passenger_tel',
			'amount',
			'departure_date',
			'pay_stat',
			'staff_name',
			)
		));?>