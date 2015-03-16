<?php if(Yii::app()->session['company_id'] !== null){ ?>
<?php

$this->breadcrumbs=array(
	'จัดการเที่ยวเดินรถ',
);

$this->menu=array(
	array('label'=>'เพิ่มเที่ยวเดินรถ', 'url'=>array('create')),
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

<h1>จัดการเที่ยวเดินรถ</h1>

<?php echo CHtml::link('ค้นหาแบบละเอียด','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<br />
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'schedule-grid',
	'template'=>'{items}{pager}',	
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array('name'=>'start',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'dest',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'price',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'leave_time',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'arrive_time',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'standard',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array(
			'header'=>'',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'htmlOptions'=>array('style'=>'width: 55px'),
		),
	),
));?>
<?php }else{?>
<?php $this->breadcrumbs=array(
		'จัดการเที่ยวเดินรถ',
);?>
<?php echo 'คุณไม่สามารถเข้าดูข้อมูลเที่ยวเดินรถได้ กรุณาสมัครสมาชิกในส่วนของผู้ประกอบการ'; ?>
<?php }?>