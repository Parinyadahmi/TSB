<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . ' - Promotion Summary';
$this->breadcrumbs = array(
    'รายละเอียดโปรโมชั่น'
);
?>
<h2>รายละเอียด</h2>

<div style="margin-left: 25px;" class="form">
	<div class="row">
		วันที่เริ่ม: 10-4-2015<br>
	</div>
	<br>
	<div class="row">
		วันที่สิ้นสุด: 18-4-2015<br>
	</div>
	<br>
	<div class="row">
		จำนวน % ส่วนลด: 20<br>
	</div>
	<br>
	<div class="row">รายละเอียด : 
		เพียงแค่ท่านลูกค้า จองตั๋วเพื่อใช้บริการการเดินทางของทางบริษัท
		จะมีส่วนลดทันที 20% ตั้งแต่วันที่ 10 เมษายน ถึง 18 เมษายน 2558<br>
	</div>
	<br> <a href="#"
		onClick="alert('Email ถูกส่งไปยังลูกค้าเรียบร้อยแล้ว')">ส่งEmail</a>  | <a
		href="index.php?r=site/page&view=index_promotion">กลับไปยังหน้า
		Promotion</a>
</div>
