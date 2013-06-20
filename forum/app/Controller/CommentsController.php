<?php 
	class CommentsController extends AppController{
		
		public function index(){
			$this->set('comments', $this->Comment->find('all'));
		}
		
		public function getComment(){
			
			$comments=$this->Comment->find('all');
			$commentsbyid;
			
			foreach ($comments as $comment){
				if ($comment['post_id']=="1"){
					$commentsbyid=$comment;
				}
			}
			return $commentsbyid;
			//$this->set('comments', $commentsbyid);
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
	        	$this->Comment->id = $id;
	        	if ($this->Post->save($this->request->data)) {
	        		//$this->Session->setFlash('Your post has been updated.');
	        		$this->redirect(array('action' => 'view',$id));
	        	} 
	        }
	        if (!$this->request->data) {
	        	$this->request->data = $post;
	        }
		}
	}

?>