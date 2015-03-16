<?php 

$this->breadcrumbs=array(
		'จัดการผู้ใช้งาน',
);

// jquery gridview search
Yii::app()->clientScript->registerScript('search', "
$('form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>จัดการผู้ใช้งาน</h1>
<div>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php echo $form->textFieldRow($user, 'username', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'ค้นหา')); ?>
<?php $this->endWidget(); ?>
</div>
<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'user-grid',
		'template' => '{items}{pager}',
		'dataProvider'=>$user->search(),
		'columns'=>array(
			array('name'=>'id',
				'htmlOptions'=>array('style'=>'text-align:center')),
			'username',
			array('name'=>'last_login_date',
				'htmlOptions'=>array('style'=>'text-align:center')),
			array('name'=>'type_id',
				'htmlOptions'=>array('style'=>'text-align:center')),
			array(
				'header'=>'',
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'htmlOptions'=>array('style'=>'width: 55px'),
			),
		)
	));
?>










