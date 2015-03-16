<?php

$this->pageTitle=Yii::app()->name . ' - RegisterCompany';
$this->breadcrumbs=array(
	'สมัครสมาชิก (ผู้ประกอบการ)',
);
?>

<h3>สมัครสมาชิกสำหรับผู้ประกอบการ</h3>
<div class="form">
<?php 
	$form = $this->beginWidget('CActiveForm', array(
		'id'=>'register_manager-form',
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
<br />
<br />	
<h3>ข้อมูลบริษัท</h3>	
	<div class="row">
		<?php echo $form->labelEx($company_profile, 'company_name'); ?>
		<?php echo $form->textField($company_profile, 'company_name'); ?>
		<?php echo $form->error($company_profile, 'company_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company_profile, 'm_firstname'); ?>
		<?php echo $form->textField($company_profile, 'm_firstname'); ?>
		<?php echo $form->error($company_profile, 'm_firstname'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company_profile, 'm_lastname'); ?>
		<?php echo $form->textField($company_profile, 'm_lastname'); ?>
		<?php echo $form->error($company_profile, 'm_lastname'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company_profile, 'tel'); ?>
		<?php echo $form->textField($company_profile, 'tel'); ?> <span>&nbsp;เบอร์สถานประกอบการ</span>
		<?php echo $form->error($company_profile, 'tel'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company_profile, 'fax'); ?>
		<?php echo $form->textField($company_profile, 'fax'); ?>
		<?php echo $form->error($company_profile, 'fax'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company_profile, 'address'); ?>
		<?php echo $form->textArea($company_profile, 'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($company_profile, 'address'); ?>
	</div>
<br>		
<h3>ข้อมูลบัญชีธนาคาร</h3>	
	<div class="row">
		<?php echo $form->labelEx($company_profile, 'bank'); ?>
		<?php echo $form->dropDownList($company_profile, 'bank', 
					array(
						  'ธนาคารกรุงเทพ (Bangkok Bank)'=>'ธนาคารกรุงเทพ (Bangkok Bank)',
						  'ธนาคารกรุงไทย (Krungthai Bank)'=>'ธนาคารกรุงไทย (Krungthai Bank)',
						  'ธนาคารกรุงศรีอยุธยา (Bank of Ayudhaya)'=>'ธนาคารกรุงศรีอยุธยา (Bank of Ayudhaya)',
						  'ธนาคารกสิกรไทย (KasikornBank)'=>'ธนาคารกสิกรไทย (KasikornBank)',
						  'ธนาคารเกียรตินาคิน (Kiatnakin Bank)'=>'ธนาคารเกียรตินาคิน (Kiatnakin Bank)',
						  'ธนาคารซิติแบงก์ (Citibank)'=>'ธนาคารซิติแบงก์ (Citibank)',
						  'ธนาคารทหารไทย (Thai Military Bank)'=>'ธนาคารทหารไทย (Thai Military Bank)',
						  'ธนาคารไทยพาณิชย์ (SCB)'=>'ธนาคารไทยพาณิชย์ (SCB)',
						  'ธนาคารธนชาต (Thanachart Bank)'=>'ธนาคารธนชาต (Thanachart Bank)',
						  'ธนาคารนครหลวงไทย (Siam City Bank)'=>'ธนาคารนครหลวงไทย (Siam City Bank)',
						  'ธนาคารไอซีบีซี (ไทย) (ICBC Thai Limited Bank)'=>'ธนาคารไอซีบีซี (ไทย) (ICBC Thai Limited Bank)',
					 ), 
					array('prompt'=>'--กรุณาเลือก--')); ?>
		<?php echo $form->error($company_profile, 'bank'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company_profile, 'account_name'); ?>
		<?php echo $form->textField($company_profile, 'account_name'); ?>
		<?php echo $form->error($company_profile, 'account_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company_profile, 'bank_account_number'); ?>
		<?php echo $form->textField($company_profile, 'bank_account_number'); ?>
		<?php echo $form->error($company_profile, 'bank_account_number'); ?>
	</div>
	
	<div style="margin-left: 125px"><?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'สมัครสมาชิก',
	'buttonType'=>'submit',
    'type'=>'success')); ?>
	</div>
	
<?php $this->endWidget(); ?>
</div>



