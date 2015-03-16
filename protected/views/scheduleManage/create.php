<?php
$this->breadcrumbs=array(
	'จัดการเที่ยวรถทั้งหมด'=>array('index'),
	'เพิ่มเที่ยวเดินรถ',
);

$this->menu=array(
	array('label'=>'จัดการเที่ยวเดินรถทั้งหมด', 'url'=>array('index')),
);
?>

<h1>เพิ่มเที่ยวเดินรถ</h1>
<div class="view">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schedule-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($schedule); ?>	
	
	<div class="row">
		<?php echo $form->labelEx($schedule,'bus_id'); ?>
		<?php echo $form->dropDownList($schedule,'bus_id',
			       CHtml::listdata(Bus::model()->findAllByAttributes(array
				   ('company_id'=>Yii::app()->session['company_id'])),
                   'id','bus_number'),
				   array('prompt' => '--เลือกหมายเลขรถ--')); ?>
		<?php echo $form->error($schedule,'bus_id'); ?>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($schedule,'start'); ?>
		<?php echo $form->dropDownList($schedule,'start',
			       CHtml::listdata(Province::model()->findall(),'name','name'),
				   array('prompt' => '---เลือกจังหวัด---')); ?>
		<?php echo $form->error($schedule,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($schedule,'dest'); ?>
		<?php echo $form->dropDownList($schedule,'dest',
			       CHtml::listdata(Province::model()->findall(),'name','name'),
				   array('prompt' => '---เลือกจังหวัด---')); ?>
		<?php echo $form->error($schedule,'dest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($schedule,'price'); ?>
		<?php echo $form->textField($schedule,'price',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($schedule,'price'); ?>
	</div>
	
	<div class="row">
		<?php //echo $form->labelEx($schedule,'company'); ?>
		<?php //echo $form->textField($schedule,'company',array('size'=>15,'maxlength'=>15)); ?>
		<?php //echo $form->error($schedule,'company'); ?>
	</div>

	<div class="row">
	<?php echo $form->labelEx($schedule,'leave_time'); ?> 
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$schedule, //Model object
                'attribute'=>'leave_time', //attribute name
				'language' => 'th',
                'mode'=>'time', //use "time","date" or "datetime" (default)
                'options'=>array("timeFormat"=>'hh:mm'), // jquery plugin options

            ));
        ?> <span>&nbsp;คลิ๊กเพื่อเลือกเวลา</span>
     <?php echo $form->error($schedule,'leave_time'); ?>    
	</div>
		
	<div class="row">
	<?php echo $form->labelEx($schedule,'arrive_time'); ?> 
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$schedule, //Model object
                'attribute'=>'arrive_time', //attribute name
				'language' => 'th',
                'mode'=>'time', //use "time","date" or "datetime" (default)
                'options'=>array("timeFormat"=>'hh:mm'), // jquery plugin options
            ));
        ?> <span>&nbsp;คลิ๊กเพื่อเลือกเวลา</span>
     <?php echo $form->error($schedule,'leave_time'); ?>  
	</div>

	<div style="margin-left: 125px"><?php echo CHtml::submitButton('เพิ่มเที่ยวเดินรถ'); ?></div>

<?php $this->endWidget(); ?>
</div>
</div>