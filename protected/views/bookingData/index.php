<?php

$this->breadcrumbs=array(
	'ข้อมูลการจอง',
);
?>

<?php
Yii::app()->clientScript->registerScript('search', "
$('#exportToExcel').click(function(){
   window.location = '". $this->createUrl('BookingData/index')  . "&' + $(this).parents('form').serialize() + '&export=true';
   return false;
});
$('.search-form form').submit(function(){
	$('#booking-data-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});

");
?>
<h1>ข้อมูลการจอง</h1>
<div>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php echo $form->textFieldRow($model, 'ID', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'ค้นหา')); ?><br><br>
<?php echo CHtml::button(Yii::t('app', 'Export to Excel (xls)'), array('id' => 'exportToExcel')); ?>
<?php $this->endWidget(); ?>
</div>

<?php /*  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'booking-data-grid',
	'template'=>'{items}{pager}',
	'dataProvider'=>$model->searchForCompany(),
	'columns'=>array(
		array('name'=>'ID',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'departure_date',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'booking_date',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'pay_stat',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'staff_name',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array(
			'header'=>'',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'htmlOptions'=>array('style'=>'width: 55px'),
		),
	),
));  */?>

<!-- **************************************TEST************************************** -->

<?php $this->widget('application.components.widgets.tlbExcelView', array(
	'id'				   => 'booking-data-grid',
    'dataProvider'         => $model->searchForCompany(),
    'grid_mode'            => $production, // Same usage as EExcelView v0.33
    'template'			   => '{items}{pager}',
    'title'                => 'Some title - ' . date('d-m-Y - H-i-s'),
    'creator'              => 'Your Name',
    'subject'              => mb_convert_encoding('Something important with a date in French: ' . utf8_encode(strftime('%e %B %Y')), 'ISO-8859-1', 'UTF-8'),
    'description'          => mb_convert_encoding('Etat de production généré à la demande par l\'administrateur (some text in French).', 'ISO-8859-1', 'UTF-8'),
    'lastModifiedBy'       => 'Some Name',
    'sheetTitle'           => 'Report on ' . date('m-d-Y H-i'),
    'keywords'             => '',
    'category'             => '',
    'landscapeDisplay'     => true, // Default: false
    'A4'                   => true, // Default: false - ie : Letter (PHPExcel default)
    'RTL'                  => false, // Default: false - since v1.1
    'pageFooterText'       => '&RThis is page no. &P of &N pages', // Default: '&RPage &P of &N'
    'automaticSum'         => true, // Default: false
    'decimalSeparator'     => ',', // Default: '.'
    'thousandsSeparator'   => '.', // Default: ','
    //'displayZeros'       => false,
    //'zeroPlaceholder'    => '-',
    'sumLabel'             => 'Column totals:', // Default: 'Totals'
    'borderColor'          => '00FF00', // Default: '000000'
    'bgColor'              => 'FFFF00', // Default: 'FFFFFF'
    'textColor'            => 'FF0000', // Default: '000000'
    'rowHeight'            => 45, // Default: 15
    'headerBorderColor'    => 'FF0000', // Default: '000000'
    'headerBgColor'        => 'CCCCCC', // Default: 'CCCCCC'
    'headerTextColor'      => '0000FF', // Default: '000000'
    'headerHeight'         => 10, // Default: 20
    'footerBorderColor'    => '0000FF', // Default: '000000'
    'footerBgColor'        => '00FFCC', // Default: 'FFFFCC'
    'footerTextColor'      => 'FF00FF', // Default: '0000FF'
    'footerHeight'         => 50, // Default: 20
    	'columns'=>array(
		array('name'=>'ID',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'departure_date',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'booking_date',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'pay_stat',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array('name'=>'staff_name',
			'htmlOptions'=>array('style'=>'text-align:center')),
		array(
			'header'=>'',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'htmlOptions'=>array('style'=>'width: 55px'),
		),
	),
)); ?>
