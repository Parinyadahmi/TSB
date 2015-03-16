<?php
/* @var $this BookingDataController */
/* @var $model BookingData */

$this->breadcrumbs=array(
	'ข้อมูลการจองทั้งหมด'=>array('index'),
	'แก้ไขข้อมูลการจองรหัส '.$model->ID,
);

$this->menu=array(
	array('label'=>'ข้อมูลการจองทั้งหมด', 'url'=>array('index')),
);
?>

<h1>แก้ไขการจอง รหัส <?php echo $model->ID; ?></h1>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'booking-data-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
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
			)
		));?>
	<br />
	<br />
	<h3>ข้อมูลผู้โดยสาร</h3>
		<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'passenger_name',
			'passenger_tel',
			'amount',
			'departure_date',
			)
		));?>
	<div class="row">
		<?php echo $form->labelEx($model, 'pay_stat'); ?>
		<?php echo $form->dropDownList($model, 'pay_stat', 
					array('รอการชำระเงิน'=>'รอการชำระเงิน','ชำระเงินแล้ว'=>'ชำระเงินแล้ว','จำหน่ายตั๋วแล้ว'=>'จำหน่ายตั๋วแล้ว')); ?>
		<?php echo $form->error($model, 'pay_stat'); ?>
	</div>

	<div style="margin-left: 125px"><?php echo CHtml::submitButton('ยืนยันการแก้ไข',array('confirm'=>'คุณแน่ใจแล้วใช่หรือไม่ ที่จะทำการแก้ไข')); ?></div>
	
<?php $this->endWidget(); ?>
</div>
