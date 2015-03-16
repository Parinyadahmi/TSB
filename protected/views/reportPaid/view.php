<?php
/* @var $this ReportPaidController */
/* @var $model ReportPaid */

$this->breadcrumbs=array(
	'ข้อมูลการแจ้งชำระเงิน'=>array('index'),
	'รายละเอียดการแจ้งชำระเงิน รหัสการจอง '.$model->booking_code,
);

$this->menu=array(
	array('label'=>'ข้อมูลการแจ้งชำระเงิน', 'url'=>array('index')),
	array('label'=>'ลบ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h3>รายละเอียดการแจ้งชำระเงิน รหัสการจอง<?php echo $model->booking_code; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'booking_code',
		'paid_date',
		'paid_time',
		'company_id',
		'cust_account_name',
		'price',
		array(
		'name'=>'slip',
		'type'=>'html',
		'value'=>($model->slip)?CHtml::image(
				Yii::app()->request->baseUrl.'/images/'
				.$model->slip,'',
				array('width'=>200,'height'=>150)):CHtml::image(
						Yii::app()->request->baseUrl.'/images/noimage.jpg'
						,'',array('width'=>200,'height'=>150)),),

	),
)); ?>
