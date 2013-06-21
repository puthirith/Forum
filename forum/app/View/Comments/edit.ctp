<h2>Edit Comment</h2>
<?php
echo $this->Form->create('Comment');
echo $this->Form->input('status');
echo $this->Form->end('Save Comment');
?>