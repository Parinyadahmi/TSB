<?php
/* @var $this PromotionController */
/* @var $model Promotion */

$this->breadcrumbs=array(
	'Promotions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Promotion', 'url'=>array('index')),
);
?>

<h1>Create Promotion</h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'promotion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'start_date');?>
		<?php

	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
	    'attribute' => 'start_date',
	    'language' => 'th',
	    'model' => $model,
	    'options' => array(
	        'showAnim' => 'fadeIn', // 'fold', 'slideDown','fadeIn','blind,...
	        'dateFormat' => 'dd-mm-yy',
	        'changeMonth' => true,
	        'changeYear' => true,
	        'minDate' => 0
	    )
	));
	?><span>&nbsp;คลิ๊กเพื่อเลือกวันที่</span>
		<?php echo $form->error($model,'start_date');?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date');?>
		<?php

	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
	    'attribute' => 'end_date',
	    'language' => 'th',
	    'model' => $model,
	    'options' => array(
	        'showAnim' => 'fadeIn', // 'fold', 'slideDown','fadeIn','blind,...
	        'dateFormat' => 'dd-mm-yy',
	        'changeMonth' => true,
	        'changeYear' => true,
	        'minDate' => 0
	    )
	));
	?><span>&nbsp;คลิ๊กเพื่อเลือกวันที่</span>
		<?php echo $form->error($model,'end_date');?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount_percent'); ?>
		<?php echo $form->textField($model,'discount_percent'); ?>
		<?php echo $form->error($model,'discount_percent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detail'); ?>
		<?php echo $form->textArea($model,'detail',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detail'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Create'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->