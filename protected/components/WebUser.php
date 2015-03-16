<?php

class WebUser extends CWebUser {

	private $_user;
		
	public function isCustomer()
	{
		$user = $this->loadUser(Yii::app()->user->id); //เรียก tblUser โดยดูที่ id ของตาราง
		if ($user===null)
			return 0;
		else
			return intval($user->type_id) == 1;
	}
	
	public function isStaff()
	{
		$user = $this->loadUser(Yii::app()->user->id); //เรียก tblUser โดยดูที่ id ของตาราง
		if ($user===null)
			return 0;
		else
			return intval($user->type_id) == 2;
	}
	
	public function isManager()
	{
		$user = $this->loadUser(Yii::app()->user->id); //เรียก tblUser โดยดูที่ id ของตาราง
		if ($user===null)
			return 0;
		else
			return intval($user->type_id) == 3;
	}
	
	public function isAdmin()
	{
		$user = $this->loadUser(Yii::app()->user->id); //เรียก tblUser โดยดูที่ id ของตาราง
		if ($user===null)
			return 0;
		else
			return intval($user->type_id) == 4;
	}

	protected function loadUser($id=null)
	{
		if($this->_user===null)
		{
	    	if($id!==null):
	    	     $this->_user = User::model()->findByPk($id);
	   	 	endif;
		}
			return $this->_user;
	}
}
?>