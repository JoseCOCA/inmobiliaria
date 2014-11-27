
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

		<div class="portada overlay-cont" id="">

			<a href="#close" id="close" class=""></a>

				<div class="slide-cont">
					<div class="slide" id="este-">
						<ul class="slider-cont" data-slide="" id="slider">
							<!-- IMÁGENES CARRUSEL PROPIEDAD -->
							<!-- <li><img src="http://lorempixel.com/g/750/450" alt="" class="image_slide"></li> -->
						</ul>
					</div>
				</div>

			<div class="text-content">
				<div class="content1">
					<p>PROPIEDAD: </p><p id="tipo-propiedad"><!-- TIPO --></p>
					<p>CONDICIÓN: </p><p id="condicion-propiedad"><!-- CONDICION --></p>
					<hr>
				</div>

				<div class="content2">
					<p>STATUS: </p><P id="status-prop"><!-- STATUS --></P>

					<div class="checkbox-1">

						<input type="checkbox" name="reservacion" id="reservación-">
						<label for="reservación-"></label>

					</div>

					<p id= "check-text">RECIBIR NOTIFICACIÓN DE DISPONIBILIDAD</p>
					<hr>
				</div>

				<div id="contenido-descripcion">
					<div id="descripcion">
						<div class="ubic">
							<p>UBICACIÓN:</p>
							<p id="ubicacion-propiedad" class="styledP"style="width:83%; "><!-- UBICACIÓN --></p>
						</div>

						<div class="contentDesc">

							<p>DESCRIPCIÓN</p>

							<p class="styledP" id= "desc"><!-- DESCRIPCIÓN --></p>

							<p>CONDICIONES DE CONTRATACIÓN</p>

						</div>

						<div class= "styledP" id="mt">
							<p id="condiciones-propiedad-compra"><!-- CONDICIONES --></p>
						</div>

						<hr>
					</div>
					<div id="notificationForm">
						<div class="formcontent">

							<?php

								echo form_open('');

								$data1 = array(
								'name' => 'nombre',
								'id'  =>  'nombre'
								);
								echo form_label('Nombre'.':', $data1['name']);
								echo form_input($data1);

								$data2 = array(
								'name' => 'telefono',
								'id'  =>  'telefono'
								);
								echo form_label('Teléfono'.':', $data2['name']);
								echo form_input($data2);
								$data3 = array(
								'name' => 'celular',
								'id'  =>  'celular'
								);
								echo form_label('Celular'.':', $data3['name']);
								echo form_input($data3);

								$data4 = array(
								'name' => 'correo',
								'id'  =>  'correo'
								);
								echo form_label('Correo'.':', $data4['name']);
								echo form_input($data4);

								$data5 = array(
								'name' => 'empresa',
								'id'  =>  'empresa'
								);
								echo form_label('Empresa'.':', $data5['name']);
								echo form_input($data5);
								echo '<br />';
								$data6 = array(
								'name' => 'comentarios',
								'id'  =>  'comentarios'
								);

								echo form_label('Comentarios'.':', $data6['name']);
								echo form_textarea('Comentarios');?>

								<hr/>
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
	<?php ?>

	</div>


  <div class="container_12">
    <div class="clear"></div>
  </div>

</section>

