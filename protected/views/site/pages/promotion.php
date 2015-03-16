<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . ' - Promotion';
$this->breadcrumbs = array(
    'จัดการโปรโมชั่น'
);
?>
<h2>จัดการโปรโมชั่น</h2>

<div style="margin-left: 25px;" class="form">
	<div class="row">
		วันที่เริ่ม: <br> <input type="text" name="startdate">
	</div>
	<br>
	<div class="row">
		วันที่สิ้นสุด: <br> <input type="text" name="enddate">
	</div>
	<br>
	<div class="row">
		จำนวน % ส่วนลด: <br> <input type="text" name="discount">
	</div>
	<br>
	<div class="row">
		รายละเอียดของโปรโมชั่น <br>
		<textarea placeholder="textarea" name="detail"></textarea>
	</div>
	<br> <a href="index.php?r=site/page&view=summary_promotion">เพิ่มโปรโมชั่น</a>
</div>
