<?php //for customer?>
<?php $this->menu=array(
	array('label'=>'ข้อมูลส่วนตัว', 'url'=>array('viewprofileuser','id'=>$user->id)
	,'visible'=>Yii::app()->user->isCustomer()),
);
$this->breadcrumbs=array(
		//'ข้อมูลส่วนตัว'=>array('viewprofileuser','id'=>$user->id,'visible'=>Yii::app()->user->isCustomer()),
		'เปลี่ยนรหัสผ่าน',
);
?>

<?php //for staff?>
<?php $this->menu=array(
	array('label'=>'ข้อมูลส่วนตัว', 'url'=>array('viewprofilestaff','id'=>$user->id)
	,'visible'=>Yii::app()->user->isStaff()),
);
$this->breadcrumbs=array(
		//'ข้อมูลส่วนตัว'=>array('viewprofilestaff','visible'=>Yii::app()->user->isStaff()),
		'เปลี่ยนรหัสผ่าน',
);
?>

<?php //for manager?>
<?php $this->menu=array(
	array('label'=>'ข้อมูลส่วนตัว', 'url'=>array('viewprofileuser','id'=>$user->id)
	,'visible'=>Yii::app()->user->isManager()),
);
$this->breadcrumbs=array(
		//'ข้อมูลส่วนตัว'=>array('viewprofilemanager','visible'=>Yii::app()->user->isManager()),
		'เปลี่ยนรหัสผ่าน',
);
?>
<h3>เปลี่ยนรหัสผ่าน</h3>
<hr>
<div class="form">
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'changePassword-form',
    'inlineErrors'=>true,
    'enableClientValidation'=>true,
    'clientOptions'=>array(
      'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array('class'=>'well'),
)); ?>
	<div class="row">
	<?php echo $form->labelEx($model, 'currentPassword'); ?>
	<?php echo $form->textField($model,'currentPassword'); ?>
	<?php echo $form->error($model,'currentPassword'); ?>
	</div>
	<br />
	<div class="row">
	<?php echo $form->labelEx($model, 'newPassword'); ?>
	<?php echo $form->textField($model,'newPassword'); ?>
	<?php echo $form->error($model,'newPassword'); ?>
	</div>
	<div class="row">
	<?php echo $form->labelEx($model, 'newPassword_repeat'); ?>
	<?php echo $form->textField($model,'newPassword_repeat'); ?>
	<?php echo $form->error($model,'newPassword_repeat'); ?>
	</div>

	<div style="margin-left: 125px"><?php echo CHtml::submitButton('ยืนยันการเปลี่ยนรหัสผ่าน',array('confirm'=>'คุณแน่ใจแล้วใช่หรือไม่ ที่จะทำการแก้ไข')); ?></div>
	<?php $this->endWidget(); ?>
</div>