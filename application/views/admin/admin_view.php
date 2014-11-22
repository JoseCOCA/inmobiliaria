
<!--=====================Content======================-->
<section class="content">
    <div class="grid_12 center">


        <!-- <a href="#"><img src="images/mask.png" class="ban_img" alt=""></a> -->

        <div class="text1">Elige la mejor opción que se adapte a tus necesidades </div>
    </div>

    <div id="isotope-cont">
      <?php $this->load->view('menu');?>

      <div class="iso">
          <?php if ($query1 > 0) {?>

              <?php foreach ($query1 as $row) {?>

                      <div class="box_iso <?=$row->Tipo?>">
                          <a href="#overlay" data-cont="<?=$row -> Filtro ?>" class= "showInfo"><img id= "img_filter" src="<?= $row -> url ?>"alt=""></a>
                      </div>

              <?php }?>

          <?php }  ?>
      </div>
    </div>

  <div id="overlay">
  <a href="#" class=""><div id="overlay-back"></div></a>

  <?php $i=0; foreach ($query1 as $row) { ?>
    <?php $FiltroPadre  = $row -> Filtro;
          $Tipo         = $row -> Tipo;
          $Status       = $row -> Status;
          $CalleNum     = $row -> CalleNo;
          $Colonia      = $row -> Colonia;
          $Delegacion   = $row -> Delegacion;
          $CP           = $row -> CP;
          $Descripcion  = $row -> Descripcion;
          $Condicion    = $row -> Condicion;


     ?>
    <div class="portada overlay-cont oculto" id="<?=$FiltroPadre; ?>">

      <a href="#close" class=""><img id="close" src="images/boton_close.png" alt=""></a>

        <div class="slide-cont">
          <div class="slide" id="este-<?=$FiltroPadre; ?>">
            <ul class="slider-cont" data-slide="<?=$FiltroPadre; ?>" id="slider">
                <?php foreach ($query as $row) {
                  $FiltroSlider = $row-> Filtro;
                  if($FiltroPadre == $FiltroSlider){
                  ?>
                    <li><img src="<?= $row->url ?>" alt="" class="image_slide"></li>                
                <?php }
                } ?>
            </ul>
          </div>
        </div>

      <div class="text-content">
        <div class="content1">
          <p>PROPIEDAD: <?=$Tipo?></p>
          <p>CONDICION: <?=$Condicion?></p>
          <hr>
        </div>

        <div class="content2">
          <p>STATUS: <?=$Status?></p>

          <div class="checkbox-1">

            <input type="checkbox" name="reservacion" id="reservación">
            <label for="reservación"></label>

          </div>

          <p id= "check-text">RECIBIR NOTIFICACIÓN DE DISPONIBILIDAD</p>
          <hr>
        </div>

        <div class="ubic">
          <p>UBICACIÓN:</p>
          <p class="styledP"style="width:83%; "><?= $CalleNum.','.$Colonia.','.$Delegacion ?></p>
        </div>

        <div class="contentDesc">

          <p>DESCRIPCIÓN</p>

          <p class="styledP" id= "desc"><?= $Descripcion; ?></p>

          <p>CONDICIONES DE CONTRATACIÓN</p>

        </div>

        <div class= "styledP" id="mt">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ratione autem quas sunt necessitatibus nam recusandae voluptates rerum veniam dolore at, id quisquam dolorum facere eius ipsam, saepe delectus iure.</p>
          <ul style="margin-top: 20px;" >
            <li>CONDICION 1</li>
            <li>CONDICION 2</li>
            <li>Condicion 3</li>
          </ul>
        </div>

        <hr>


      </div>
    </div>

  <?php  } ?>

  </div>


  <div class="container_12">
    <div class="clear"></div>
  </div>
</section>



