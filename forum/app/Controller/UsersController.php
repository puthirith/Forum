<?php 
	class UsersController extends AppController{
	
		
	
		public function index(){
			
			$users = $this->User->find('all');
			//pr($users);
			
			$this->set('users',$users);
		}
		
		public function add(){
			if($this->request->is('post')){
				
				$this->User->save($this->request->data);
				$this->redirect('/');
				
			}
		}
		
		public function login(){
			$this->layout = "login";
			if($this->request->is('post')){
				//1. find method and 2 conditions
				/*$user=$this->User->find('first',array(
					'conditions'=>array(
						'email'=>$this->request->data('User.email'),
						'password'=>$this->request->data('User.password')
						)
					)
				);
				debug($user);*/
				//2. Magic find
				$user=$this->User->findByEmailAndPassword(
					$this->request->data('User.email'),
					$this->request->data('User.password')			
				);
				debug($user);
				if($user){
					$this->Session->write('User',$user);
					$this->redirect(array(
						'controller'=>'users',
						'action'=>'index'
					));
				}
				
				$this->Session->setFlash('Email and password combination are not correct');
			}
		}
	}
?>