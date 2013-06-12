<h2>Post</h2>
<?php
	echo $this->Form->create();
	echo $this->Form->input('user_id');
	echo $this->Form->input('status');
	echo $this->Form->end('Post');
?>