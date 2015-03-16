<?php
/* @var $this BusController */
/* @var $model Bus */

$this->breadcrumbs=array(
	'Buses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bus', 'url'=>array('index')),
	array('label'=>'Manage Bus', 'url'=>array('admin')),
);
?>

<h1>Create Bus</h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bus-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bus_number'); ?>
		<?php echo $form->textField($model,'bus_number'); ?>
		<?php echo $form->error($model,'bus_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'standard'); ?>
		<?php echo $form->textField($model,'standard',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'standard'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seat_amount'); ?>
		<?php echo $form->textField($model,'seat_amount'); ?>
		<?php echo $form->error($model,'seat_amount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->