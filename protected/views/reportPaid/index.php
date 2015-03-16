<?php
/* @var $this ReportPaidController */
/* @var $model ReportPaid */

$this->breadcrumbs=array(
	'ข้อมูลแจ้งการโอนเงิน',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#report-paid-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>ข้อมูลการแจ้งชำะเงิน</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'report-paid-grid',
	'template'=>'{items}{pager}',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
			'name'=>'booking_code',
			'type'=>'html',
			'value'=>'$data->status?"<strong>".$data->booking_code."</strong>":$data->booking_code',
			'htmlOptions'=>array('style'=>'text-align:center'),
		),
		array(
			'name'=>'paid_date',
			'type'=>'html',
			'value'=>'$data->status?"<strong>".$data->paid_date."</strong>":$data->paid_date',
			'htmlOptions'=>array('style'=>'text-align:center'),
		),
		array(
			'name'=>'paid_time',
			'type'=>'html',
			'value'=>'$data->status?"<strong>".$data->paid_time."</strong>":$data->paid_time',
			'htmlOptions'=>array('style'=>'text-align:center'),
		),
		'link'=>array(
			'header'=>'เพิ่มเติม',
			'type'=>'raw',
			'value'=> 'CHtml::button("รายละเอียด",
						   array("onclick"=>"document.location.href=\'".Yii::app()->controller->createUrl("reportpaid/view",
						   array("id"=>$data->id))."\'"))',
			'htmlOptions'=>array('style'=>'text-align:center; width: 80px;'),
			),
	),
)); ?>
