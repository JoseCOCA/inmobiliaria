		<!DOCTYPE html>
		<html lang="es">
				<head>
				<title><?= $title; ?></title>
				<meta charset="utf-8">
				<meta name="format-detection" content="telephone=no" />
				<link rel="icon" href="images/favicon.ico">
				<link rel="shortcut icon" href="images/favicon.ico" />
				<link rel="stylesheet" href="css/slippry.css">
				<link rel="stylesheet" href="css/elastislide.css" />
				<link rel="stylesheet" href="css/style.css">
				<link type="text/css" rel="stylesheet" href="css/rhinoslider-1.05.css" />
				<script src="js/jquery.js"></script>
				<script src="js/jquery-migrate-1.1.1.js"></script>
				<!-- // <script type="text/javascript" src="js/jquery.popupoverlay.js"></script> -->
				<script>
						var contact = 'BIENES RAICES / +52 (55) 90 00 30 00'

				</script>


				<!--[if lt IE 8]>
					 <div style=' clear: both; text-align:center; position: relative;'>
						 <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
							 <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
						 </a>
					</div>
				<![endif]-->
				<!--[if lt IE 9]>
					<script src="js/html5shiv.js"></script>
					<link rel="stylesheet" media="screen" href="css/ie.css">


				<![endif]-->
				 </head>

		<body class="page1" id="top">
		<!--==============================header=================================-->
		<header>



			<div class="clear"></div>
		<a href="<?= base_url('admin/logout') ?>">CERRAR SESION</a>

		<?php  $this->load->view('adminPanel'); ?>

		 


		</header>
