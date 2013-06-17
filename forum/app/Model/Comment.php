<?php
	class Comment extends AppModel{
	
		public $belongsTo = array('User','Post');
		
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
		
	}
?>