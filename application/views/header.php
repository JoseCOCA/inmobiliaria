<!DOCTYPE html>
<html lang="en">
     <head>
     <title><?php echo $title; ?></title>
     <meta charset="utf-8">
     <meta name="format-detection" content="telephone=no" />
     <link rel="icon" href="images/favicon.ico">
     <link rel="shortcut icon" href="images/favicon.ico" />
     <link rel="stylesheet" href="css/slippry.css">
     <link rel="stylesheet" href="css/elastislide.css" />
     <link rel="stylesheet" href="css/style.css">
     <script src="js/jquery.js"></script>
     <script src="js/jquery-migrate-1.1.1.js"></script>
     <script src="js/script.js"></script>
     <script src="js/superfish.js"></script>
     <script src="js/jquery.equalheights.js"></script>
     <script src="js/jquery.easing.1.3.js"></script>
     <script src="js/slippry.js"></script>
    <script src="js/modernizr.custom.17475.js"></script>
    <script type="text/javascript" src="js/isotope.js"></script>
    <!--<script type="text/javascript" src="js/imagesloaded.pkgd.js"></script>
    <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>-->
    <script type="text/javascript" src="js/jquery.sticky.js"></script>
    <!--<script type="text/javascript" src="js/jquery.popupoverlay.js"></script>-->


    <script>
		$(document).on('ready', function(){
			$=jQuery;

			$('.iso').isotope({
				filter: '*',
				animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false,
				}
			});

			$('#slippry').slippry({
				slippryWrapper: '<div class="slippry-main sy-box" />'
			});

			var demo1 = $('.slippry-cont').slippry({
					transition: 'fade',
					useCSS: true,
					loadingClass: 'sy-loading'

			});

			/*$('#Recomendado').slippry({
				slippryWrapper: '<div class="sy-box recomendado-slider" />',
				pager: false,
				controls: false,
				adaptiveHeight: false,
			});*/

			/*$('#overlay').popup({
			pagecontainer: '.page1',
			transition: 'all 0.3s',
			scrolllock: true
			});*/





			$('#nav a').click(function(){
				var selector = $(this).attr('data-filter');
				$('.iso').isotope({
					filter: selector,
					animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false,
				}
			});
			return false;
			});

			$('.showInfo').each(function() {
				$(this).on('click', function (e){
					var getID = $(this).attr("data-cont");
					$('.visible').removeClass('.visible').addClass('oculto');
					$('#'+getID).removeClass('oculto').addClass('visible');
					demo1.reloadSlider();
					return false;

				})

				// $('#'+getID).slippry({
				// 	pager: true,
				// 	controls: true,
				// 	preload: 'visible',
				// 	transition: 'fade',
				// 	useCSS: true,

				// });

			});
		});
    function goToByScroll(id){$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');}


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
               <?php if($row -> padre == '1'){?>
                    <li>
                      <a href="#overlay" data-slippry="<?=$row -> Filtro ?>" class="overlay_open">
                      <img src="images/mascara-principal.png" class="wrap"/>
                      <img class= "img_slide" src="<?= $row -> url ?>"alt="">
                      </a>
                    </li>

                <?php }?>
            <?php }?>

        <?php }  ?>
  </ul>

    <p class="contact">CONTACTO</p>

  <div class="menu_block" >
    <nav class="horizontal-nav full-width horizontalNav-notprocessed">
      <ul class="sf-menu">
       <li><a href="<?= base_url() ?>">INICIO</a></li>
       <li><a href="<?= base_url("info") ?>">INFORMACIÓN DE EMPRESA</a></li>
       <li><a href="<?= base_url("privacy") ?>">AVISO DE PRIVACIDAD</a></li>
       <li><a href="<?= base_url("terms") ?>">TERMINOS DE USO</a></li>
     </ul>
    </nav>
    <div class="clear"></div>
  </div>
</header>

