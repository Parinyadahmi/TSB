<?php $this->menu=array(
	array('label'=>'แก้ไขข้อมูลส่วนตัว', 'url'=>array('updateprofileuser','id'=>$user->id)),
	array('label'=>'เปลี่ยนรหัสผ่าน', 'url'=>array('changepassword','id'=>$user->id)),
	);

$this->breadcrumbs=array(
		'ข้อมูลส่วนตัว',
);?>

<h5>ข้อมูลการใช้งาน</h5>
<br />
<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$user,
		'attributes'=>array(
			'username',
			'create_date',
			'last_login_date',
		)
	));
?>
<br />
<h5>ข้อมูลการใช้งาน</h5>
<hr>
<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$user,
		'attributes'=>array(
			'userProfile.title',
			'userProfile.firstname',
			'userProfile.lastname',
			'userProfile.tel',
		)
	));
?>


