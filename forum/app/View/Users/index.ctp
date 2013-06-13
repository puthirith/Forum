<h2>View Users details</h2>
<table>
	<tr>
    	<th>First name</th>
        <th>Last name</th>
    </tr>

	<?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['User']['firstname']; ?></td>
            <td><?php echo $user['User']['lastname']; ?></td>
        </tr>
    <?php endforeach ?>
    
</table>
