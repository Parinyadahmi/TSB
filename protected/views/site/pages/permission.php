<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'จัดการพนักงาน',
);
?>
<h2>กำหนดสิทธิ์พนักงาน</h2>


<div class="row">

<table class="table table-bordered table-hover">

<tr>
<th> <center> Position  </center></th>
<th> <center> Manage Schedule  </center></th>
<th> <center> Manage Promotion  </center></th>
<th> <center> Change payment status  </center></th>
<th> <center> Report  </center></th>
<th> <center> Action</center></th>
</tr>


<tr>
<td>Staff</td>
<td>    <center><input type="checkbox" name="checkboxes">   </center> </td>
<td>    <center><input type="checkbox" name="checkboxes">   </center> </td>
<td>    <center><input type="checkbox" name="checkboxes">   </center> </td>
<td>    <center><input type="checkbox" name="checkboxes">   </center> </td>

<td>    <center><a> Save</a>   </center> </td>

</tr>

</table></div>



