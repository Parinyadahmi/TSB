<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="language" content="en" />

  <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/favicon.ico" type="image/x-icon" >

  <!-- blueprint CSS framework -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
  <!--[if lt IE 8]>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
  <![endif]-->

  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />

  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr-2.0.6.min.js"></script>

  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="wrapper">

  <header id="header">
    <div id="logo"><?php echo CHtml::link(CHtml::encode(Yii::app()->name), '/'); ?></div>

    <nav id="mainmenu">
      <?php
        $menuItems = array(
				array('label'=>'หน้าแรก', 'url'=>array('/site/index')),
				array('label'=>'ติดต่อเรา', 'url'=>array('/site/contact')),
				array('label'=>'สมัครสมาชิก', 'url'=>array('/site/registerGuest'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'สมัครสมาชิก (ผู้ประกอบการ)', 'url'=>array('/site/registerEntrepreneur'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'เกี่ยวกับเรา', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'ลงชื่อเข้าใช้', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'จองตั๋วเดินทาง', 'url'=>array('/booking/choose'), 'visible'=>Yii::app()->user->isCustomer()),
				array('label'=>'จัดการผู้ใช้งาน', 'url'=>array('/user/index'), 'visible'=>Yii::app()->user->isAdmin()),
				array('label'=>'จัดการเที่ยวเดินรถ', 'url'=>array('/scheduleManage/index'), 'visible'=>Yii::app()->user->isManager()),
				array('label'=>'จัดการพนักงาน', 'url'=>array('/staff/index'), 'visible'=>Yii::app()->user->isManager()),
				array('label'=>'ลงชื่อออก ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
        );
      ?>
      <?php $this->widget('zii.widgets.CMenu',array(
        'items'=>$menuItems,
        'firstItemCssClass'=>'first',
        'lastItemCssClass'=>'last',
      )); ?>
    </nav><!-- mainmenu -->
  </header><!-- header -->

  <div id="main-wrapper"><div id="main" role="main">
    <?php echo $content; ?>
  </div></div><!-- main -->

  <footer id="footer">
    <nav id="footermenu">
      <?php $this->widget('zii.widgets.CMenu',array('items'=>$menuItems)); ?>
    </nav>
    <div class="content">
      <?php echo Yii::powered(); ?>
    </div>
  </footer><!-- footer -->

</div><!-- wrapper -->

</body>
</html>
