<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>
<?php $this->widget('bootstrap.widgets.TbNavbar', array(
		
    'collapse'=>true,
    'items'=>array(
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'items'=>array(
		                array('label'=>'หน้าแรก', 'url'=>array('/site/index')),
		                array('label'=>'ติดต่อเรา', 'url'=>array('/site/contact'), 'visible'=>Yii::app()->user->isGuest),
		                array('label'=>'รายงานการใช้บริการของลูกค้า', 'url'=>array('/site/page', 'view'=>'dailyreport'),'visible'=>Yii::app()->user->isStaff()),
		                array('label'=>'จัดการโปรโมชั่น', 'url'=>array('promotion/index'),'visible'=>Yii::app()->user->isManager()),
		            	array('label'=>'จัดการรถ', 'url'=>array('/bus/index'),'visible'=>Yii::app()->user->isManager()),
		                //array('label'=>'จัดการพนักงาน', 'url'=>array('/site/page', 'view'=>'permission'),'visible'=>Yii::app()->user->isManager()),
		                array('label'=>'พิมพ์ตั๋วเดินทาง', 'url'=>array('/site/page', 'view'=>'ticket_print'),'visible'=>Yii::app()->user->isCustomer()),
		            	array('label'=>'เกี่ยวกับเรา', 'url'=>array('/site/page', 'view'=>'about'),'visible'=>Yii::app()->user->isGuest),
		            	array('label'=>'จัดการผู้ใช้งาน', 'url'=>array('/user/index'), 'visible'=>Yii::app()->user->isAdmin()),
		            	array('label'=>'จองตั๋วเดินทาง', 'url'=>array('/booking/choose'), 'visible'=>Yii::app()->user->isCustomer()),
		            	array('label'=>'แจ้งการชำระเงิน', 'url'=>array('/reportpaid/create'), 'visible'=>Yii::app()->user->isCustomer()),
		            	array('label'=>'ข้อมูลการจอง', 'url'=>array('/bookingdata/customerindex'), 'visible'=>Yii::app()->user->isCustomer()),
		            	array('label'=>'ข้อมูลการชำะเงิน', 'url'=>array('/reportpaid/index'), 'visible'=>Yii::app()->user->isStaff()),
		            	array('label'=>'ข้อมูลการจอง', 'url'=>array('/bookingdata/index'), 'visible'=>Yii::app()->user->isStaff()),
		            	array('label'=>'จำหน่ายตั๋ว', 'url'=>array('/booking/choose'), 'visible'=>Yii::app()->user->isStaff()),
		            	array('label'=>'จัดการเที่ยวเดินรถ', 'url'=>array('/scheduleManage/index'), 'visible'=>Yii::app()->user->isManager()),
		            	array('label'=>'จัดการพนักงาน', 'url'=>array('/staff/index'), 'visible'=>Yii::app()->user->isManager()),
		            	array('label'=>'ข้อมูลการจอง', 'url'=>array('/bookingdata/managerindex'), 'visible'=>Yii::app()->user->isManager()),
		            	array('label'=>'สมัครสมาชิก', 'url'=>array('/site/registerGuest'), 'visible'=>Yii::app()->user->isGuest),
		              	array('label'=>'สมัครสมาชิก (ผู้ประกอบการ)', 'url'=>array('/site/registerEntrepreneur'), 'visible'=>Yii::app()->user->isGuest),
            		),
        ),
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'htmlOptions'=>array('class'=>'pull-right'),
		            'items'=>array(
		            	array('label'=>'ข้อมูลบริษัท', 'url'=>array('/profile/viewprofilecompany','id'=>Yii::app()->session['company_id']), 'visible'=>Yii::app()->user->isManager()),
		            	array('label'=>'ข้อมูลบริษัท', 'url'=>array('/profile/viewprofilecompany','id'=>Yii::app()->session['company_id']), 'visible'=>Yii::app()->user->isStaff()),
						array('label'=>'ข้อมูลส่วนตัว', 'url'=>array('/profile/viewprofileuser','id'=>Yii::app()->user->id), 'visible'=>Yii::app()->user->isCustomer()),
						array('label'=>'ข้อมูลส่วนตัว', 'url'=>array('/profile/viewprofilestaff','id'=>Yii::app()->user->id), 'visible'=>Yii::app()->user->isStaff()),
						array('label'=>'ข้อมูลส่วนตัว', 'url'=>array('/profile/viewprofileuser','id'=>Yii::app()->user->id), 'visible'=>Yii::app()->user->isManager()),
		                array('label'=>'ลงชื่อเข้าใช้', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
		                array('label'=>'ออกจากระบบ ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
		            ),
        ),
    ),
)); ?>
           
<div class="container" id="page">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink' => CHtml::link('หน้าแรก', Yii::app()->homeUrl),
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	<div align="center">
	<?php Yii::app()->clientScript->registerScript(
       'myHideEffect','$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',CClientScript::POS_READY);?> 
	<?php if(Yii::app()->user->hasFlash('unsuccess')):?>
	
    <div class="flash-unsuccess">
        <span style="color: red; font-size: 20px;"><?php echo Yii::app()->user->getFlash('unsuccess'); ?></span>
    </div>
    
	<?php endif; ?>
	</div>
	<?php echo $content; ?>
	<div class="clear"></div>
	<br />
	<br />
	<br />
	<br />
	<div align="center">
		<div id="footer">
			Copyright &copy; <?php echo date('Y'); ?> by TSB.<br/>
			All Rights Reserved.<br/>
			<?php echo Yii::powered(); ?>
		</div><!-- footer -->
	</div>	
</div><!-- page -->
<br />
<br />
<br />
<br />
</body>
</html>
