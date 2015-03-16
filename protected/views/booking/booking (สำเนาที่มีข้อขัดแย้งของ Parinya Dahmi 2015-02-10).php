<?php
$this->breadcrumbs = array(
    'ค้นหาเที่ยวรถ' => array(
        'choose'
    ),
    'กรอกข้อมูลการจอง'
);
?>
<h1>กรอกข้อมูลการจอง</h1>
<br />
<h3>รายละเอียดเที่ยวรถ</h3>

<div class="form">
<?php

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'booking_data-form',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
));
?>

	<?php echo $form->errorSummary($booking); ?>

	<div class="row">
		<?php echo $form->label($booking,'start'); ?>
		<?php echo $form->textField($booking,'start',array('readonly' => true)); ?>
		<?php echo $form->error($booking,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($booking,'dest'); ?>
		<?php echo $form->textField($booking,'dest',array('readonly' => true)); ?>
		<?php echo $form->error($booking,'dest'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($booking,'price'); ?>
		<?php echo $form->textField($booking,'price',array('readonly' => true)); ?>
		<?php echo $form->error($booking,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($booking,'company'); ?>
		<?php echo $form->textField($booking,'company',array('readonly' => true)); ?>
		<?php echo $form->error($booking,'company'); ?>
	</div>

	<div class="row">
	<?php echo $form->label($booking,'leave_time'); ?> 
	<?php echo $form->textField($booking,'leave_time',array('readonly' => true)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($booking,'arrive_time'); ?> 
	<?php echo $form->textField($booking,'arrive_time',array('readonly' => true)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($booking,'standard'); ?>
		<?php echo $form->textField($booking,'standard',array('readonly' => true)); ?>
		<?php echo $form->error($booking,'standard'); ?>
	</div>
	<br />
	<h3>ข้อมูลการจอง</h3>

	<div class="row" style="margin-left: 120px;">
		<input type="radio" name="sex" value="male"><span style="font-size: 14px;">เที่ยวเดียว</span><br>
		<input type="radio" name="sex" value="female"><span style="font-size: 14px;">ไปกลับ</span>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($booking_data, 'passenger_name'); ?>
		<?php echo $form->textField($booking_data, 'passenger_name'); ?> <span>&nbsp;ท่านใดท่านหนึ่ง</span>
		<?php echo $form->error($booking_data, 'passenger_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($booking_data, 'passenger_tel'); ?>
		<?php echo $form->textField($booking_data, 'passenger_tel'); ?> <span>&nbsp;เบอร์โทรศัพมือถือ</span>
		<?php echo $form->error($booking_data, 'passenger_tel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($booking_data,'departure_date');?>
		<?php

$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'attribute' => 'departure_date',
    'language' => 'th',
    'model' => $booking_data,
    'options' => array(
        'showAnim' => 'fadeIn', // 'fold', 'slideDown','fadeIn','blind,...
        'dateFormat' => 'dd-mm-yy',
        'changeMonth' => true,
        'changeYear' => true,
        'minDate' => 0
    )
));
?><span>&nbsp;คลิ๊กเพื่อเลือกวันที่</span>
		<?php echo $form->error($booking_data,'departure_date');?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($booking_data, 'amount'); ?>
		<?php

echo $form->dropDownList($booking_data, 'amount', array(
    '1' => '1',
    '2' => '2',
    '3' => '3'
), array(
    'prompt' => '--กรุณาเลือก--'
));
?>
		<?php echo $form->error($booking_data, 'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($booking, 'company_id'); ?>
		<?php echo $form->error($booking, 'company_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($booking, 'bank'); ?>
		<?php echo $form->error($booking, 'bank'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($booking, 'account_name'); ?>
		<?php echo $form->error($booking, 'account_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($booking, 'bank_account_number'); ?>
		<?php echo $form->error($booking, 'bank_account_number'); ?>
	</div>

	<div style="margin-left: 125px"><?php

$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'เสร็จสิ้น',
    'buttonType' => 'submit',
    'type' => 'success'
));
?>
	<?php

$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'ยกเลิก ',
    'type' => 'danger',
    'url' => 'index.php?r=booking/choose'
));
?></div>
	
<?php $this->endWidget(); ?>
</div>
<!-- form -->