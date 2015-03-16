<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($booking,'start'); ?>
		<?php echo $form->dropDownList($booking,'start',
			       CHtml::listdata(Province::model()->findall(),'name','name'),
				   array('prompt' => '---เลือกจังหวัด---')); ?>
		<?php echo $form->error($booking,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($booking,'dest'); ?>
		<?php echo $form->dropDownList($booking,'dest',
			       CHtml::listdata(Province::model()->findall(),'name','name'),
				   array('prompt' => '---เลือกจังหวัด---')); ?>
		<?php echo $form->error($booking,'dest'); ?>
	</div>
	
	<div style="margin-left: 125px">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'ค้นหาเที่ยวรถ',
	'buttonType'=>'submit',
    'type'=>'primary')); ?>
    </div>	

<?php $this->endWidget(); ?>

</div><!-- search-form -->