<h2>Login</h2>
<?php 
	echo $this->Form->create();
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	echo $this->Form->end('Login');
	//echo $this->Form->end('Register');
	echo $this->Html->link('Register', '/users/add');

?>