<?php
class UserController extends Controller
{
	public $layout='//layouts/column2';
	
	public function actionUpdate($id)
	{
		$user = User::model()->findByPK($id);
		$user_profile = UserProfile::model()->findByAttributes(array('user_id'=>$id));
		$staff_profile = StaffProfile::model()->findByAttributes(array('user_id'=>$id));
		
		if(isset($_POST['User']))
		{
			$user->attributes = $_POST['User'];

				if($user->save(false)){
						$this->redirect(array('user/view','id'=>$user->id));
				}
			}
		
		$this->render('update', array(
			'user'=>$user,
			'user_profile'=>$user_profile,
			'staff_profile'=>$staff_profile,
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

	public function actionView($id)
	{
		$user = User::model()->findByPK($id);
		
		$this->render('view', array(
			'user'=>$user,
		));
	}

	public function actionIndex()
	{
		$this->layout='column1';
		$user = new User('search');
		$user->unsetAttributes();  // clear any default values
		if(isset($_GET['User'])) // this code for search function
			$user->attributes=$_GET['User'];
		$this->render('index', array(
			'user'=>$user,
		));
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
		
}