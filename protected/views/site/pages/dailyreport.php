<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/datepicker.css" />
<script src="themes/bootstrap/js/jquery.js"></script>
<script src="themes/bootstrap/js/jui.js"></script>
<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>

<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . ' - About';
$this->breadcrumbs = array(
    'รายงานการใช้บริการของลูกค้า'
);
?>
<h2>รายงานการใช้บริการของลูกค้า</h2>
<div style="margin-left: 25px;" class="form">
<p>วันที่ : <input type="text" id="datepicker"></p>
	<br>
	<table class="table table-bordered table-hover">
		<tr>
			<th width="200px">รหัสการจอง</th>
			<th width="200px">วันที่</th>
			<th width="200px">ต้นทาง</th>
			<th width="200px">ปลายทาง</th>
			<th width="200px">ราคา</th>
		</tr>
		<tr>
			<td align="center">123456</td>
			<td align="center">27-5-2014</td>
			<td align="center">ภูเก็ต</td>
			<td align="center">กรุงเทพฯ</td>
			<td align="center">1250</td>
		</tr>
		<tr>
			<td align="center">123457</td>
			<td align="center">27-5-2014</td>
			<td align="center">ภูเก็ต</td>
			<td align="center">กรุงเทพฯ</td>
			<td align="center">1250</td>
		</tr>
	</table>
	<br> <br> <br> <br>
	<div class="row">
		<input type="submit" value="Export to File Report">
	</div>
</div>