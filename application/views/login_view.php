<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="assets/css/style-login.css">
	<style type="text/css">
	</style>
</head>
<body>
	<div id= "container_login">
		<div class="logo">
			<img src="assets/images/logo_inmobiliaria_b.png" alt="Logo">			
		</div>
		<div id="form-login">
			<h1>LOG IN</h1>
				<?php echo form_open('adminlogin');?>
				
					<?php 
						$email = array(
			              'name'        => 'email_address',
			              'type'		=> 'email',
			              'id'          => 'email_address',
			              'maxlength'   => '100',
			              'size'        => '50',
			              'required'	=> 'required'
			            );
						echo form_label('E-MAIL', 'email_address'); 
						echo '<br />';
						echo form_input($email);
					?>
					<br>
					<br>
					<?php 
						$pass = array(
			              'name'        => 'password',
			              'type'		=> 'password',
			              'id'          => 'password',
			              'maxlength'   => '100',
			              'size'        => '50',
			              'required'	=> 'required'
			            );
						echo form_label('PASSWORD', 'password'); 
						echo '<br />';
						echo form_password($pass);
					?>
					<br>
					<br>
					<br>
				<?php echo form_submit('submit', 'ENTRAR'); ?>
				<?php echo form_close(); ?>

			<div class="errors">
				<?php echo validation_errors(); ?>
			</div>
		</div>
					
	</div>
</body>
</html>