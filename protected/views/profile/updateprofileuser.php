
<?php $this->menu=array(
	array('label'=>'ข้อมูลส่วนตัว', 'url'=>array('viewprofileuser','id'=>$user->id)),
);

$this->breadcrumbs=array(
		//'ข้อมูลส่วนตัว'=>array('viewprofileuser'),
		'แก้ไขข้อมูลส่วนตัว ',
);
?>
<h5>แก้ไขข้อมูลส่วนตัว</h5>
<div class="form">
<?php 
	$form = $this->beginWidget('CActiveForm', array(
		'id'=>'updateprofilecustomer-form',
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	));
?>
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
		<?php echo $form->textField($user_profile, 'tel'); ?> 
		<?php echo $form->error($user_profile, 'tel'); ?>
	</div>
	
	<div style="margin-left: 125px"><?php echo CHtml::submitButton('ยืนยันการแก้ไข',array('confirm'=>'ยืนยันการแก้ไข')); ?></div>
	
<?php $this->endWidget(); ?>
</div>





