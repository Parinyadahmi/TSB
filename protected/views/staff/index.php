<?php if(Yii::app()->session['company_id'] !== null){ ?>
<?php 
$this->breadcrumbs=array(
		'จัดการพนักงาน',
);

$this->menu=array(
		array('label'=>'เพิ่มบัญชีพนักงาน', 'url'=>array('create')),
		array('label'=>'กำหนดสิทธิ์', 'url'=>array('/site/page', 'view'=>'permission')),
		
		
);

Yii::app()->clientScript->registerScript('search', "
$('form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>จัดการพนักงาน</h1>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'staff-grid',
		'template'=>'{items}{pager}',
		'dataProvider'=>$user->searchStaff('$user=>company_id','search',array('company_id'=>$user->company_id=Yii::app()->session['company_id'])),
		'columns'=>array(
			array(
			'header'=>'ลำดับที่',
			'value'=>'$this->grid->dataProvider->pagination->offset+$row+1',
			'htmlOptions'=>array('style'=>'text-align:center'),
			),		
			'username',
			array('name'=>'staffProfile.title',
				'htmlOptions'=>array('style'=>'text-align:center')),
			array('name'=>'staffProfile.s_firstname',
				'htmlOptions'=>array('style'=>'text-align:center')),
			array('name'=>'staffProfile.s_lastname',
				'htmlOptions'=>array('style'=>'text-align:center')),
			array(
				'header'=>'',
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'htmlOptions'=>array('style'=>'width: 55px'),
			),
		)
	));
?>
<?php }else{?>
<?php $this->breadcrumbs=array(
		'จัดการพนักงาน',
);?>
<?php echo 'คุณไม่สามารถเข้าดูข้อมูลของพนักงานได้ กรุณาสมัครสมาชิกในส่วนของผู้ประกอบการ'; ?>
<?php }?>









