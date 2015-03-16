<?php
/* @var $this ScheduleManageController */
/* @var $model Schedule */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'dest'); ?>
		<?php echo $form->dropDownList($model,'dest',
			       CHtml::listdata(Province::model()->findall(),'name','name'),
				   array('prompt' => '---เลือกจังหวัด---')); ?>
		<?php echo $form->error($model,'dest'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($model,'leave_time'); ?> 
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'leave_time', //attribute name
                'mode'=>'time', //use "time","date" or "datetime" (default)
                'options'=>array("timeFormat"=>'hh:mm'), // jquery plugin options
                'language' => 'th'
            ));
        ?> <span>&nbsp;คลิ๊กเพื่อเลือกเวลา</span>
	</div>
		
	<div class="row">
	<?php echo $form->label($model,'arrive_time'); ?> 
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'arrive_time', //attribute name
                'mode'=>'time', //use "time","date" or "datetime" (default)
                'options'=>array("timeFormat"=>'hh:mm'), // jquery plugin options
                'language' => 'th'
            ));
        ?> <span>&nbsp;คลิ๊กเพื่อเลือกเวลา</span>
	</div>

	<div style="margin-left: 125px">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'ค้นหาเที่ยวรถ',
	'buttonType'=>'submit',
    'type'=>'primary')); ?>
    </div>	

<?php $this->endWidget(); ?>

</div><!-- search-form -->