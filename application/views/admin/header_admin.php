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
           jQuery('#slider').slippry({
          pager: false,
          controls: true,
          });
          $('#slideshow').popup({
          pagecontainer: '.page1',
          transition: 'all 0.3s',
          scrolllock: true
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

  <a href= "#slideshow" class="slideshow_open">Modificar</a>

  <ul id="slippry">

     <?php if ($query > 0) {?>

            <?php foreach ($query as $row) {?>
               <?php if($row -> padre == '1'){?>
                    <li><img src="images/mascara-principal.png" class="wrap"/>
                      <a href=""><img class= "img_slide" src="<?= $row -> url ?>"alt=""></a>
                    </li>

                <?php }?>
            <?php }?>

        <?php }  ?>
  </ul> 
    <p class="contact">CONTACTO</p>


    <div id="slideshow">

      <div class="filter_container">

          <?php foreach ($query1 as $row) {?>

             <a href="#"><img src="<?= $row -> url ?>" alt="Product Name" /></a>

             <?php } ?>

            
      </div>

      <div class="config_container">
          
          <div class="adminInput">
      
          <a href="#" class="overlay_close"><img id="close" src="images/button_close.png" alt=""></a>
      
        <ul id="slider">
          <li><img src="images/banner_sld.jpg" alt="" class="image_slide"></li>
          <li><img src="images/banner_sld.jpg" alt="" class="image_slide"></li>
          <li><img src="images/banner_sld.jpg" alt="" class="image_slide"></li>
        </ul>

         <?php echo form_open('admin/getData'); ?>
        <div class="text-content">
          <div class="content1">
              
            <div class="checkbox-1AD">

              <input type="checkbox" name="principal" id="principal">
              <label for="principal"></label> 

            </div>
            
            <p id= "check-text">BANNER PRINCIPAL</p>
            
            <select name="inmueble" id="inmueble" >
              <option selected="selected" value="">Seleccione el tipo de inmueble</option>
              <option value="">BODEGA</option>
              <option value="">CASA</option>
              <option value="">DEPARTAMENTO</option>
              <option value="">OFICINA</option>
            </select>
            
            <button>Seleccionar imagenes</button>

            <div class="checkbox-2AD">

              <input type="checkbox" name="recomendado" id="recomendado">
              <label for="recomendado"></label> 

            </div>
            <p id= "check-text" style="margin-right:15%;">RECOMENDADO</p>
            <select name="Status" id="">
              <option value="">STATUS</option>
              <option value="">VENTA</option>
              <option value="">RENTA</option>
              <option value="">NO DISPONIBLE</option>
            </select>
            <hr>          
          </div>

          <div class="AdminHeaders">
           <p>UBICACIÓN</p>

          </div>
          
          <p style="padding-top:30px;">Calle y Número:</p>
          <input type="text" class="ubiEdit" id="calleNum" name="CalleNumero">
          <p>Colonia:</p>
          <input type="text" class="ubiEdit" id="colonia" name="Colonia">
          <p>Delegación:</p>
          <input type="text" class="ubiEdit" id="delegacion" name="Delegacion">
          <p>Codigo Postal:</p>
          <input type="text" class="ubiEdit" id="CP" name="CodigoPostal">
          
          <div class="contentDesc">
          
          <div class="AdminHeaders">
           <p>DESCRIPCIÓN</p>
          </div>
          
            <textarea id="descripción" name="descripcion" style= "text-aign: justify;"class="ubiEdit" rows="4" cols="50" style="margin-top:30px;" placeholder="Porporcione una descripción detallada"></textarea>          

          <div class="AdminHeaders">
            <p>CONDICIONES DE CONTRATACIÓN</p>
          </div>   
            
            <textarea id="condiciones" name="condiciones" class="ubiEdit" rows="4" cols="50" style="margin-top:30px;" placeholder="Proporcione las condiciones de contratación de considere nesecarias."></textarea> 
         

          </div>

        <hr> 


        

          </div>
            <?php echo form_close(); ?>
      
        </div>
      </div>
    </div>


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
