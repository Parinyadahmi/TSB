<?php

class ReportPaidController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
		$model=$this->loadModel($id);
		$model->status = 0;
		$model->save();
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new ReportPaid;

		if(isset($_POST['ReportPaid']))
		{
			$model->attributes=$_POST['ReportPaid'];
			
			$valid = $model->validate();
			
			$models = ReportPaid::model()->findAll();
			$code = sprintf("paid%04d",(count($models)+1));
			
			if ($image = CUploadedFile::getInstance ( $model, 'slip' )) {
				// path for file upload
				$path = Yii::getPathOfAlias ( 'webroot' ) . '/images/';
				// use image name as username
				$filename = $code.'_slip' . '.' . $image->getExtensionName ();
				// uploaded image to path
				$image->saveAs ( $path . $filename );
			} else
				// this for no image file upload
				$filename = 'noimage.jpg';
				// set another user attribute
				$model->slip = $filename;
				$model->status = 1;
			
			if($valid)
				if($model->save())
					Yii::app()->user->setFlash('success', "ทำรายการสำเร็จ!");
					$this->redirect(array('site/index'));
		}

		$this->render('create',array(
			'model'=>$model,
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
		$model=new ReportPaid('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ReportPaid']))
			$model->attributes=$_GET['ReportPaid'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=ReportPaid::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='report-paid-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
