<?php 
	class UsersController extends AppController{
	
		
	
		public function index(){
			
			$users = $this->User->find('all');
			//pr($users);
			
			$this->set('users',$users);
		}
		
		public function add(){
			if($this->request->is('post')){
					
				$this->User->create();
	            if ($this->User->save($this->request->data)) {
	                $this->Session->setFlash(('The user has been saved'));
	                $this->redirect(array('controller'=>'users','action' => 'login'));
	            } else {
	                $this->Session->setFlash(('The user could not be saved. Please, try again.'));
	            }
			
			/*
				$this->User->save($this->request->data);
				$this->redirect(array(
						'controller'=>'users',
						'action'=>'login'
					));
			*/	
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
				//debug($user);
				if($user){
					$this->Session->write('User',$user);
					$this->redirect(array(
						'controller'=>'posts',
						'action'=>'index'
					));
				}
				
				$this->Session->setFlash('Email and password combination are not correct');
			}
		}
		public function logout(){
            $this->Session->destroy();
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
	}
?>