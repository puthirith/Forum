<?php
	class PostsController extends AppController{
	
		public function add(){
			
			$users = $this->Post->User->find('list');
			
			if($this->request->is('post')){
				$this->Post->save($this->request->data);	
			}
			
			$this->set('users',$users);
		}
	}
?>