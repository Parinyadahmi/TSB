<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . ' - About';
$this->breadcrumbs = array(
    'สั่งพิมพ์ตั๋วเดินทาง'
);
?>
<div style="margin-left: 25px;" class="form">
	<div class="row">
		รหัสการจอง: 0587942<br>
	</div>
	<br>
	<div class="row">
		ต้นทาง: ภูเก็ต<br>
	</div>
	<br>
	<div class="row">
		ปลายทาง: กรุงเทพฯ<br>
	</div>
	<br>
	<div class="row">
		สถานะ: ชำระเงินแล้ว<br>
	</div>
	<br>
	<a href="#" onClick="alert('สั่งพิมพ์')">พิมพ์</a> | 
	<a href="index.php?r=site/page&view=ticket_print">กลับไปยังหน้าแรก</a>
</div>
