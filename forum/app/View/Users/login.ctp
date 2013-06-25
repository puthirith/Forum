<h2>Login</h2>
<div>
<?php 
	echo $this->Form->create();
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	
	//echo $this->Form->end('Register');
	
?>
<div style="margin-top:-20px;float:left;">
	<?php 
		echo $this->Form->end('Login');
	?>
</div>
<div style="margin-top:-20px;float:left;">
	<br/><br/>
	<?php 
		echo $this->Html->link('Register', '/users/add');
	?>
</div>
</div>
