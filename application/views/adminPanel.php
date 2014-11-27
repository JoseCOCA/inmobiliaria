<!-- 

<?php /*Panel de administración para la inmobiliaria:
En este se muestra un formulario para la modificación de la información en las
descripciones de las propiedades existentes, se tiene la posibilidad de borrar
o crear nuevas propiedades*/ ?>--> 


<!-- SIDR -->
<div id="sidr">
    <h1>Elige una propiedad</h1>
    
    <?php if ($query1 > 0) { ?>
        <ul id="lista-propiedades">
        <?php foreach ($query1 as $row) { ?>

            
                <li>
                    <a href="#sidr" id="<?=$row-> Filtro?>" class="configFilter showInfo" data-cont="<?=$row -> Filtro ?>">
                    <img src="<?= $row -> url ?>" />
                    <p><?=$row-> nombre?></p>
                    </a>
                </li>
           

        <?php } ?>
        </ul>
    <?php } ?>


    <?php

    

    $Filtro = 'F'.($lastFilter+1);

    ?>

    <h1 class="add-propiety">Agregar nueva propiedad</h1>
    
    <form id="nuevaPropiedad" action="<?=base_url()?>php/upload_images.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div id="image_preview" title="Arrastra aquí la imagen"><img id="previewing" /></div>
        <div id="selectImage">
            <label for="file-upl">Seleciona imagen para propiedad</label><br/>
            <input type="file" name="file-upl" id="file-upl" required="required" accept="image/*" />
            <button class='input-btn' id='input_btn'>Buscar archivo...</button>
            <input type="text" class="nombre" id="propiedad-nombre" name="propiedad-nombre" value="<?=$Filtro?>" />
            <input type="hidden" class="nuevo-filtro" id="nuevo-filtro" name="nuevo-filtro" value="<?=$Filtro?>" />
            <input type="hidden" class="propiedad" id="propiedad-nueva" name="propiedad" value="nueva">
        </div>
    </form>
   <!--  <h4 id='loading' >loading..</h4>
    <div id="message"></div>
 -->


</div>
<!-- //SIDR -->


<div id="main">
    <div id="welcome">
        
        <h1>Bienvenido al administrador</h1>
        
        
        <h4>Selecciona una sección para editar:</h4>
        <div class="styled-select blue semi-square">

            <select id="seccion" name="seccion">
                <option value="" disabled="disabled" selected="selected">Selecciona</option>
                <option value="1" >Inicio</option>
                <option value="2">Informacion de empresa</option>
                <option value="3">Aviso de privacidad</option>
                <option value="4">Terminos de uso</option>
            </select>
        </div>
        <br>
        <div class="no-float col-md-2 col-xs-1 col-sm-1 col-lg-3"></div><div id="contenidos-principales" class="no-float col-md-8 col-xs-10 col-sm-10 col-lg-6"></div><div class="no-float col-md-2 col-xs-1 col-sm-1 col-lg-3"></div>
    </div>
    <div class="config_container oculto">
        
		<!-- CARRUSEL -->
		<ul class="carrusel">

		</ul>
        <!-- UPLOAD IMÁGENES -->
        <h3>Agrega nuevas imágenes a esta propiedad</h3>
        <form id="upload" method="post" action="<?=base_url()?>php/upload_images.php" enctype="multipart/form-data">
            <div id="drop">
                Arrastra tus archivos aquí

                <a>Buscar</a>
                <input type="file" name="upl" multiple />
            </div>

            <ul>
                <!-- The file uploads will be shown here -->
            </ul>
            <input type="hidden" id="filtro-hd" name="Filtro" />
            <input type="hidden" id="add-hd" value="Agregar imagenes" name="adminPanel" />

        </form>
        
        <!-- CONTENIDOS EDITABLES -->
        <h3>Edita la información de esta propiedad</h3>
        <div class="box-editable">
            <h4>Descripcion</h4>
            <div contenteditable="true" class="div-editable" id="descripcion"><!-- CONTENIDO --></div>
        </div>
        <div class="box-editable">
            <h4>Condiciones</h4>
            <div contenteditable="true" class="div-editable" id="condiciones"><!-- CONTENIDO --></div>
        </div>
        <div class="box-editable">
            <h4>CalleNo</h4>
            <div contenteditable="true" class="div-editable" id="calleNo"><!-- CONTENIDO --></div>
        </div>
        <div class="box-editable">
            <h4>Colonia</h4>
            <div contenteditable="true" class="div-editable" id="colonia"><!-- CONTENIDO --></div>
        </div>
        <div class="box-editable">
            <h4>Delegación</h4>
            <div contenteditable="true" class="div-editable" id="delegacion"><!-- CONTENIDO --></div>
        </div>

        <div class="box-editable">
            <h4>CP</h4>
            <div contenteditable="true" class="div-editable" id="cp"><!-- CONTENIDO --></div>
        </div>
        <div class="box-editable">
            <h4>Dimensión</h4>
            <div contenteditable="true" class="div-editable" id="dimension"><!-- CONTENIDO --></div>
        </div>
        <div class="box-editable">
            <h4>Precio</h4>
            <div contenteditable="true" class="div-editable" id="precio"><!-- CONTENIDO --></div>
        </div>
        
        <div class="styled-select blue semi-square">

            <select id="tipo" name="tipo">
                <option value="Casa">Casa</option>
                <option value="Bodega" selected="selected">Bodega</option>
                <option value="Departamento">Departamento</option>
                <option value="Oficina">Oficina</option>
            </select>
        </div>
        <div class="styled-select blue semi-square">

            <select id="status" name="status">
                <option value="venta">Venta</option>
                <option value="renta" selected="selected">Renta</option>
                <option value="NO DISPONIBLE">No disponible</option>
            </select>
        </div>
        <br>
         <!-- Textos completos   ID  url     nombre  Descripcion     Tipo    Condicion   Condiciones     Filtro  CalleNo     Colonia     Delegacion  CP  Dimension Precio -->

    </div>

</div>

