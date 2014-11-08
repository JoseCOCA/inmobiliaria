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
    <script type="text/javascript" src="js/imagesLoaded.pkgd.js"></script>
    <script type="text/javascript" src="js/imagesLoaded.pkgd.min.js"></script>
    <script type="text/javascript" src="js/jquery.sticky.js"></script>
    <script type="text/javascript" src="js/jquery.popupoverlay.js"></script>

    <script>
     $(document).ready(function(){
  
          jQuery('#slippry').slippry();
          
          $('#slideshow').popup({
          pagecontainer: '.page1',
          transition: 'all 0.3s'
          });

            var $container = $('#iso').imagesLoaded( function() {
              $container.isotope({
                filter: '*',
              animationOptions: {
                 duration: 750,
                 easing: 'linear',
                 queue: false,
               }
              });
            });

            $('#nav a').click(function(){
              var selector = $(this).attr('data-filter');
                $container.isotope({ 
              filter: selector,
              animationOptions: {
                 duration: 750,
                 easing: 'linear',
                 queue: false,
               
               }
              });
              return false;
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
  <a href="admin/logout">CERRAR SESIÓN</a>
  <ul id="slippry">

     <?php if ($query > 0) {?>

            <?php foreach ($query as $row) {?>
               <?php if($row -> padre == '1'){?>
                    <li>
                      <a href="<?= $row -> link ?>"><img class= "img_slide" src="<?= $row -> url ?>"alt=""></a>
                    </li>

                <?php }?>
            <?php }?>

        <?php }  ?>
  </ul> 
    <p class="contact">CONTACTO</p>

    <a href= "#slideshow" class="slideshow_open">Modificar</a>

    <div id="slideshow">
      <div id="pattern" class="pattern">
        <ul class="g">

          <?php foreach ($query as $row) {

            if ($row-> padre == '1' ) {  ?>

              <li><img src="<?= $row -> url ?>" alt="Product Name" /></li>

          <?php
                }

            } ?>
        </ul>
      </div>
      
            <?php 
            $data = array(
              'error' => '',
              'padre' => '1'
             );

              $this->load->view('upload_form', $data);
             ?>
      </div>

      <?php 
        $data = array(
          'error' => '',
          'padre' => '1'
         );

          $this->load->view('upload_form', $data);
         ?>

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
