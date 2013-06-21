<?php
	class Comment extends AppModel{
	
		public $belongsTo = array('User','Post');
		
		public function add_comment ($cmt){
			if ($this->Save($cmt)){
				return true;
			}else return false;
		}
		
		public function get_comment($cid){
			return $this->findById($cid);
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