<?php

$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
	'สมัครสมาชิก (ลูกค้าทั่วไป)',
);
?>

<h3>สมัครสมาชิกลูกค้าทั่วไป</h3>
<div class="form">
<?php 
	$form = $this->beginWidget('CActiveForm', array(
		'id'=>'register-form',
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
<br />
<h3>ข้อมูลส่วนตัว</h3>	
	<div class="row">
		<?php echo $form->labelEx($user_profile, 'title'); ?>
		<?php echo $form->dropDownList($user_profile, 'title', 
					array('นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว'), 
					array('prompt'=>'--กรุณาเลือก--')); ?>
		<?php echo $form->error($user_profile, 'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($user_profile, 'firstname'); ?>
		<?php echo $form->textField($user_profile, 'firstname'); ?>
		<?php echo $form->error($user_profile, 'firstname'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($user_profile, 'lastname'); ?>
		<?php echo $form->textField($user_profile, 'lastname'); ?>
		<?php echo $form->error($user_profile, 'lastname'); ?>
	</div>
			
	<div class="row">
		<?php echo $form->labelEx($user_profile, 'tel'); ?>
		<?php echo $form->textField($user_profile, 'tel'); ?> <span>&nbsp;เบอร์โทรศัพมือถือ</span>
		<?php echo $form->error($user_profile, 'tel'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($user_profile, 'address'); ?>
		<?php echo $form->textArea($user_profile, 'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($user_profile, 'address'); ?>
	</div>
	
	<div style="margin-left: 125px"><?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'สมัครสมาชิก',
	'buttonType'=>'submit',
    'type'=>'success')); ?></div>

<?php $this->endWidget(); ?>
</div>











