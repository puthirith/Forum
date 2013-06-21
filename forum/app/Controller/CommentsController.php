<?php 
	class CommentsController extends AppController{
		
		public function index(){
			$this->set('comments', $this->Comment->find('all'));
		}
		
		public function getComment($id){
			return $this->Comment->findById($id);
		}
		
		public function edit($id = null,$pid){
			$myUser=$this->Session->read('User');
			if (!$id) {
        	throw new NotFoundException(('Invalid post'));
	        }
	        $comment = $this->Comment->findById($id);
	        if (!$comment) {
	        	throw new NotFoundException(('Invalid post'));
	        }
	        if ($this->request->is('post') || $this->request->is('put')) {
	        	$this->Comment->id = $id;
				$u_cmt['id']=$id;
				$u_cmt['user_id']=$myUser['User']['id'];
				$u_cmt['post_id']=$pid;
				$u_cmt['comment']=$this->request->data['Comment']['status'];
				//pr($u_cmt);exit();
	        	if ($this->Comment->Save($u_cmt)) {
	        		$this->Session->setFlash('Your comment has been updated.');
	        		$this->redirect(array('controller'=>'posts','action' => 'view',$pid));
	        	} else {
	        		$this->Session->setFlash('Unable to update your comment.');
	        	}
	        }
	        if (!$this->request->data) {
	        	$this->request->data = $comment;
	        }
		}
	}

?>