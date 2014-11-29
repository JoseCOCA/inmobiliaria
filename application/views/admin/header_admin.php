<!DOCTYPE html>
<html lang="es">
	<head>
		<title><?= $title; ?></title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet"> 
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/summernote.css" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/style_admin.css">
		<link rel="stylesheet" href="css/jquery.sidr.dark.css">
		<link rel="stylesheet" href="css/style_mini_upload.css" />
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.1.1.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script> 
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
<script>var base_url = '<?php echo base_url()?>';</script>
<body class="page1" id="top">
<!--==============================header=================================-->
	<header>


		<nav>
			<div class="botn" id="home">
			<a href="#">INICIO</a>
			</div>
			<div class="botn" id="edit">
			<a id="admin-menu" href="#sidr">EDITAR PROPIEDADES</a>  <!-- agregando el menu sidr -->
			</div>
			<div class="botn" id="bannersEdit">
			<a id="admin-banners" href="#">EDITAR BANNERS</a> 
			</div>
			<div class="botn" id="logOut">
			<a href="<?= base_url('admin/logout') ?>">CERRAR SESION</a>
			</div>
		</nav>


	</header>
