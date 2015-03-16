<?php
$this->breadcrumbs=array(
	'แจ้งการชำระเงิน',
);
?>

<h1>แจ้งการชำระเงิน</h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-paid-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array (
				'enctype' => 'multipart/form-data'
	)
)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'booking_code'); ?>
		<?php echo $form->textField($model,'booking_code'); ?>
		<?php echo $form->error($model,'booking_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'paid_date');?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'attribute'=>'paid_date',
			'language'=>'th',
			'model'=>$model,
			'options'=>array(
				'showAnim'=>'fadeIn', //'fold', 'slideDown','fadeIn','blind,...
				'dateFormat'=>'dd-mm-yy',
				'changeMonth'=>true,
				'changeYear'=>true,
				'minDate'=> 0,
			),));?><span>&nbsp;คลิ๊กเพื่อเลือกวันที่</span>
		<?php echo $form->error($model,'paid_date');?>
	</div>

	<div class="row">
	<?php echo $form->labelEx($model,'paid_time'); ?> 
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'paid_time', //attribute name
				'language' => 'th',
                'mode'=>'time', //use "time","date" or "datetime" (default)
                'options'=>array("timeFormat"=>'hh:mm'), // jquery plugin options

            ));
        ?> <span>&nbsp;คลิ๊กเพื่อเลือกเวลา</span>
     <?php echo $form->error($model,'paid_time'); ?>    
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_id'); ?>
		<?php echo $form->dropDownList($model,'company_id',
			       CHtml::listdata(Company::model()->findall(),'id','company_name'),
				   array('prompt' => '---เลือกบริษัท---')); ?>
		<?php echo $form->error($model,'company_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cust_account_name'); ?>
		<?php echo $form->textField($model,'cust_account_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'cust_account_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>
	<br>
	<span style="margin-left: 125px;">ภาพถ่ายใบเสร็จจากธนาคารหรือการชำระเงิน</span>
	<div class="row">
		<?php echo $form->labelEx($model,'slip'); ?>
		<?php echo $form->fileField($model,'slip',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'slip'); ?>
	</div>
	<br >
	<div style="margin-left: 125px"><?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'ยืนยันการทำรายการ',
	'buttonType'=>'submit',
    'type'=>'success')); ?></div>	
<?php $this->endWidget(); ?>

</div><!-- form -->