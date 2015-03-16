<?php
$this->pageTitle = Yii::app()->name;
?>

<h1>ยินดีต้อนรับคุณ<?php echo Yii::app()->user->id?Yii::app()->user->name:'ลูกค้าที่มาใช้บริการ'; ?></h1>

<div align="center">
	<br> <br>
<?php
$this->widget('bootstrap.widgets.TbCarousel', array(
    'items' => array(
        
        array(
            'image' => 'images/กระดานข่าว.png'
        ),
    )
));
?>

</div>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#schedule-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<br />
<h3 style="margin-left: 125px">ค้นหาเที่ยวรถ</h3>
<div class="search-form">
<?php

$this->renderPartial('_search', array(
    'schedule' => $schedule
));
?>

<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'schedule-grid',
    'template' => '{items}{pager}',
    'dataProvider' => $schedule->searchForGuest(),
    'columns' => array(
        array(
            'name' => 'start',
            'htmlOptions' => array(
                'style' => 'text-align:center; width: 150px;'
            )
        ),
        array(
            'name' => 'dest',
            'htmlOptions' => array(
                'style' => 'text-align:center; width: 150px;'
            )
        ),
        array(
            'name' => 'companyData.company_name',
            'htmlOptions' => array(
                'style' => 'text-align:center; width: 150px;'
            )
        ),
        array(
            'name' => 'price',
            'htmlOptions' => array(
                'style' => 'text-align:center; width: 80px;'
            )
        ),
        array(
            'name' => 'leave_time',
            'htmlOptions' => array(
                'style' => 'text-align:center; width: 100px;'
            )
        ),
        array(
            'name' => 'arrive_time',
            'htmlOptions' => array(
                'style' => 'text-align:center; width: 100px;'
            )
        ),
        array(
            'name' => 'busData.standard',
            'htmlOptions' => array(
                'style' => 'text-align:center; width: 50px;'
            )
        )
    )
));
?>
</div>