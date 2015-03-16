<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'หน้าแรก', 'url'=>array('/site/index')),
				array('label'=>'ติดต่อเรา', 'url'=>array('/site/contact')),
				array('label'=>'สมัครสมาชิก', 'url'=>array('/site/registerGuest'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'สมัครสมาชิก (ผู้ประกอบการ)', 'url'=>array('/site/registerEntrepreneur'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'เกี่ยวกับเรา', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'ลงชื่อเข้าใช้', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'ข้อมูลส่วนตัว', 'url'=>array(''), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'จองตั๋วเดินทาง', 'url'=>array('/booking/choose'), 'visible'=>Yii::app()->user->isCustomer()),
				array('label'=>'จัดการผู้ใช้งาน', 'url'=>array('/user/index'), 'visible'=>Yii::app()->user->isAdmin()),
				array('label'=>'จัดการเที่ยวเดินรถ', 'url'=>array('/scheduleManage/index'), 'visible'=>Yii::app()->user->isManager()),
				array('label'=>'จัดการพนักงาน', 'url'=>array('/staff/index'), 'visible'=>Yii::app()->user->isManager()),
				array('label'=>'ข้อมูลการจอง', 'url'=>array('/bookingdata/customerindex'), 'visible'=>Yii::app()->user->isCustomer()),
				array('label'=>'ข้อมูลการจอง', 'url'=>array('/bookingdata/index'), 'visible'=>Yii::app()->user->isStaff()),
				array('label'=>'ข้อมูลการจอง', 'url'=>array('/bookingdata/managerindex'), 'visible'=>Yii::app()->user->isManager()),
				array('label'=>'ลงชื่อออก ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink' => CHtml::link('หน้าแรก', Yii::app()->homeUrl),
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<div id="main-content">
		<?php echo $content; ?>
	</div>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by TSB.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
