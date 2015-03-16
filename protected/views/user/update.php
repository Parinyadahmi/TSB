<?php $this->menu=array(
	array('label'=>'รายชื่อผู้ใช้งานทั้งหมด', 'url'=>array('index')),
	array('label'=>'ข้อมูลผู้ใช้งาน', 'url'=>array('view','id'=>$user->id)),
	array('label'=>'ลบผู้ใช้งาน',
		'url'=>'#',
		'linkOptions'=>array(
				'submit'=>array(
						'delete',
						'id'=>$user->id
				),
				'confirm'=>'คุณแน่ใจที่จะลบใช่หรือไม่')),
	);

$this->breadcrumbs=array(
		'จัดการผู้ใช้งาน'=>array('index'),
		'แก้ไขผู้ใช้งานรหัส '.$user->id,
);
?>
<?php if($user->type_id == 1 && $user->company_id != null){?>
<h3>แก้ไขผู้ใช้งาน <?php echo $user->username; ?></h3>
<?php 
	$this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$user,
		'attributes'=>array(
			'companyProfile.company_name',
			'companyProfile.m_firstname',
			'companyProfile.m_lastname',
			'companyProfile.tel',
			'companyProfile.fax',
			'companyProfile.address',
			'companyProfile.bank',
			'companyProfile.account_name',
			'companyProfile.bank_account_number',
		)
	));
?>
<?php 
	$form = $this->beginWidget('CActiveForm', array(
		'id'=>'update-form',
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	));
?>
<div class="form">	
	<div class="row">
		<?php echo $form->labelEx($user, 'type_id'); ?>
		<?php echo $form->dropDownList($user, 'type_id', 
					array('1'=>'ลูกค้าทั่วไป','3'=>'เจ้าของบริษัท','4'=>'แอดมิน')); ?>
		<?php echo $form->error($user, 'type_id'); ?>
	</div>
	
	<div style="margin-left: 125px"><?php echo CHtml::submitButton('ยืนยันการแก้ไข',array('confirm'=>'ยืนยันการแก้ไข')); ?></div>
</div>	
<?php $this->endWidget(); ?>
<?php }elseif($user->type_id == 3){?>
<h3>แก้ไขผู้ใช้งาน <?php echo $user->username; ?></h3>
<?php 
	$this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$user,
		'attributes'=>array(
			'companyProfile.company_name',
			'companyProfile.m_firstname',
			'companyProfile.m_lastname',
			'companyProfile.tel',
			'companyProfile.fax',
			'companyProfile.address',
			'companyProfile.bank',
			'companyProfile.account_name',
			'companyProfile.bank_account_number',
		)
	));
?>
<?php 
	$form = $this->beginWidget('CActiveForm', array(
		'id'=>'update-form',
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	));
?>
<div class="form">	
	<div class="row">
		<?php echo $form->labelEx($user, 'type_id'); ?>
		<?php echo $form->dropDownList($user, 'type_id', 
					array('1'=>'ลูกค้าทั่วไป','3'=>'เจ้าของบริษัท','4'=>'แอดมิน')); ?>
		<?php echo $form->error($user, 'type_id'); ?>
	</div>
	
	<div style="margin-left: 125px"><?php echo CHtml::submitButton('ยืนยันการแก้ไข',array('confirm'=>'ยืนยันการแก้ไข')); ?></div>
</div>	
<?php $this->endWidget(); ?>
<?php }elseif($user->type_id == 1){ ?>
<h3>แก้ไขผู้ใช้งาน <?php echo $user->username; ?></h3>
<?php 
	$form = $this->beginWidget('CActiveForm', array(
		'id'=>'update-form',
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	));
?>
<div class="form">	
	<div class="row">
		<?php echo $form->labelEx($user, 'type_id'); ?>
		<?php echo $form->dropDownList($user, 'type_id', 
					array('1'=>'ลูกค้าทั่วไป','3'=>'เจ้าของบริษัท','4'=>'แอดมิน')); ?>
		<?php echo $form->error($user, 'type_id'); ?>
	</div>
	
	<div style="margin-left: 125px"><?php echo CHtml::submitButton('ยืนยันการแก้ไข',array('confirm'=>'ยืนยันการแก้ไข')); ?></div>
</div>	
<?php $this->endWidget(); ?>	
<?php }else{ echo 'ไม่สามารถแก้ไขข้อมูลได้'; }?>





