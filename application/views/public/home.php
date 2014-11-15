
<!--=====================Content======================-->
<section class="content">
    <div class="grid_12 center">
      <div class="mask">
          <div class="type" >
          <p>OFICINA</p>
          </div>
          <div class="specs">
            <p>Dimensiones: 200 m2 </p> 
            
            <p>Zona Polanco</p>

            <p>Costo: $10000000</p>
          </div>
          <div class="slideRec">

            <img id="sld" src="images/imageSlide.png" alt="banner1">

          </div>

      </div>
        <!-- <a href="#"><img src="images/mask.png" class="ban_img" alt=""></a> -->

        <div class="text1">Elige la mejor opción que se adapte a tus necesidades </div>
    </div> 
    <?php $this->load->view('menu');?>    
    
    <div id="iso">
        <?php if ($query1 > 0) {?>

            <?php foreach ($query1 as $row) {?>

                    <div class="box_iso <?=$row->Tipo?>">
                        <a href="#overlay" id="<?=$row -> Filtro ?>" class= "overlay_open showInfo"><img id= "img_filter" src="<?= $row -> url ?>"alt=""></a>
                    </div>

            <?php }?>

        <?php }  ?>


    </div>

        <div id="overlay">

          <?php foreach ($query1 as $row) { ?>
            <div class="portada <?=$row -> Filtro ?> oculto">

              <a href="#" class="overlay_close" onclick="getID()"><img id="close" src="images/boton_close.png" alt=""></a>
                        
                        <ul id= "<?=$row -> Filtro ?>">
                          <li><img src="images/banner_sld.jpg" alt="" class="image_slide"></li>
                          <li><img src="images/banner_sld.jpg" alt="" class="image_slide"></li>
                          <li><img src="images/banner_sld.jpg" alt="" class="image_slide"></li>
                        </ul>
                        <div class="text-content">
                          <div class="content1">
                            <p>PROPIEDAD: <?=$row-> Tipo?></p>
                            <p>CONDICIÓN: <?=$row-> Tipo?></p>
                            <hr>          
                          </div>

                          <div class="content2">
                            <p>STATUS: NO DISPONIBLE</p>
                            
                            <div class="checkbox-1">

                              <input type="checkbox" name="reservacion" id="reservación">
                              <label for="reservación"></label> 

                            </div>
                            <p id= "check-text">RECIBIR NOTIFICACIÓN DE DISPONIBILIDAD</p>
                            <hr>          
                          </div>

                          <div class="ubic">
                           <p>UBICACIÓN:</p><p class="styledP"style="width:83%; "><?=$row-> Ubicacion ?></p>
                          </div>
                          
                          <div class="contentDesc">
                    
                          <p>DESCRIPCIÓN</p>
                    
                          <p class="styledP" id= "desc"><?=$row-> Descripcion ?></p>
                    
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

