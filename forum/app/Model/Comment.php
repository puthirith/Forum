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
		
		public function add_comment ($cmt){
			if ($this->Save($cmt)){
				return true;
			}else return false;
		}
		
		public function get_comment($cid){
			return $this->findById($cid);
		}
		
		public function delete_comment($pid){
			$sql ="DELETE * FROM comments WHERE post_id=". $pid;
			return $this->query($sql);
		}
	}
?>