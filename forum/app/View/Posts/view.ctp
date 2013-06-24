<h2>Question: <?php echo h($posts['Post']['status']); ?></h2>
<p><small>Created: <?php echo $posts['Post']['created']; ?> by <?php echo ucfirst($posts['User']['lastname'])." ".ucfirst($posts['User']['firstname']);?>	
</small></p>

<p id="addLink">
	<?php
		$myUser = $this->Session->read('User');
		if ($posts['Post']['user_id']==$myUser['User']['id']){
			echo $this->Form->postLink('Delete',array('action' => 'delete', $posts['Post']['id']),
			array('confirm' => 'Are you sure?'));
			echo " ";
			echo $this->Html->link('Edit', array('controller'=>'posts','action' => 'edit',$posts['Post']['id']));
		}
		
	?>
</p>
<table>
	<tr>
		<th>User</th>
		<th>Answer</th>
		<th>Commented date</th>
		<th>Action</th>
		
	</tr>
	<?php $index=0;foreach($posts['Comment'] as $comment): ?>
		<tr bgcolor="#9B9898">
			<td width="15%"><?php 
					$fname= ucfirst( $comments[$index]['User']['firstname']);
					$lname= ucfirst( $comments[$index]['User']['lastname']);
					echo $lname." ".$fname;
				?></td>
			<td width="55%"><?php echo $comment['comment']; ?></td>
			<td width="20%"><?php echo $comment['created']; ?></td>
			<td width="10%">
				<?php
					$myUser=$this->Session->read('User');
					if ($comment['user_id']==$myUser['User']['id']){
						echo $this->Form->postLink('Delete',array('action' => 'delete_cmt', $comment['id'],$comment['post_id']),
							array('confirm' => 'Are you sure?'));
						echo " ";
    					echo $this->Html->link('Edit', array('controller'=>'comments','action' => 'edit', $comment['id'],$comment['post_id']));
					}  
    			?>
			</td>
		</tr>
	<?php $index=$index+1;endforeach; ?>
</table>
<?php
	echo $this->Form->create();
	echo $this->Form->input('cmt',array('label'=>' Comment: '));
	echo $this->Form->end('Submit');
?>