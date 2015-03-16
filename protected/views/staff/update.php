
<?php $this->menu=array(
	array('label'=>'พนักงานทั้งหมด', 'url'=>array('index')),
	array('label'=>'รายละเอียดพนักงาน', 'url'=>array('view','id'=>$user->id)),
	array('label'=>'ลบพนักงาน',
		'url'=>'#',
		'linkOptions'=>array(
				'submit'=>array(
						'delete',
						'id'=>$staff_profile->id
				),
				'confirm'=>'คุณแน่ใจที่จะลบใช่หรือไม่')),
	);

$this->breadcrumbs=array(
		'จัดการพนักงาน'=>array('index'),
		'แก้ไขข้อมูลพนักงาน '.$user->staffProfile->title.''.$user->staffProfile->s_firstname.
						   ' '.$user->staffProfile->s_lastname,
);
?>
<h1>แก้ไขข้อมูลพนักงาน</h1>
<div class="form">
<?php 
	$form = $this->beginWidget('CActiveForm', array(
		'id'=>'update-form',
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







