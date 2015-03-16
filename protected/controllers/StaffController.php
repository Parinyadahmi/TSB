<?php
class StaffController extends Controller
{
	public $layout='//layouts/column2';
	
	public function actionCreate()
	{
		$user = new User;
		$staff_profile = new StaffProfile;
	
		if(isset($_POST['User']))
		{
			$user->attributes = $_POST['User'];
			$staff_profile->attributes = $_POST['StaffProfile'];
	
			$user->create_date  = date('Y-m-d H:i:s');
			$user->type_id  = 2;
			$user->company_id  = Yii::app()->session['company_id'];
	
			$valid = $user->validate();
			$valid = $staff_profile->validate() && $valid;
			
			if($valid)
				if($user->save(false)){
					
					$company = Company::model()->findByAttributes(array('id'=>Yii::app()->session['company_id']));
					$staff_profile->company_name = $company->company_name;
					$staff_profile->user_id = $user->id;
					$staff_profile->manager_id = Yii::app()->user->id;
		
					if($staff_profile->save(false))
		
						$this->redirect(array('staff/index'));
				}
				
		}
	
		$this->render('create', array(
				'user'=>$user,
				'staff_profile'=>$staff_profile,
		));
	}
	
	public function actionUpdate($id)
	{
		$user = User::model()->findByPK($id);
		$staff_profile = StaffProfile::model()->findByAttributes(array('user_id'=>$id));
		
		if(isset($_POST['StaffProfile']))
		{
			$staff_profile->attributes = $_POST['StaffProfile'];
			
			$valid = $staff_profile->validate();
			
			if($valid)
				if($staff_profile->save())
						$this->redirect(array('staff/view','id'=>$user->id));
			}
		
		$this->render('update', array(
			'user'=>$user,
			'staff_profile'=>$staff_profile,
		));
	}
	
	public function actionIndex()
	{
		$user = new User('search');
		$user->unsetAttributes();
		if(isset($_GET['User'])) 
			$user->attributes=$_GET['User'];
		$this->render('index', array(
				'user'=>$user,
		));
	}
	
	public function actionView($id)
	{
		$user = User::model()->findByPK($id);
	
		$this->render('view', array(
				'user'=>$user,
		));
	}
	
	public function actionDelete($id)
	{
		$user = User::model()->findByPK($id);
		$user->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(
					isset($_POST['returnUrl'])?
					$_POST['returnUrl'] : array('index'));
	}
}

