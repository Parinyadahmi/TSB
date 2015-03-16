<?php
/* @var $this ScheduleManageController */
/* @var $model Schedule */

$this->breadcrumbs=array(
	'จัดการเที่ยวรถทั้งหมด'=>array('index'),
	'รายละเอียดเที่ยวเดินรถ หมายเลข  '.$model->ID,
);

$this->menu=array(
	array('label'=>'เพิ่มเที่ยวเดินรถ', 'url'=>array('create')),
	array('label'=>'แก้ไขเที่ยวเดินรถ', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'ลบเที่ยวเดินรถ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'จัดการเที่ยวรถทั้งหมด', 'url'=>array('index')),
);
?>

<h1>รายละเอียดเที่ยวเดินรถ หมายเลข <?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'start',
		'dest',
		'price',
		'leave_time',
		'arrive_time',
		'standard',
	),
)); ?>
