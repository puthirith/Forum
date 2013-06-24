<?php
	class Comment extends AppModel{
	
		public $belongsTo = array('User','Post');
		
		public function add_comment ($cmt){
			if ($this->Save($cmt)){
				return true;
			}else return false;
		}
		
		public function get_comment_post($pid){
			
			$arr = $this->find('all', array(
				'conditions' => array('post_id'=>$pid)
			));
			return $arr;
		}
		
		public function delete_comment($id) {
	        if ($this->delete($id)) {
	            return true;
	        }else{
	        	return false;
	        }
    	}
		
		
	}
?>