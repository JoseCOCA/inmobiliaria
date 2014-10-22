<!DOCTYPE html>
<html lang="en">
     <head>
     <title>Home</title>
     <meta charset="utf-8">
     <meta name="format-detection" content="telephone=no" />
     <link rel="icon" href="images/favicon.ico">
     <link rel="shortcut icon" href="images/favicon.ico" />
     <link rel="stylesheet" href="assets/css/slippry.css">
     <link rel="stylesheet" href="assets/css/elastislide.css" />
     <link rel="stylesheet" href="assets/css/style.css">
     <script src="assets/js/jquery.js"></script>
     <script src="assets/js/jquery-migrate-1.1.1.js"></script>
     <script src="assets/js/script.js"></script> 
     <script src="assets/js/superfish.js"></script>
     <script src="assets/js/jquery.equalheights.js"></script>
     <script src="assets/js/jquery.easing.1.3.js"></script>
     <script src="assets/js/slippry.js"></script>
    <script src="assets/js/modernizr.custom.17475.js"></script>    
    <script type="text/javascript" src="assets/js/isotope.js"></script>

    <script>
     $(document).ready(function(){
        jQuery('#slippry').slippry();
            
            var $container = $('#iso');
            $container.isotope({
              filter: '*',
              animationOptions: {
                 duration: 750,
                 easing: 'linear',
                 queue: false,
               }
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
  <ul id="slippry">
    <li>
      <a href="#slide1"><img src="assets/images/HomeFull_1.jpg" alt="propiedades"></a>
    </li>
    <li>
      <a href="#slide1"><img src="assets/images/HomeFull_2.jpg" alt="Keeping Your Home Clean"></a>
    </li>
    <li>
      <a href="#slide1"><img src="assets/images/homeFull_4.jpg" alt="Tidy and Perfect"></a>
    </li>
    <li>
      <a href="#slide1"><img src="assets/images/homeFull_4.jpg" alt="Tidy and Perfect"></a>
    </li>
    <li>
      <a href="#slide1"><img src="assets/images/homeFull_4.jpg" alt="Tidy and Perfect"></a>
    </li>
  </ul> 
  <div class="menu_block" >
    <nav class="horizontal-nav full-width horizontalNav-notprocessed">
      <ul class="sf-menu">
       <li class="current"><a href="<?= base_url() ?>">INICIO</a></li>
       <li><a href="<?= base_url("info") ?>">INFORMACIÓN DE EMPRESA</a></li>
       <li><a href="<?= base_url("privacy") ?>">AVISO DE PRIVACIDAD</a></li>
       <li><a href="<?= base_url("terms") ?>">TERMINOS DE USO</a></li>
     </ul>
    </nav>
    <div class="clear"></div>       
  </div>
</header>  

<!--=====================Content======================-->
<section class="content">
    <div class="grid_12 center">
        <a href="#"><img src="assets/images/banner.jpg" class="ban_img" alt=""></a>
        <div class="text1">Elige la mejor opción que se adapte a tus necesidades </div>
    </div> 
    <div id="header"></div>
    <div id="nav">
      <ul>
        <li><a href="" data-filter="*">TODOS</a></li>
        <li><a href="" data-filter=".oficina">OFICINAS</a></li>
        <li><a href="" data-filter=".depa">DEPARTAMENTOS</a></li>
        <li><a href="" data-filter=".bodega">BODEGAS</a></li>
        <li><a href="" data-filter=".casa">CASAS</a></li>
      </ul>
    </div>
    
    <div id="iso">
      <div class="box_iso casa depa">
          <a href="#"><img id= "img_filter" src="assets/images/house.jpg"alt=""></a>
      </div>
      
      <div class="box_iso casa">
          <a href=""><img id= "img_filter" src="assets/images/house.jpg" alt=""></a>
      </div>
      
      <div class="box_iso oficina depa bodega">
          <a href=""><img id= "img_filter" src="assets/images/house.jpg" alt=""></a>
      </div>
      
      <div class="box_iso casa">
          <a href=""><img id= "img_filter" src="assets/images/house.jpg" alt=""></a>
      </div>
      <div class="box_iso oficina">
          <a href=""><img id= "img_filter" src="assets/images/house.jpg" alt=""></a>
      </div>
      <div class="box_iso bodega">
          <a href=""><img id= "img_filter" src="assets/images/house.jpg" alt=""></a>
      </div>
      
      <div class="box_iso bodega depa">
          <a href=""><img id= "img_filter" src="assets/images/house.jpg" alt=""></a>
      </div>
      
      <div class="box_iso casa">
          <a href=""><img id= "img_filter" src="assets/images/house.jpg" alt=""></a>
      </div>
    
    
    </div>

  <div class="container_12">
    <div class="clear"></div>
  </div>

</section>
<!--==============================Bot_block=================================-->
<!--==============================footer=================================-->
<footer> 
  <div class="container_12">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, voluptate veritatis porro, minima commodi esse. Commodi maiores repudiandae quisquam enim qui autem sed nisi odit facilis, ipsa illo magnam, praesentium!</p>
  </div>  
  <div class="clear"></div>
  <div class="sep__1"></div>
  <div class="foot_colourd"></div>
</footer>
<script type="text/javascript" src="assets/js/jquerypp.custom.js"></script>
    <script type="text/javascript" src="assets/js/jquery.elastislide.js"></script>
    <script type="text/javascript">
      
      $( '#carousel' ).elastislide( {
        minItems : 8
      } );
      jQuery(document).ready(function () {
                /*Sticky bar*/
         var stickyNavTop = $('.menu_block').offset().top;  

         var stickyNav = function(){  
            var scrollTop = $(window).scrollTop();  

            if (scrollTop > stickyNavTop) {   
               $('.menu_block').addClass('sticky');  
            } else {  
               $('.menu_block').removeClass('sticky');   
            }  
         };  

         stickyNav();  

         $(window).scroll(function() {  
            stickyNav();  
         });
      /*//Sticky bar*/       

      })


    </script>
</body>
</html>

