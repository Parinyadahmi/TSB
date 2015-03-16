<?php
/* @var $this PromotionController */
/* @var $model Promotion */

$this->breadcrumbs=array(
	'Promotions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Promotion', 'url'=>array('index')),
	array('label'=>'Create Promotion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#promotion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Promotions</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'promotion-grid',
	'dataProvider'=>$model->search(),
	'template'=>'{items}{pager}',
	'columns'=>array(
		array('name'=>'id',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'name',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'start_date',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'end_date',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array(
			'header'=>'การจัดการ',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'htmlOptions'=>array('style'=>'text-align:center;width: 80px'),
		),
	),
)); ?>
