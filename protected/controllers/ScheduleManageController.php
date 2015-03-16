<?php

class ScheduleManageController extends Controller
{

	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','view','update','create','delete'),
				'users'=>array('@'),
			),

			array('deny',
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$bus = Bus::model()->findByPK($model->bus_id);
		
		$this->render('view',array(
			'model'=>$model,
			'bus'=>$bus,
		));
	}

	public function actionCreate()
	{
		$schedule = new Schedule;

		if(isset($_POST['Schedule']))
		{
			$schedule->attributes = $_POST['Schedule'];
			
			//$company = Company::model()->findByAttributes(array('id'=>Yii::app()->session['company_id']));

			$schedule->company_id = Yii::app()->session['company_id'];
			
			$valid = $schedule->validate();
			
			if($valid)
				if($schedule->save(false))
					$this->redirect(array('view','id'=>$schedule->ID));
		}

		$this->render('create',array(
			'schedule'=>$schedule,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$bus = Bus::model()->findByPK($model->bus_id);

		if(isset($_POST['Schedule']))
		{
			$model->attributes=$_POST['Schedule'];
			
			$valid = $model->validate();
			
			if($valid)
				if($model->save())
					$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('update',array(
			'model'=>$model,
			'bus'=>$bus,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	public function actionIndex()
	{
		$model=new Schedule('search');
		$model->unsetAttributes();
		if(isset($_GET['Schedule']))
			$model->attributes=$_GET['Schedule'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Schedule::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='schedule-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
