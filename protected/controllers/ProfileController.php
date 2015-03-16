<?php
class ProfileController extends Controller
{
	public $layout='//layouts/column2';
	
	public function actionUpdateProfileUser($id)
	{
		$user = User::model()->findByPK($id);
		$user_profile = UserProfile::model()->findByAttributes(array('user_id'=>$id));
	
		if(isset($_POST['UserProfile']))
		{
			$user_profile->attributes = $_POST['UserProfile'];
			
			$valid = $user_profile->validate();
			if($valid)
				if($user_profile->save(false)){
					$this->redirect(array('profile/viewprofileuser','id'=>$user->id));
				}
		}
	
		$this->render('updateprofileuser', array(
				'user'=>$user,
				'user_profile'=>$user_profile,
		));
	}
	
	public function actionViewProfileUser($id)
	{
		$user = User::model()->findByPK($id);
		
		$this->render('viewprofileuser', array(
				'user'=>$user,
		));
	}

	public function actionUpdateProfileCompany($id)
	{
		$company = Company::model()->findByPK($id);

		if(isset($_POST['Company']))
		{
			$company->attributes = $_POST['Company'];
	
			$valid = $company->validate();
			
			if($valid)
				if($company->save(false)){
					$this->redirect(array('profile/viewprofilecompany','id'=>$company->id));
				}
		}
	
		$this->render('updateprofilecompany', array(
				'company'=>$company,
		));
	}
	
	public function actionViewProfileCompany($id)
	{
		$company = Company::model()->findByPK($id);
		$user = new User;	
	
		$this->render('viewprofilecompany', array(
				'company'=>$company,
				'user'=>$user,
		));
	}
	
	public function actionUpdateProfileStaff($id)
	{
		$user = User::model()->findByPK($id);
		$staff_profile = StaffProfile::model()->findByAttributes(array('user_id'=>$id));
	
		if(isset($_POST['StaffProfile']))
		{
			$staff_profile->attributes = $_POST['StaffProfile'];
	
			$valid = $staff_profile->validate();
				
			if($valid)
				if($staff_profile->save(false)){
					$this->redirect(array('profile/viewprofilestaff','id'=>$user->id));
				}
		}
	
		$this->render('updateprofilestaff', array(
				'user'=>$user,
				'staff_profile'=>$staff_profile,
		));
	}
	
	public function actionViewProfileStaff($id)
	{
		$user = User::model()->findByPK($id);
	
		$this->render('viewprofilestaff', array(
				'user'=>$user,
		));
	}
	
 public function actionChangePassword()
  {
	    $model = new ChangePasswordForm;
	   	$user = User::model()->findByPK(array('id'=>Yii::app()->user->id));

	    if(isset($_POST['ChangePasswordForm']))
	    {
	        $model->attributes=$_POST['ChangePasswordForm'];
            $user->password = $model->newPassword;
          
            $valid = $model->validate();
            
            if($valid)
            {
		      	if($user->save(false))
		      	{
		      		Yii::app()->user->setFlash('success', "เปลี่ยนรหัสผ่านสำเร็จ!");
		       		$this->redirect(array('site/index'/*'id'=>$user->id*/));
		      	}
            }
	    }

	    $this->render('changepassword',array(
	    		'model'=>$model,
	    		'user'=>$user,
	    ));
  }
	
	public function accessRules()
	{
		return array(
				array('allow',
					  'actions'=>array('index','view','update','create','delete'),
					  'users'=>array('@'),),
	
				array('deny',
					  'users'=>array('*'),),
		);
	}
	
	public function loadModel($id)
	{
		$user=User::model()->findByPk($id);
		if($user===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $user;
	}		
}