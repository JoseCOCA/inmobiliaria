<?php
require 'Zebra_Image.php';
$image = new Zebra_Image();
error_reporting(0);
// A list of permitted file extensions
if(isset($_POST['propiedad'])) {

	$propiedad = $_POST['propiedad'];

	if($propiedad == 'nueva'){ // REVISA SI LA IMAGEN ES DE UNA PROPIEDAD NUEVA

		if(isset($_FILES["file-upl"]["type"])){
			$maxSize = 3145728;
			$path = '../images/filtros/';
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file-upl"]["name"]);
			$file_extension = end($temporary);
			if ((($_FILES["file-upl"]["type"] == "image/png") || ($_FILES["file-upl"]["type"] == "image/jpg") || ($_FILES["file-upl"]["type"] == "image/jpeg")
			) && ($_FILES["file-upl"]["size"] <= $maxSize)//Approx. 500kb files can be uploaded.
			&& in_array($file_extension, $validextensions)) {
				if ($_FILES["file-upl"]["error"] > 0){
					echo '{"status":"'.$_FILES["file-upl"]["error"].'"}';
				}else{
					if (file_exists($path . $_FILES["file-upl"]["name"])) {
						echo '{"status":"Ya existe un archivo con ese nombre."}';
						// echo $_FILES["file-upl"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
					}
					else{
						$sourcePath = $_FILES['file-upl']['tmp_name']; // Storing source path of the file in a variable
						$targetPath = $path . $_FILES['file-upl']['name']; // Target path where file is to be stored
						/*PROCESA LA IMAGEN PARA REDIMENSIONARLA*/
						$image->source_path = $sourcePath;
						$image->target_path = $targetPath;
						$image->jpeg_quality = 100;
						$image->preserve_aspect_ratio = true;
						$image->enlarge_smaller_images = true;
						$image->preserve_time = true;
						$image->resize(200, 200, ZEBRA_IMAGE_CROP_CENTER);
						// move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
						echo '{"status":"success", "nombre":"'.$_POST['propiedad-nombre'].'", "imagen":"'.$_FILES['file-upl']['name'].'", "filtro":"'.$_POST['nuevo-filtro'].'"}';
					}
				}
			}else{
				echo '{"status":"El archivo supera el peso máximo."}';
				// echo "<span id='invalid'>***Invalid file Size or Type***<span>";
			}
		}else{
			echo 'error';
		}
	}else{ // SI NO ES UNA PROPIEDAD NUEVA SUBE UNA IMAGEN A BANNERS


		if(isset($_FILES["upl"]["type"])){
			$path = '../images/banners/';
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["upl"]["name"]);
			$file_extension = end($temporary);
			$maxSize = 3145728;
			if ((($_FILES["upl"]["type"] == "image/png") || ($_FILES["upl"]["type"] == "image/jpg") || ($_FILES["upl"]["type"] == "image/jpeg")) 
			&& ($_FILES["upl"]["size"] <= $maxSize)//Approx. 500kb files can be uploaded.
			&& in_array($file_extension, $validextensions)) {
				if ($_FILES["upl"]["error"] > 0){
					echo '{"status":"'.$_FILES["upl"]["error"].'"}';
				}else{
					if (file_exists($path . $_FILES["upl"]["name"])) {
						echo '{"status":"Ya existe un archivo con ese nombre."}';
						// echo $_FILES["upl"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
					}
					else{
						$sourcePath = $_FILES['upl']['tmp_name']; // Storing source path of the file in a variable
						$targetPath = $path . $_FILES['upl']['name']; // Target path where file is to be stored
						
						/*PROCESA LA IMAGEN PARA REDIMENSIONARLA*/
						$image->source_path = $sourcePath;
						$image->target_path = $targetPath;
						$image->jpeg_quality = 100;
						$image->preserve_aspect_ratio = true;
						$image->enlarge_smaller_images = true;
						$image->preserve_time = true;
						if(isset($_POST['banner'])){ // SI ES BANNER
							$banner = $_POST['banner'];
							// SI ES BANNER PRINCIPAL O RECOMENDADO
							$banner=='principal' ? $image->resize(900, 300, ZEBRA_IMAGE_CROP_CENTER) : $image->resize(900, 150, ZEBRA_IMAGE_CROP_CENTER);
						}else{ // SI ES EL CARRUSEL
							$image->resize(750, 450, ZEBRA_IMAGE_CROP_CENTER);
						}
							
						
						// move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
						echo '{"status":"success", "nombre" : "'.$_FILES['upl']['name'].'"}';
					}
				}
			}else{
				echo '{"status":"El archivo supera el peso máximo."}';
				// echo "<span id='invalid'>***Invalid file Size or Type***<span>";
			}
		}else echo 'nel';
		/*$allowed = array('png', 'jpg', 'gif','zip');

		if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

			if(!in_array(strtolower($extension), $allowed)){
				echo '{"status":"Error. Extensión de archivo no permitida"}';
				exit;
			}

			if(move_uploaded_file($_FILES['upl']['tmp_name'], '../images/banners/'.$_FILES['upl']['name'])){
				// echo '{"status":"success"}';
				echo '{"status":"success", "nombre" : "'.$_FILES['upl']['name'].'"}';
				exit;
			}
		}

		echo '{"status":"Error al subir el archivo"}';*/
	}
}else{
	echo '{"status":"Proepiedad indefinida"}';
}
exit;