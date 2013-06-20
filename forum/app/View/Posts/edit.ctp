<h2>Edit Post</h2>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('status');
echo $this->Form->end('Save Post');
?>