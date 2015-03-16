<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'ลงชื่อเข้าใช้',
);
?>

<h3>ลงชื่อเข้าใช้</h3>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<?php echo $form->textFieldRow($model,'username'); ?>

	<?php echo $form->passwordFieldRow($model,'password'); ?>

	<?php echo $form->checkBoxRow($model,'rememberMe'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'ล็อกอิน',
        )); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'สมัครสมาชิก',
			'type'=>'warning',
			'url'=>'index.php?r=site/registerguest',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
