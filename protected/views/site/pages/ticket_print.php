<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . ' - About';
$this->breadcrumbs = array(
    'พิมพ์ตั๋วเดินทาง'
);
?>
<h2>ตรวจสอบสถานะการชำระเงิน</h2>
<br>
<table class="table table-bordered table-hover">
	<tr>
		<th style="text-align: center;">รหัสการจอง</th>
		<th style="text-align: center;">ต้นทาง</th>
		<th style="text-align: center;">ปลายทาง</th>
		<th style="text-align: center;">สถานะ</th>
		<th style="text-align: center;">การจัดการ</th>
	</tr>
	<tr>
		<td style="text-align: center">0587942</td>
		<td style="text-align: center">ภูเก็ต</td>
		<td style="text-align: center">กรุงเทพฯ</td>
		<td style="text-align: center">ชำระเงินแล้ว</td>
		<td style="text-align: center"><a href="index.php?r=site/page&view=printing">พิมพ์ตั๋วเดินทาง</a></td>
	</tr>
</table>
<br>

