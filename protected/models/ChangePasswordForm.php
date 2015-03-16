<?php

class ChangePasswordForm extends CFormModel
{
	  public $currentPassword;
	  public $newPassword;
	  public $newPassword_repeat;
	  private $_user;
	  
	  public function rules()
	  {
	    return array(
	      array(
	        'currentPassword', 'checkPass'
	      ),
	      array(
	        'currentPassword, newPassword, newPassword_repeat', 'required',
	      ),
	      array(
	        'newPassword_repeat', 'compare','compareAttribute'=>'newPassword',
	      ),
	      
	    );
	  }
	  
	  public function checkPass($attribute, $params)
	  {
		   $user = User::model()->findByPK(Yii::app()->user->id);
		   if ($user->password !== $this->currentPassword)
		   {
			  $this->addError('currentPassword','รหัสผ่านปัจจุบันไม่ถูกต้อง');
			  return false;
		   }
		   return true;
	   }
	  
	  public function attributeLabels()
	  {
	    return array(
	      'currentPassword'=>'รหัสผ่านปัจจุบัน',
	      'newPassword'=>'รหัสผ่านใหม่',
	      'newPassword_repeat'=>'ยืนยัน รหัสผ่านใหม่',
	    );
	  }
}