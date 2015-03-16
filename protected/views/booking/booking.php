<script type="text/javascript">
		function showHide() 
		{
		    if(document.getElementById("ticket_dropdown").selectedIndex == 1) 
		    {
		        document.getElementById("hidden_div").style.display = ""; // This line makes the DIV visible
		    } 
		    else {            
		        document.getElementById("hidden_div").style.display = "none"; // This line hides the DIV
		    }
		}
</script>

<?php
$this->breadcrumbs = array(
    'ค้นหาเที่ยวรถ' => array(
        'choose'
    ),
    'กรอกข้อมูลการจอง'
);
?>
<h1>กรอกข้อมูลการจอง</h1>
<br />
<h3>รายละเอียดเที่ยวรถ</h3>

<div class="form">
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'booking_data-form',
	'method' => 'post',
	'clientOptions'=>array(
			'validateOnChange'=>true,
	),
    'htmlOptions' => array(
    	'enctype' => 'multipart/form-data'
    )
));
?>
	<?php echo $form->errorSummary($booking); ?>
	
	<div class="row">
	<label>การเดินทาง <span style="color: red;">*</span></label> 
		<select name="trip" id="ticket_dropdown" onchange="showHide()">
		    <option value="one_trip">เที่ยวเดียว</option>
		    <option value="return_trip">ไปกลับ</option>
		</select>
	</div>
	
	<br>
	
	<div class="row">
		<?php echo $form->label($booking,'start'); ?>
		<?php echo $form->textField($booking,'start',array('readonly' => true)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($booking,'dest'); ?>
		<?php echo $form->textField($booking,'dest',array('readonly' => true)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($booking_data,'point'); ?>
		<?php echo $form->dropDownList($booking_data,'point',
			       CHtml::listdata(DestinationPoint::model()->findAllByAttributes(array
				   ('province_id'=>$province_key->id)),
                   'destination_point','destination_point'),
				   array('prompt' => '--กรุณาเลือก--')); ?>
		<?php echo $form->error($booking_data,'point'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($booking_data,'departure_date');?>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'attribute' => 'departure_date',
		    'language' => 'th',
		    'model' => $booking_data,
		    'options' => array(
		        'showAnim' => 'fadeIn', // 'fold', 'slideDown','fadeIn','blind,...
		        'dateFormat' => 'dd-mm-yy',
		        'changeMonth' => true,
		        'changeYear' => true,
		        'minDate' => 0
	    )
	));
	?><span>&nbsp;คลิ๊กเพื่อเลือกวันที่</span>
	<?php echo $form->error($booking_data, 'departure_date'); ?>
	</div>
	<br>
	
	<div id="hidden_div" style="display:none;">	
		
		<div class="row">
			<?php echo $form->label($booking,'start_return'); ?>
			<?php echo $form->textField($booking,'dest',array('readonly' => true)); ?>
		</div>
	
		<div class="row">
			<?php echo $form->label($booking,'dest_return'); ?>
			<?php echo $form->textField($booking,'start',array('readonly' => true)); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($booking_data,'return_point'); ?>
			<?php echo $form->dropDownList($booking_data,'return_point',
				       CHtml::listdata(DestinationPoint::model()->findAllByAttributes(array
					   ('province_id'=>$province_key_return->id)),
	                   'destination_point','destination_point'),
					   array('prompt' => '--กรุณาเลือก--')); ?>
			<?php echo $form->error($booking_data,'return_point'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($booking_data,'return_date');?>
			<?php	
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute' => 'return_date',
			    'language' => 'th',
			    'model' => $booking_data,
			    'options' => array(
			        'showAnim' => 'fadeIn', // 'fold', 'slideDown','fadeIn','blind,...
			        'dateFormat' => 'dd-mm-yy',
			        'changeMonth' => true,
			        'changeYear' => true,
			        'minDate' => 0
			    )
			));
			?><span>&nbsp;คลิ๊กเพื่อเลือกวันที่</span>
			<?php echo $form->error($booking_data,'return_date');?>
		</div>
			
	</div>
	<br>
	<div class="row">
		<?php echo $form->label($booking,'price'); ?>
		<?php echo $form->textField($booking,'price',array('readonly' => true)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($company,'company_name'); ?>
		<?php echo $form->textField($company,'company_name',array('readonly' => true)); ?>
	</div>
	
	<div class="row">
	<?php echo $form->label($booking,'leave_time'); ?> 
	<?php echo $form->textField($booking,'leave_time',array('readonly' => true)); ?>
	</div>

	<div class="row">
	<?php echo $form->label($booking,'arrive_time'); ?> 
	<?php echo $form->textField($booking,'arrive_time',array('readonly' => true)); ?>
	</div>
	
	<br />
	
	<h3>ข้อมูลการจอง</h3>

	<div class="row">
		<?php echo $form->labelEx($booking_data, 'passenger_name'); ?>
		<?php echo $form->textField($booking_data, 'passenger_name'); ?> <span>&nbsp;ท่านใดท่านหนึ่ง</span>
		<?php echo $form->error($booking_data, 'passenger_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($booking_data, 'passenger_tel'); ?>
		<?php echo $form->textField($booking_data, 'passenger_tel'); ?> <span>&nbsp;เบอร์โทรศัพมือถือ</span>
		<?php echo $form->error($booking_data, 'passenger_tel'); ?>
	</div>

	<br />
	
	<div class="row">
		<?php echo $form->labelEx($booking_data, 'amount'); ?>
		<?php

	echo $form->dropDownList($booking_data, 'amount', array(
	    '1' => '1',
	    '2' => '2',
	    '3' => '3',
		'4' => '4',
		'5' => '5',
		'6' => '6',
		'7' => '7',
		'8' => '8',
		'9' => '9',
	), array(
	    'prompt' => '--กรุณาเลือก--'
	));
	?>
		<?php echo $form->error($booking_data, 'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($booking, 'company_id'); ?>
		<?php echo $form->error($booking, 'company_id'); ?>
	</div>

	<div style="margin-left: 125px"><?php

$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'เสร็จสิ้น',
    'buttonType' => 'submit',
    'type' => 'success'
));
?>
&nbsp;
<?php

$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'ยกเลิก ',
    'type' => 'danger',
    'url' => 'index.php?r=booking/choose'
));
?></div>
	
<?php $this->endWidget(); ?>
</div>
<!-- form -->