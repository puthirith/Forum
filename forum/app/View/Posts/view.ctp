<h2>Question: <?php echo h($posts['Post']['status']); ?></h2>
<p><small>Created: <?php echo $posts['Post']['created']; ?> by <?php echo ucfirst($posts['User']['lastname'])." ".ucfirst($posts['User']['firstname']);?>	
</small></p>

<?php $obj_cmt= new Comment();$color="#9B9898";//pr(ClassRegistry::init('CommentsController')->getComment());exit(); ?>

<p id="addLink">
	<?php
		$myUser = $this->Session->read('User');
		if ($posts['Post']['user_id']==$myUser['User']['id']){
			
			echo $this->Form->postLink('Delete',array('action' => 'delete', $posts['Post']['id']),
			array('confirm' => 'Are you sure?'));
			echo "   ";
			echo $this->Html->link('Edit', array('controller'=>'posts','action' => 'edit',$posts['Post']['id']));
		}
		
	?>
</p>
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