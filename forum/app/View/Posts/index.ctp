<h2>Post </h2>
<p id="addLink"><?php echo $this->Html->link('Add Post', array('controller'=>'posts','action' => 'add')); ?></p>
<table>
    <tr>
        <th>Poster</th>
        <th>Question</th>
        <th>Created</th>
    </tr>
    <!-- Here’s where we loop through our $posts array, printing out post info -->
   
    <?php foreach ($posts as $post): ?>
   
    <tr bgcolor="#C4BDBD">
    	<td width="15%">
    		<?php 
    			$name=ucfirst($post['User']['lastname'])." ".ucfirst($post['User']['firstname']);
    			echo $name;
    			//$name = $this->User->findById($id);
				//debug($name);
    			//echo $this->Html->link($post['Post']['user_id'],array('action'=>'index',$post['Post']['user_id'])); 
				//echo $name['User']['lastname'];
 			?>
    	</td>
    	
    	<td width="65%">
    		<?php echo $this->Html->link($post['Post']['status'], array('action' => 'view', $post['Post']['id'])); ?> 
        </td>
    	<!--<td>
    		<?php echo $this->Form->postLink('Delete',array('action' => 'delete', $post['Post']['id']),
			array('confirm' => 'Are you sure?'));?>
    		<?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?> 
     </td>-->
        <td width="20%">
            <?php echo $post['Post']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>