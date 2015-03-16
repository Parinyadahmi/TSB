<?php
/* @var $this BusController */
/* @var $model Bus */

$this->breadcrumbs=array(
	'Buses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Bus', 'url'=>array('index')),
	array('label'=>'Create Bus', 'url'=>array('create')),
);
?>

<h1>Manage Buses</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bus-grid',
	'dataProvider'=>$model->search(),
	'template'=>'{items}{pager}',
	'columns'=>array(
		array('name'=>'bus_number',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'standard',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'seat_amount',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array(
			'header'=>'การจัดการ',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'htmlOptions'=>array('style'=>'text-align:center;width: 80px'),
		),
	),
)); ?>
