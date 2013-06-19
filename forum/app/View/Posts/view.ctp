<h2><?php echo h($posts['Post']['status']); ?></h2>
<p><small>Created: <?php echo $posts['Post']['created']; ?></small></p>
<?php $obj_cmt= new Comment();$color="#9B9898";//pr(ClassRegistry::init('CommentsController')->getComment());exit(); ?>
<table>
	<tr>
		<th>User</th>
		<th>Answer</th>
		<th>Commented date</th>
		
	</tr>
	<?php foreach($posts['Comment'] as $comment): ?>
		<tr bgcolor="#9B9898">
			<td width="15%"><?php //echo $comment['user_id']; 
					$cmt= $obj_cmt->get_comment($comment['user_id']);
					echo ucfirst($cmt['User']['lastname'])." ".ucfirst($cmt['User']['firstname']);
				?></td>
			<td width="65%"><?php echo $comment['comment']; ?></td>
			<td width="20%"><?php echo $comment['created']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php
	echo $this->Form->create();
	echo $this->Form->input('comment');
	echo $this->Form->end('Submit');
?>