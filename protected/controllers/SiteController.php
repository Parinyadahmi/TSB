<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$schedule = new Schedule('search');
		$schedule->unsetAttributes();
		if(isset($_GET['Schedule']))
			$schedule->attributes=$_GET['Schedule'];
		
		$this->render('index',array(
				'schedule'=>$schedule,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionRegisterGuest()
	{
		$user = new User;
		$user_profile = new UserProfile;
	
		if(isset($_POST['User']))
		{
			$user->attributes = $_POST['User'];
			$user_profile->attributes = $_POST['UserProfile']; // get value form register
			
			
			$valid = $user->validate(); //check user's rules
			$valid = $user_profile->validate() && $valid;
				
			if($valid){
				$user->create_date = date('Y-m-d H:i:s');
				$user->type_id  = 1;
	
				if($user->save(false)){ // don't check rules again
						
					$user_profile->user_id = $user->id; //return FK automatic
						
				if($user_profile->save(false)){
							
					if($user_profile->save(false))
							$this->redirect(array('site/login'));
					}
				}
			}
		}
		$this->render('register', array(
				'user'=>$user,
				'user_profile'=>$user_profile
		));
	}
	
	public function actionRegisterEntrepreneur()
	{
		$user = new User;
		$user_profile = new UserProfile;
		$company = new Company;
	
		if(isset($_POST['User']))
		{
			$user->attributes=$_POST['User'];
			$user_profile->attributes=$_POST['UserProfile'];
			$company->attributes=$_POST['Company'];
		
			$valid = $user->validate(); //check user's rules
			$valid = $user_profile->validate() && $valid;
			$valid = $company->validate() && $valid;
			
			if($valid){
				if($company->save(false)){

					$user->create_date  = date('Y-m-d H:i:s');
					$user->type_id  = 1;
					$user->company_id = $company->id;
				
					if($user->save(false)){
					
						$user_profile->user_id = $user->id;
						
						if($user_profile->save(false))
					
							$this->redirect(array('site/login'));
					}
				}
			}
		}
		$this->render('register_company',array(
				'user'=>$user,
				'user_profile'=>$user_profile,
				'company'=>$company,
		));
	}
}