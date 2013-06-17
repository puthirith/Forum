<h2><?php echo h($posts['Post']['status']); ?></h2>
<p><small>Created: <?php echo $posts['Post']['created']; ?></small></p>
<?php //pr(ClassRegistry::init('CommentsController')->getComment());exit(); ?>
<table>
	<?php foreach($posts['Comment'] as $comment): ?>
		
		<tr>
			<td><?php echo $comment['user_id']; 
					
				?></td>
			<td><?php echo $comment['comment']; ?></td>
			<td><?php echo $comment['created']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php
	echo $this->Form->create();
	echo $this->Form->input('comment');
	echo $this->Form->end('Submit');
?>