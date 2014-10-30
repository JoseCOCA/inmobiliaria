<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<!-- <link rel="stylesheet" href="assets/css/style.css"> -->
	<style type="text/css">
		*{
			margin: 0px;
			padding:0px;
		}
		form{
			margin: 0 auto;
			width: 200px;
		}
		body{
			text-align: center;
		}
		#container_login{
			margin: 10%;
		}
		.logo{
			
		}
	</style>
</head>
<body>
	<div id= "container_login">
		<div class="logo">
			<img src="assets/images/logo_inmobiliaria.png" alt="Logo">			
		</div>
			<h1>Login</h1>
				<?php echo form_open('adminlogin');?>
				
				<?php echo form_label('E-MAIL', 'email_addres'); 
					 echo form_input('email_address', set_value('email_address'), 'id="email_address"');
					?>
				<?php echo form_label('PASSWORD', 'password'); 
					echo form_password('password', '', 'id="password"');?>
				<?php echo form_submit('submit', 'LOGIN'); ?>
				<?php echo form_close(); ?>

			<div class="errors">
				<?php echo validation_errors(); ?>
			</div>
					
	</div>
</body>
</html>