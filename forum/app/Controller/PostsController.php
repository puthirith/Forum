<?php
	class PostsController extends AppController{
	
		public $uses = array('Comment','Post');
		
		public function add(){
			$myUser = $this->Session->read('User');
			//$users = $this->Post->User->find('list');
			
			if($this->request->is('post')){
				//pr($this->request->data());exit;
				//$this->Post->save($this->request->data);	
				$post["user_id"]= $myUser['User']['id'];
				$post["status"]=$this->request->data['Comment']['status'];
				//$post["status"]= $this->passedArgs['status'];
				//$post["status"]= "hi";
				$post["created"]=date("Y-m-d H:i:s");
				$post["modified"]=date("Y-m-d H:i:s");
				$this->Post->save($post);
				$this->redirect(array(
						'controller'=>'posts',
						'action'=>'index'
					));
			}
			
			//$this->set('users',$myUser);
			
		}
		
		public function index(){
			$this->set('posts', $this->Post->find('all'));
		}
		
		public function edit($id = null){
			if (!$id) {
        	throw new NotFoundException(('Invalid post'));
	        }
	        $post = $this->Post->findById($id);
	        if (!$post) {
	        	throw new NotFoundException(('Invalid post'));
	        }
	        if ($this->request->is('post') || $this->request->is('put')) {
	        	$this->Post->id = $id;
	        	if ($this->Post->save($this->request->data)) {
	        		$this->Session->setFlash('Your post has been updated.');
	        		$this->redirect(array('action' => 'view',$id));
	        	} else {
	        		$this->Session->setFlash('Unable to update your post.');
	        	}
	        }
	        if (!$this->request->data) {
	        	$this->request->data = $post;
	        }
		}
		
		public function view($id=null){
			if (!$id) {
	            throw new NotFoundException(('Invalid post'));
	        }
	        $post = $this->Post->findById($id);
	        if (!$post) {
	            throw new NotFoundException(('Invalid post'));
	        }
	        $this->set('posts', $post);
			
			//add comment
			
			$myUser = $this->Session->read('User');
			
			
			if($this->request->is('post')){
				//print_r($this->request->data); exit();
				$comment["user_id"]=$myUser['User']['id'];
				$comment["post_id"]=$id;
				$comment["comment"]=$this->request->data['Comment']['comment'];
				$comment["created"]=date("Y-m-d H:i:s");
				$comment["modified"]=date("Y-m-d H:i:s");
				//pr($comment);
				//$this->Comment->add_comment($comment);
				if ($this->Comment->add_comment($comment)){
					//$this->Session->setFlash("Comment posted");
				}else {
					$this->Session->setFlash("Unable to post comment");
				}
				$this->redirect("view/".$id);
				//pr($comment);
			}
		}
		
		public function delete($id) {
	        if ($this->request->is('get')) {
		        throw new MethodNotAllowedException();
	        }
	        if ($this->Post->delete($id,true)) {
	            $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
	            $this->redirect(array('action' => 'index' ));
	        }
    	}
	}
?>