<?php if(Yii::app()->session['company_id'] !== null){ ?>
<?php $this->menu=array(
	array('label'=>'แก้ไขข้อมูลบริษัท', 'url'=>array('updateprofilecompany','id'=>$company->id)
			,'visible'=>Yii::app()->user->isManager()),
	);

$this->breadcrumbs=array(
		'ข้อมูลบริษัท',
);?>
<h3>ข้อมูลบริษัท</h3>
<hr>
<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$company,
		'attributes'=>array(
			'company_name',
			'm_firstname',
			'm_lastname',
			'tel',
			'fax',
			'address',
			'bank',
			'account_name',
			'bank_account_number',
		)
	));
?>

<?php }else{?>
<?php $this->breadcrumbs=array(
		'ข้อมูลบริษัท',
);?>
<?php echo 'ไม่มีข้อมูลบริษัทสำหรับของผู้ใช้งานรายนี้ กรุณาสมัครสมาชิกในส่วนของผู้ประกอบการ'; ?>
<?php }?>



