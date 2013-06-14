<h2>Post </h2>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Question</th>
        <th>Created</th>
    </tr>
    <!-- Here’s where we loop through our $posts array, printing out post info -->
    <?php foreach ($posts as $post): ?>
    <tr>
    	<td><?php 
    			echo $this->Html->link($post['Post']['user_id'],array('action'=>'index',$post['Post']['user_id'])); 
    		
    		?>
    	</td>
    	
    	<td>
    		<?php echo $this->Html->link($post['Post']['status'], array('action' => 'view', $post['Post']['id'])); ?> 
        </td>
    	<!--<td>
    		<?php echo $this->Form->postLink('Delete',array('action' => 'delete', $post['Post']['id']),
			array('confirm' => 'Are you sure?'));?>
    		<?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?> 
     </td>-->
        <td>
            <?php echo $post['Post']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>