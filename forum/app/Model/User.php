<?php 
	
App::uses('Security','Utility');

	class User extends AppModel{
		
		public $displayField = 'email';
		
		public $hasMany=array(
			'Post'
		);
	
		public $validate = array(
			'firstname'=> array(
				'rule'=>'notEmpty',
				'message'=>'Please input First name.'
			),
			'lastname'=> array(
				'rule'=>'notEmpty',
				'message'=>'Please input last name.'
			),
			'email'=> array(
				'rule'=>'email',
				'message'=>'Please input valid email.'
			),
			'password'=> array(
				'rule'=>array('between',5,10),
				'message'=>'Password must be between 5 and 10 characters.'
			)
		);
	
		public function beforeSave ( $options = array()){
			$this->data['User']['password']=Security::hash($this->data['User']['password'],'sha1',true);
			
			return true;
		}
	}
?>