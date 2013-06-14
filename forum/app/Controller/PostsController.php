<?php
	class PostsController extends AppController{
	
		public function add(){
			
			$users = $this->Post->User->find('list');
			
			if($this->request->is('post')){
				$this->Post->save($this->request->data);	
			}
			
			$this->set('users',$users);
		}
		
		public function index(){
			$this->set('posts', $this->Post->find('all'));
		}
		
		public function view(){
			if (!$id) {
	            throw new NotFoundException(('Invalid post'));
	        }
	        $post = $this->Post->findById($id);
	        if (!$post) {
	            throw new NotFoundException(('Invalid post'));
	        }
	        $this->set('post', $post);
		}
	}
?>