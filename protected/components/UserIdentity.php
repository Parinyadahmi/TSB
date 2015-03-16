<?php

class UserIdentity extends CUserIdentity
{
	public $_id;
	
	public function authenticate()
	{
		$user = User::model()->findByAttributes(
				array(
					'username'=>$this->username,
					'password'=>$this->password,
				 ));
		
		if($user === null){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			$this->username = 'บุคคลทั่วไป';
		}
		elseif(empty($user->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			if($user->type_id == 1 || $user->type_id == 3){
				$this->username = $user->userProfile->firstname;
				Yii::app()->session['company_id'] = $user->company_id;
			}
			
			if($user->type_id == 2){
				$this->username = $user->staffProfile->s_firstname;
				Yii::app()->session['company_id'] = $user->company_id;
			}
			
			$this->_id = $user->id;
			$this->errorCode=self::ERROR_NONE;
			$user = User::model()->updateByPk($user->id,array('last_login_date'=> date("Y-m-d H:i:s")));
		}
		return !$this->errorCode;
	}
	
	public function getId()
	{
		return $this->_id;
	}

}
