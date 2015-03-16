
<?php $this->menu=array(
	array('label'=>'ข้อมูลส่วนตัว', 'url'=>array('viewprofilestaff','id'=>$user->id)),
);

$this->breadcrumbs=array(
		//'ข้อมูลส่วนตัว'=>array('viewprofilestaff'),
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
		<?php echo $form->textField($staff_profile, 'tel'); ?> 
		<?php echo $form->error($staff_profile, 'tel'); ?>
	</div>
	
	<div style="margin-left: 125px"><?php echo CHtml::submitButton('ยืนยันการแก้ไข',array('confirm'=>'คุณแน่ใจแล้วใช่หรือไม่ ที่จะทำการแก้ไข')); ?></div>		
<?php $this->endWidget(); ?>
</div>





