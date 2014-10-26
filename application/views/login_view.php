<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<style>
	
	label{ display: block;}
	
	</style>
</head>
<body>
	<h1>
		Login
	</h1>
	<?php echo form_open('adminlogin');?>
	<p>
		<?php echo form_label('Email Address:', 'email_addres'); 
			  echo form_input('email_address', set_value('email_address'), 'id="email_address"');
		?>
	</p>
	<p>
		<?php echo form_label('Password:', 'password'); 
			  echo form_password('password', '', 'id="password"');
		?>
	</p>
	<p>
		<?php echo form_submit('submit', 'Login'); ?>
	</p>
	<?php echo form_close(); ?>
	<div class="errors">
		<?php echo validation_errors(); ?>
	</div>
</body>
</html>