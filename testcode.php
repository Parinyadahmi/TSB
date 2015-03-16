<?php 
//set session variable
Yii::app()->user->setState("state_name","value");

//check if state exists
Yii::app()->user->hasState("state_name");

//get session variable
Yii::app()->user->getState("state_name");
