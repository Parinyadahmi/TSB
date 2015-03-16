<?php
/* @var $this ScheduleManageController */
/* @var $model Schedule */

$this->breadcrumbs=array(
	'เลือกเที่ยวรถ',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#schedule-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>เลือกเที่ยวรถ</h1>

<?php if(Yii::app()->session['company_id'] === null){?>

<?php echo CHtml::link('ค้นหาเที่ยวรถ','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'booking'=>$booking,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'schedule-grid',
	'template'=>'{items}{pager}',
	'dataProvider'=>$booking->searchForBooking(),
	'columns'=>array(
	array('name'=>'start',
		'htmlOptions'=>array('style'=>'text-align:center; width: 150px;')),
	array('name'=>'dest',
		'htmlOptions'=>array('style'=>'text-align:center; width: 150px;')),
	array('name'=>'companyData.company_name',
		'htmlOptions'=>array('style'=>'text-align:center; width: 150px;')),
	array('name'=>'price',
		'htmlOptions'=>array('style'=>'text-align:center; width: 80px;')),
	array('name'=>'leave_time',
		'htmlOptions'=>array('style'=>'text-align:center; width: 100px;')),
	array('name'=>'arrive_time',
		'htmlOptions'=>array('style'=>'text-align:center; width: 100px;')),
	array('name'=>'busData.standard',
		'htmlOptions'=>array('style'=>'text-align:center; width: 50px;')),
		'link'=>array(
			'header'=>'จอง',
			'type'=>'raw',
			'value'=> 'CHtml::button("เลือก",
					   array("onclick"=>"document.location.href=\'".Yii::app()->controller->createUrl("booking/addbooking",
					   array("id"=>$data->ID))."\'"))',
			'htmlOptions'=>array('style'=>'text-align:center; width: 80px;'),
		),
	),
)); ?>

<?php }else{?>

<?php echo CHtml::link('ค้นหาเที่ยวรถ','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'booking'=>$booking,
)); ?>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'schedule-grid',
	'template'=>'{items}{pager}',
	'dataProvider'=>$booking->searchForStaffBooking(),
	'columns'=>array(
	array('name'=>'start',
		'htmlOptions'=>array('style'=>'text-align:center; width: 150px;')),
	array('name'=>'dest',
		'htmlOptions'=>array('style'=>'text-align:center; width: 150px;')),
	array('name'=>'price',
		'htmlOptions'=>array('style'=>'text-align:center; width: 80px;')),
	array('name'=>'leave_time',
		'htmlOptions'=>array('style'=>'text-align:center; width: 100px;')),
	array('name'=>'arrive_time',
		'htmlOptions'=>array('style'=>'text-align:center; width: 100px;')),
	array('name'=>'busData.standard',
		'htmlOptions'=>array('style'=>'text-align:center; width: 50px;')),
		'link'=>array(
			'header'=>'',
			'type'=>'raw',
			'value'=> 'CHtml::button("เลือก",
					   array("onclick"=>"document.location.href=\'".Yii::app()->controller->createUrl("booking/addbookingstaff",
					   array("id"=>$data->ID))."\'"))',
			'htmlOptions'=>array('style'=>'text-align:center; width: 80px;'),
		),
	),
)); ?>
<?php }?>