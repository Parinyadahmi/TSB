<?php
$this->breadcrumbs=array(
	'ข้อมูลการจองทั้งหมด'=>array('index'),
	'รหัสการจอง '.$model->ID,
);

$this->menu=array(
	array('label'=>'ข้อมูลการจองทั้งหมด', 'url'=>array('index')),
	array('label'=>'แก้ไขข้อมูลการจอง', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'ลบข้อมูลการจอง', 'url'=>'#', 
			'linkOptions'=>array(
					'submit'=>array(
							'delete','id'=>$model->ID),
							'confirm'=>'Are you sure you want to delete this item?')),
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
