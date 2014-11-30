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
    <script>
		var contact = 'BIENES RAICES / +52 (55) 90 00 30 00';
		var base_url = '<?php echo base_url()?>';
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


 <ul id="slippry">

     <?php if ($query > 0) {?>

            <?php foreach ($query as $row) {?>
               <?php if($row -> principal == '1'){?>
				<li>
					<a href="#overlay" data-slippry="<?=$row -> Filtro ?>" data-cont="<?=$row -> Filtro ?>" class="showInfo">
						<img src="images/mascara-principal.png" class="wrap"/>
						<img class= "img_slide" src="<?= $row -> url ?>"alt="">
					</a>
				</li>

                <?php }?>
            <?php }?>

        <?php }  ?>
  </ul>



  <div class="menu_block" >
    <nav class="horizontal-nav full-width horizontalNav-notprocessed">
      <ul class="sf-menu">
       <li><a href="<?= base_url() ?>">INICIO</a></li>
       <li class="menu-separator">|</li>
       <li><a href="<?= base_url("info") ?>">INFORMACIÓN DE EMPRESA</a></li>
       <li class="menu-separator">|</li>
       <li><a href="<?= base_url("privacy") ?>">AVISO DE PRIVACIDAD</a></li>
       <li class="menu-separator">|</li>
       <li><a href="<?= base_url("terms") ?>">TERMINOS DE USO</a></li>
     </ul>
    </nav>
    <div class="clear"></div>
  </div>
</header>

	<div class="slideRec">

	</div>
	<div id="banner-recomendados" class="mask">
		<div class="tipo-recomendados ">
		<?php if($query > 0) {?>
			<?php foreach ($query1 as $row ) {
				?>
		<div class="tr oculto" id="<?= $row->Filtro?>"><span><?= $row -> Tipo ?></span></div>
			<?php } ?>
		<?php } ?>
		</div>
		<div class="specs-recomendados  ">
		<?php if($query > 0) {?>
			<?php foreach ($query1 as $row ) {?>
			<div class="specs oculto" id= "<?= $row->Filtro?>">
				<span>Dimenciones <?= $row -> Dimension ?></span>
				<span>Zona <?= $row -> Delegacion?></span>
				<span>Costo: $<?= $row -> Precio?></span>
			</div>

			<?php } ?>
		<?php } ?>
		</div>
		<div class="slide-recomendados">
			<ul class="slider-recomedados">
			<?php if ($query > 0) {?>

            <?php foreach ($query as $row) {?>
				<?php if($row -> recomendado == '1'){?>
				<li>
					<a href="#overlay" data-slippry="<?=$row -> Filtro ?>" data-cont="<?=$row -> Filtro ?>" class="showInfo">
						<img  class="imgRec" id="<?= $row -> Filtro ?>" src="<?= $row -> url ?>"alt="">
					</a>
				</li>
					<?php }?>
            <?php }?>
        <?php }  ?>
			</ul>

		<div class="mask-recomendado"><h2>CLICK + INFO</h2></div>
		</div>
	</div>

