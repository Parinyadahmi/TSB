<?php $this->menu=array(
	array('label'=>'รายชื่อผู้ใช้งานทั้งหมด', 'url'=>array('index')),
	array('label'=>'แก้ไขผู้ใช้งาน', 'url'=>array('update','id'=>$user->id)),
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
		'ข้อมูลผู้ใช้งานรหัส '.$user->id,
);?>

<h1>ข้อมูลผู้ใช้งานงานรหัส <?php echo $user->id; ?></h1>
<br />

<?php if($user->type_id == 1)
{
?>
<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$user,
		'attributes'=>array(
			'username',
			'create_date',
			'last_login_date',
			'userProfile.title',
			'userProfile.firstname',
			'userProfile.lastname',
			'userProfile.tel',
			'type_id',
		)
	));
?>
<?php 
}elseif($user->type_id == 3) 
{
?>
<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$user,
		'attributes'=>array(
			'username',
			'create_date',
			'last_login_date',
			'userProfile.title',
			'userProfile.firstname',
			'userProfile.lastname',
			'userProfile.tel',
			'type_id',
		)
	));
?>
<br />
<br />
<h3>ข้อมูลบริษัท</h3>
<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$user,
		'attributes'=>array(
			'companyProfile.company_name',
			'companyProfile.m_firstname',
			'companyProfile.m_lastname',
			'companyProfile.tel',
			'companyProfile.fax',
			'companyProfile.address',
		)
	));
?>
<?php 
}elseif($user->type_id == 2){
?>
<br />
<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$user,
		'attributes'=>array(
			'username',
			'create_date',
			'last_login_date',
			'staffProfile.title',
			'staffProfile.s_firstname',
			'staffProfile.s_lastname',
			'staffProfile.tel',
			'type_id',
		)
	));
?>
<br />
<br />
<h3>ข้อมูลพนักงาน</h3>
<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$user,
		'attributes'=>array(
			'staffProfile.company_name',
			'staffProfile.manager_id',
		)
	));
?>
<?php 
}
?>

