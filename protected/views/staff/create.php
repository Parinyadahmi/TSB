<?php

$this->pageTitle=Yii::app()->name . ' - AddStaff';
$this->breadcrumbs=array(
	'เพิ่มบัญชีพนักงาน',
);

$this->menu=array(
		array('label'=>'รายชื่อพนักงานทั้งหมด', 'url'=>array('index')),
);

?>

<h1>เพิ่มบัญชีพนักงาน</h1>
<div class="form">
<?php 
	$form = $this->beginWidget('CActiveForm', array(
		'id'=>'staff-form',
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	));
?>
	<div class="row">
		<?php echo $form->labelEx($user, 'username'); ?>
		<?php echo $form->textField($user, 'username'); ?> <span>&nbsp;ใช้อีเมลล์เท่านั้น</span>
		<?php echo $form->error($user, 'username'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($user, 'password'); ?>
		<?php echo $form->passwordField($user, 'password'); ?>
		<?php echo $form->error($user, 'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($user, 'confirmation_password'); ?>
		<?php echo $form->passwordField($user, 'confirmation_password'); ?> <span>&nbsp;กรุณากรอกให้ตรงกัน</span>
		<?php echo $form->error($user, 'confirmation_password'); ?>
	</div>
<br />
<h3>ข้อมูลส่วนตัวพนักงาน</h3>	
	<div class="row">
		<?php echo $form->labelEx($staff_profile, 'title'); ?>
		<?php echo $form->dropDownList($staff_profile, 'title', 
					array('นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว'), 
					array('prompt'=>'--กรุณาเลือก--')); ?>
		<?php echo $form->error($staff_profile, 'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($staff_profile, 's_firstname'); ?>
		<?php echo $form->textField($staff_profile, 's_firstname'); ?>
		<?php echo $form->error($staff_profile, 's_firstname'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($staff_profile, 's_lastname'); ?>
		<?php echo $form->textField($staff_profile, 's_lastname'); ?>
		<?php echo $form->error($staff_profile, 's_lastname'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($staff_profile, 'tel'); ?>
		<?php echo $form->textField($staff_profile, 'tel'); ?> <span>&nbsp;เบอร์โทรศัพมือถือ</span>
		<?php echo $form->error($staff_profile, 'tel'); ?>
	</div>
	
	<div style="margin-left: 125px"><?php echo CHtml::submitButton('เพิ่มบัญชีพนักงาน'); ?></div>
	
<?php $this->endWidget(); ?>
</div>











