
<!--=====================Content======================-->
<section class="content">
    <div class="grid_12 center">

      <div class="slideRec">

      </div>
	<div class="mask">

		<img style="width:80%"id="sld" src="images/mask.png" alt="banner1">
		<div class="type" >
			<p>OFICINA</p>
		</div>
		<div class="specs">
			<p>Dimensiones: 200 m2 </p>

			<p>Zona Polanco</p>

			<p>Costo: $10000000</p>
		</div>
	</div>
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
		<div class="portada overlay-cont oculto" id="<?=$row -> Filtro ?>">

			<a href="#close" class=""><img id="close" src="images/boton_close.png" alt=""></a>

				<div class="slide-cont">
					<div class="slide" id="este-<?=$row -> Filtro ?>">
						<ul class="slider-cont" data-slide="<?=$row -> Filtro ?>" id="slider">
							<li><img src="http://lorempixel.com/g/750/450" alt="" class="image_slide"></li>
							<li><img src="http://lorempixel.com/750/450" alt="" class="image_slide"></li>
							<li><img src="http://lorempixel.com/g/750/450/city" alt="" class="image_slide"></li>
						</ul>
					</div>
				</div>

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
					<p>UBICACIÓN:</p>
					<p class="styledP"style="width:83%; "><?=$row-> Ubicacion ?></p>
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

