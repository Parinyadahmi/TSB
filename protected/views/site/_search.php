<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($schedule,'start'); ?>
		<?php echo $form->dropDownList($schedule,'start',
			       CHtml::listdata(Province::model()->findall(),'name','name'),
				   array('prompt' => '---เลือกจังหวัด---')); ?>
		<?php echo $form->error($schedule,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($schedule,'dest'); ?>
		<?php echo $form->dropDownList($schedule,'dest',
			       CHtml::listdata(Province::model()->findall(),'name','name'),
				   array('prompt' => '---เลือกจังหวัด---')); ?>
		<?php echo $form->error($schedule,'dest'); ?>
	</div>
	
	<div style="margin-left: 125px">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'ค้นหาเที่ยวรถ',
	'buttonType'=>'submit',
    'type'=>'primary')); ?>
    </div>	

<?php $this->endWidget(); ?>

</div><!-- search-form -->