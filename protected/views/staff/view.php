<?php $this->menu=array(
	array('label'=>'พนักงานทั้งหมด', 'url'=>array('index')),
	array('label'=>'เพิ่มบัญชีพนักงาน', 'url'=>array('create')),
	array('label'=>'แก้ไขพนักงาน', 'url'=>array('update','id'=>$user->id)),
	array('label'=>'ลบพนักงาน', 
			'url'=>'#', 
			'linkOptions'=>array(
				'submit'=>array(
					'delete',
					'id'=>$user->id
				),
				'confirm'=>'คุณแน่ใจที่จะลบใช่หรือไม่')),
	);

$this->breadcrumbs=array(
		'จัดการพนักงาน'=>array('index'),
		'รายละเอียดพนักงาน '.$user->staffProfile->title.''.$user->staffProfile->s_firstname.
						   ' '.$user->staffProfile->s_lastname,
);?>

<h3>รายละเอียดพนักงาน <?php echo $user->staffProfile->title.''.$user->staffProfile->s_firstname.
						   ' '.$user->staffProfile->s_lastname; ?></h3><hr>						   
<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$user,
		'attributes'=>array(
			'username',
			'last_login_date',
			'staffProfile.tel',
		)
	));
?>





