<?php
/* @var $this ScheduleManageController */
/* @var $data Schedule */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start')); ?>:</b>
	<?php echo CHtml::encode($data->start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dest')); ?>:</b>
	<?php echo CHtml::encode($data->dest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company')); ?>:</b>
	<?php echo CHtml::encode($data->company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leave_time')); ?>:</b>
	<?php echo CHtml::encode($data->leave_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('arrive_time')); ?>:</b>
	<?php echo CHtml::encode($data->arrive_time); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('standard')); ?>:</b>
	<?php echo CHtml::encode($data->standard); ?>
	<br />
</div>