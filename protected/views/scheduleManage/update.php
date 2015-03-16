<?php
/* @var $this ScheduleManageController */
/* @var $model Schedule */

$this->breadcrumbs=array(
	'จัดการเที่ยวรถทั้งหมด'=>array('index'),
	'แก้ไขรถหมายเลข '.$bus->bus_number,
);

$this->menu=array(
	array('label'=>'เพิ่มเที่ยวเดินรถ', 'url'=>array('create')),
	array('label'=>'รายละเอียดเที่ยวเดินรถ', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'จัดการเที่ยวเดินรถทั้งหมด', 'url'=>array('index')),
);
?>

<h1>แก้ไขรถ หมายเลข <?php echo $bus->bus_number; ?></h1>

<div class="view">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schedule-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'start'); ?>
		<?php echo $form->dropDownList($model,'start',
			       CHtml::listdata(Province::model()->findall(),'name','name'),
				   array('prompt' => '---เลือกจังหวัด---')); ?>
		<?php echo $form->error($model,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dest'); ?>
		<?php echo $form->dropDownList($model,'dest',
			       CHtml::listdata(Province::model()->findall(),'name','name'),
				   array('prompt' => '---เลือกจังหวัด---')); ?>
		<?php echo $form->error($model,'dest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
	<?php echo $form->labelEx($model,'leave_time'); ?> 
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'leave_time', //attribute name
				'language' => 'th',
                'mode'=>'time', //use "time","date" or "datetime" (default)
                'options'=>array("timeFormat"=>'hh:mm'), // jquery plugin options

            ));
        ?> <span>&nbsp;คลิ๊กเพื่อเลือกเวลา</span>
	</div>
		
	<div class="row">
	<?php echo $form->labelEx($model,'arrive_time'); ?> 
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'arrive_time', //attribute name
				'language' => 'th',
                'mode'=>'time', //use "time","date" or "datetime" (default)
                'options'=>array("timeFormat"=>'hh:mm'), // jquery plugin options
            ));
        ?> <span>&nbsp;คลิ๊กเพื่อเลือกเวลา</span>
	</div>

	<div style="margin-left: 125px"><?php echo CHtml::submitButton('ยืนยันการแก้ไข',array('confirm'=>'คุณแน่ใจแล้วใช่หรือไม่ ที่จะทำการแก้ไข')); ?></div>

<?php $this->endWidget(); ?>
</div>
</div>