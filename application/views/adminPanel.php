<!--

<?php /*Panel de administración para la inmobiliaria:
En este se muestra un formulario para la modificación de la información en las
descripciones de las propiedades existentes, se tiene la posibilidad de borrar
o crear nuevas propiedades*/ ?>-->


<!-- SIDR -->
<div id="sidr">
    <h1>Elige una propiedad</h1>

        <ul id="lista-propiedades">
    <?php if ($query1 > 0) { ?>
        <?php foreach ($query1 as $row) { ?>


                <li>
                    <a href="#sidr" id="<?=$row-> Filtro?>" class="configFilter showInfo" data-cont="<?=$row -> Filtro ?>">
                    <img src="<?= $row -> url ?>" />
                    <p><?=$row-> nombre?></p>
                    </a>
                </li>


        <?php } ?>
    <?php } ?>
        </ul>


    <?php



    $Filtro = 'F'.($lastFilter+1);

    ?>

    <h1 class="add-propiety">Agregar nueva propiedad</h1>

    <form class="oculto" id="nuevaPropiedad" action="<?=base_url()?>php/upload_images.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div id="image_preview" title="Arrastra aquí la imagen"><img id="previewing" /></div>
        <div id="selectImage">
            <label for="file-upl">Seleciona imagen para propiedad</label><br/>
            <input type="file" name="file-upl" id="file-upl" required="required" accept="image/*" />
            <button class='input-btn input_btn_file' id='input_btn'>Buscar archivo...</button>
            <input type="text" class="nombre" id="propiedad-nombre" name="propiedad-nombre" value="<?=$Filtro?>" />
            <input type="hidden" class="nuevo-filtro" id="nuevo-filtro" name="nuevo-filtro" value="<?=$Filtro?>" />
            <input type="hidden" class="propiedad" id="propiedad-nueva" name="propiedad" value="nueva">
        </div>
    </form>


</div>
<!-- //SIDR -->


<div id="main">

    <div id="welcome">

        <h1>Bienvenido al administrador</h1>


        <h4>Selecciona una sección para editar su contenido:</h4>
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

        <!-- EDICIÓN DE PROPIEDAD -->

        <h3>Edita la información de esta propiedad</h3>

		<!-- CARRUSEL -->
		<ul class="carrusel">

		</ul>
        <!-- UPLOAD IMÁGENES -->
        <h4>Agrega nuevas imágenes al carrusel</h4>
        <form id="upload" method="post" action="<?=base_url()?>php/upload_images.php" enctype="multipart/form-data">
            <div id="drop">
                Arrastra tus archivos aquí

                <a>Buscar</a>
                <input type="file" name="upl" multiple  accept="image/*" />
            </div>

            <ul>
                <!-- The file uploads will be shown here -->
            </ul>
            <input type="hidden" id="filtro-hd" name="Filtro" />
            <input type="hidden" name="carrusel" value="carrusel" />
            <input type="hidden" id="add-hd" value="Agregar imagenes" name="adminPanel" />

        </form>

        <!-- CONTENIDOS EDITABLES -->
        
        <!-- CAMBIA IMAGEN PRINCIPAL DE PROPIEDAD -->
        <h4>Cambia la imagen principal</h4>

        <form id="mod-Prop" action="<?=base_url()?>php/upload_images.php">
            <div id= "mod-drop">
            <p>
                Arrastra nueva imagen aquí
            </p>
                
                <img src="" id="mod-img">
            </div>
            <div id="modImage">
                <input type="file" name="file-upl" id="file-mod" required="required" accept="image/*" />
                <button class='input_btn_file' id='mod-search'>Buscar imagen</button>     
            </div>

                <input type="hidden" id="filtro-mod" name="nuevo-filtro" >
                <input type="hidden" class="propiedad" id="propiedad-nueva" name="propiedad" value="nueva">
                <input type="hidden" class="nombre" id="filtro_mod_nombre" name="propiedad-nombre" />


           

        </form>

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
        <br>

        <div class="styled-select blue semi-square">

            <select id="tipo" name="tipo">
                <option value="Casa">Casa</option>
                <option value="Bodega" selected="selected">Bodega</option>
                <option value="Departamento">Departamento</option>
                <option value="Oficina">Oficina</option>
            </select>
        </div>
        <div class="styled-select blue semi-square">

            <select id="condicion" name="condicion">
                <option value="venta">Venta</option>
                <option value="renta" selected="selected">Renta</option>
                <option value="NO DISPONIBLE">No disponible</option>
            </select>
        </div>
        <div class="styled-select blue semi-square">

            <select id="status" name="status">
                <option value="Disponible">Disponible</option>
                <option value="No disponible" selected="selected">No disponible</option>
            </select>
        </div>        
        <br>
         <!-- Textos completos   ID  url     nombre  Descripcion     Tipo    Condicion   Condiciones     Filtro  CalleNo     Colonia     Delegacion  CP  Dimension Precio -->

    </div>

    <div id="panelBanner" class="oculto">

       <div id="banner-principal">

           <div id="contenido-banner-principal" class="no-float col-md-7 col-xs-10 col-sm-8 col-lg-6">
            	<h3>BANNER PRINCIPAL</h3>
                <ul> <!-- BANNER PRINCIPAL --> </ul>
                <form id="newMainBanner" action="<?=base_url()?>php/upload_images.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div id="image_preview_main_ban" title="Arrastra aquí la imagen"><img id="previewing_main_ban" /></div>
                    <div id="selectImage">
                        <label for="file-upl">Seleciona imagen </label><br/>
                        <input type="file" name="upl" id="file-upl" required="required" accept="image/*" />
                        <button class='input-btn input_btn_file' id='input_btn'>Buscar archivo...</button>
                        <!-- <input type="text" class="nombre" id="propiedad-nombre" name="propiedad-nombre" value="<?=$Filtro?>" /> -->
                        <!-- <input type="hidden" class="propiedad" id="propiedad-nueva" name="propiedad" value="nueva"> -->

                        <h5>
                            <label for="seccion-banner-p">Propiedad a la que pertenece:</label>
                        </h5>
                        <div class="styled-select blue semi-square">
                            <select id="seccion-banner-p" name="seccion" required="required">
                                <option value="" disabled="disabled" selected="selected">Propiedad</option>
                                <?php if ($query1 > 0) { ?>
                                    <?php foreach ($query1 as $row) { ?>
                                       <option value="<?=$row->Filtro?>"><?=$row->nombre?></option>

                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="hidden" class="propiedad" id="propiedad-true" name="propiedad" value="true">
                        <input type="hidden" name="banner" value="principal" />
                        <br>
                    </div>

                </form>


            </div>

            <div id="contenido-banner-recomendado" class="no-float col-md-7 col-xs-10 col-sm-8 col-lg-6">
            	<h3>BANNER DE PROPIEDADES RECOMENDADAS</h3>
                <ul> <!-- BANNER RECOMENDADOS --> </ul>
                <form id="newRecomendBanner" action="<?=base_url()?>php/upload_images.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div id="image_preview_recomend_ban" title="Arrastra aquí la imagen"><img id="previewing_recomend_ban" /></div>
                    <div id="selectImage">
                        <label for="file-upl">Seleciona imagen </label><br/>
                        <input type="file" name="upl" id="file-upl" required="required" accept="image/*" />
                        <button class='input-btn input_btn_file' id='input_btn'>Buscar archivo...</button>
                        <!-- <input type="text" class="nombre" id="propiedad-nombre" name="propiedad-nombre" value="<?=$Filtro?>" /> -->
                        <!-- <input type="hidden" class="propiedad" id="propiedad-nueva" name="propiedad" value="nueva"> -->

                        <h5>
                            <label for="seccion-banner-r">Propiedad a la que pertenece:</label>
                        </h5>
                        <div class="styled-select blue semi-square">
                            <select id="seccion-banner-r" name="seccion" required="required">
                                <option value="" disabled="disabled" selected="selected">Propiedad</option>
                                <?php if ($query1 > 0) { ?>
                                    <?php foreach ($query1 as $row) { ?>
                                       <option value="<?=$row->Filtro?>"><?=$row->nombre?></option>

                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="hidden" class="propiedad" id="propiedad-true" name="propiedad" value="true">
                        <input type="hidden" name="banner" value="recomendado" />
                        <br>
                    </div>

                </form>


            </div>




       </div>

       <div id="banner-recomendados">

            <div class="no-float col-md-2 col-xs-1 col-sm-1 col-lg-3"></div><div id="contenido-banner-principal" class="no-float col-md-8 col-xs-10 col-sm-10 col-lg-6"></div><div class="no-float col-md-2 col-xs-1 col-sm-1 col-lg-3"></div>

       </div>


    </div>


</div>

<div id="overlay-loading" class="oculto">
    <div class="loader">
      <div class="side"></div>
      <div class="side"></div>
      <div class="side"></div>
      <div class="side"></div>
      <div class="side"></div>
      <div class="side"></div>
      <div class="side"></div>
      <div class="side"></div>
      </div>
</div>