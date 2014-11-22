
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
		<div class="portada overlay-cont oculto" id="<?=$row -> Filtro ?>">

			<a href="#close" class=""><img id="close" src="images/boton_close.png" alt=""></a>

				<div class="slide-cont">
					<div class="slide" id="este-<?=$row -> Filtro ?>">
						<ul class="slider-cont" data-slide="<?=$row -> Filtro ?>" id="slider">
							<li><img src="http://lorempixel.com/g/750/450" alt="" class="image_slide"></li>
							<li><img src="http://lorempixel.com/750/450" alt="" class="image_slide"></li>
							<li><img src="http://lorempixel.com/g/750/450/city" alt="" class="image_slide"></li>
							<li><img src="http://lorempixel.com/g/750/450" alt="" class="image_slide"></li>
							<li><img src="http://lorempixel.com/750/450" alt="" class="image_slide"></li>
							<li><img src="http://lorempixel.com/g/750/450/city" alt="" class="image_slide"></li>
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

				<div id="contenido-descripcion">
					<div id="descripcion">
						<div class="ubic">
							<p>UBICACIÓN:</p>
							<p class="styledP"style="width:83%; "><?=$row-> CalleNo ?></p>
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
					<div class="notificationForm">
						<div class="formcontent">

							<?php

								echo form_open('admin/getContactData');

								$data1 = array(
								'name' => 'Nombre'.$i,
								'id'  =>  'Nombre'
								);
								echo form_label($data1['name'].':', $data1['name']);
								echo form_input($data1);

								$data2 = array(
								'name' => 'Telefono',
								'id'  =>  'Telefono'
								);
								echo form_label($data2['name'].':', $data2['name']);
								echo form_input($data2);
								$data3 = array(
								'name' => 'Celular',
								'id'  =>  'Celular'
								);
								echo form_label($data3['name'].':', $data3['name']);
								echo form_input($data3);

								$data4 = array(
								'name' => 'Correo',
								'id'  =>  'Correo'
								);
								echo form_label($data4['name'].':', $data4['name']);
								echo form_input($data4);

								$data5 = array(
								'name' => 'Empresa',
								'id'  =>  'Empresa'
								);
								echo form_label($data5['name'].':', $data5['name']);
								echo form_input($data5);

								$data6 = array(
								'name' => 'Comentarios',
								'id'  =>  'Comentarios'
								);

								echo form_label($data6['name'].':', $data6['name']);
								echo form_textarea('Comentarios');?>

							<div class= "subButton">
								<?php
									echo form_submit('submit', 'Enviar');
								?>
							</div>

								<?php
									form_close();
								?>

						</div>
					</div>
				</div>


			</div>
		</div>
	<?php $i++; } ?>

	</div>


  <div class="container_12">
    <div class="clear"></div>
  </div>

</section>

