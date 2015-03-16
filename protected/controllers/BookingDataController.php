<?php

class BookingDataController extends Controller
{

	public $layout='//layouts/column2';

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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionCustomerView($id)
	{
		$this->render('customer_view',array(
				'model'=>$this->loadModel($id),
		));
	}
	
	public function actionManagerView($id)
	{
		$this->render('manager_view',array(
				'model'=>$this->loadModel($id),
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['BookingData']))
		{
			$model->attributes=$_POST['BookingData'];
			
			$model->staff_name = Yii::app()->user->name;
			if($model->save(false))
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

/* 	public function actionIndex()
	{
		$this->layout='column1';
		
		$model=new BookingData('search');
		$model->unsetAttributes();
		if(isset($_GET['BookingData']))
			$model->attributes=$_GET['BookingData'];

		$this->render('index',array(
			'model'=>$model,
		));
	} */
	
	public function actionIndex()
	{
		$this->layout='column1';
		
		$model = new BookingData('search');
		$model->unsetAttributes();
		if (isset($_GET['BookingData'])) {
			$model->attributes = $_GET['BookingData'];
		}
		if (isset($_GET['export'])) {
			$production = 'export';
		} else {
			$production = 'grid';
		}
		$this->render('index', array(
				'model' => $model, 
				'production' => $production,
		));
	}
	
	public function actionCustomerIndex()
	{
		$this->layout='column1';
		$model=new BookingData('search');
		$model->unsetAttributes();
		if(isset($_GET['BookingData']))
			$model->attributes=$_GET['BookingData'];
	
		$this->render('customer_index',array(
				'model'=>$model,
		));
	}
	
	public function actionManagerIndex()
	{
		$this->layout='column1';
		$model=new BookingData('search');
		$model->unsetAttributes();
		if(isset($_GET['BookingData']))
			$model->attributes=$_GET['BookingData'];
	
		$this->render('manager_index',array(
				'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=BookingData::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='booking-data-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
