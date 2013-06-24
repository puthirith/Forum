<?php
	class PostsController extends AppController{
	
		public $uses = array('Comment','Post');
		
		public function add(){
			$myUser = $this->Session->read('User');
			
			if($this->request->is('post')){
				$post["user_id"]= $myUser['User']['id'];
				$post["status"]=$this->request->data['Comment']['status'];
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
			
			$comments = $this->Comment->get_comment_post($id);
			//pr($comments);exit();
			$this->set('comments', $comments);
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
				$comment["user_id"]=$myUser['User']['id'];
				$comment["post_id"]=$id;
				$comment["comment"]=$this->request->data['Comment']['cmt'];
				$comment["created"]=date("Y-m-d H:i:s");
				$comment["modified"]=date("Y-m-d H:i:s");
				if ($this->Comment->add_comment($comment)){
					//$this->Session->setFlash("Comment posted");
				}else {
					$this->Session->setFlash("Unable to post comment");
				}
				$this->redirect("view/".$id);
				//pr($comment);
			}
			
		}
		public function delete_cmt($id,$pid){
			if($this->Comment->delete_comment($id)){
				 $this->Session->setFlash('The comment has been deleted.');	 
				$this->redirect(array('action' => 'view' ,$pid));       	            
	        }else{
	        	$this->Session->setFlash('The comment is not deleted.');
	        }
		}
		
		public function delete($id) {
	        if ($this->request->is('get')) {
		        throw new MethodNotAllowedException();
	        }
	        if ($this->Post->delete($id,true)) {
	        	// foreach ($cmt as $cmts){
	        		// $this->Comment->delete_comment($cmts['id']);
	        	// }
	            $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
	            $this->redirect(array('action' => 'index' ));
	        }
    	}
		
		public function get_comment($id){
			//return $this->Comment->get_comment($id);
			$sql="SELECT u.firstname, u.lastname FROM users u INNER JOIN comments c ON u.id=c.user_id where c.id=23 ";
			return ($this->Post->query($sql));
		}
	}
?>