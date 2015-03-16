<?php $this->menu=array(
	array('label'=>'ข้อมูลบริษัท', 'url'=>array('viewprofilecompany','id'=>$company->id)),
);

$this->breadcrumbs=array(
		//'ข้อมูลบริษัท'=>array('viewprofilecompany'),
		'แก้ไขข้อมูลบริษัท',
);
?>
<h3>แก้ไขข้อมูลบริษัท</h3>
<hr>
<div class="form">
<?php 
	$form = $this->beginWidget('CActiveForm', array(
		'id'=>'updateprofilecustomer-form',
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	));
?>
	<div class="row">
		<?php echo $form->labelEx($company, 'company_name'); ?>
		<?php echo $form->textField($company, 'company_name'); ?>
		<?php echo $form->error($company, 'company_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company, 'm_firstname'); ?>
		<?php echo $form->textField($company, 'm_firstname'); ?>
		<?php echo $form->error($company, 'm_firstname'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company, 'm_lastname'); ?>
		<?php echo $form->textField($company, 'm_lastname'); ?>
		<?php echo $form->error($company, 'm_lastname'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company, 'tel'); ?>
		<?php echo $form->textField($company, 'tel'); ?> <span>&nbsp;เบอร์สถานประกอบการ</span>
		<?php echo $form->error($company, 'tel'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company, 'fax'); ?>
		<?php echo $form->textField($company, 'fax'); ?>
		<?php echo $form->error($company, 'fax'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company, 'address'); ?>
		<?php echo $form->textArea($company, 'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($company, 'address'); ?>
	</div>
<br>
<h3>ข้อมูลบัญชีธนาคาร</h3>	
<hr>
	<div class="row">
		<?php echo $form->labelEx($company, 'bank'); ?>
		<?php echo $form->dropDownList($company, 'bank', 
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
		<?php echo $form->error($company, 'bank'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company, 'account_name'); ?>
		<?php echo $form->textField($company, 'account_name'); ?>
		<?php echo $form->error($company, 'account_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($company, 'bank_account_number'); ?>
		<?php echo $form->textField($company, 'bank_account_number'); ?>
		<?php echo $form->error($company, 'bank_account_number'); ?>
	</div>
	
	<div style="margin-left: 125px"><?php echo CHtml::submitButton('ยืนยันการแก้ไข',array('confirm'=>'คุณแน่ใจแล้วใช่หรือไม่ ที่จะทำการแก้ไข')); ?></div>	
<?php $this->endWidget(); ?>
</div>




