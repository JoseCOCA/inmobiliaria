<?php

error_reporting(0);
// A list of permitted file extensions
if(isset($_POST['propiedad'])) {
	
	$propiedad = $_POST['propiedad'];
	
	if($propiedad == 'nueva'){
		
		if(isset($_FILES["file-upl"]["type"])){
			$path = '../images/filtros/';
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file-upl"]["name"]);
			$file_extension = end($temporary);
			if ((($_FILES["file-upl"]["type"] == "image/png") || ($_FILES["file-upl"]["type"] == "image/jpg") || ($_FILES["file-upl"]["type"] == "image/jpeg")
			) && ($_FILES["file-upl"]["size"] < 100000)//Approx. 100kb files can be uploaded.
			&& in_array($file_extension, $validextensions)) {
				if ($_FILES["file-upl"]["error"] > 0){
					echo "Return Code: " . $_FILES["file-upl"]["error"] . "<br/><br/>";
				}else{
					if (file_exists($path . $_FILES["file-upl"]["name"])) {
						echo $_FILES["file-upl"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
					}
					else{
						$sourcePath = $_FILES['file-upl']['tmp_name']; // Storing source path of the file in a variable
						$targetPath = $path . $_FILES['file-upl']['name']; // Target path where file is to be stored
						move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
						echo '{"status":"success", "nombre":"'.$_POST['propiedad-nombre'].'", "imagen":"'.$_FILES['file-upl']['name'].'", "filtro":"'.$_POST['nuevo-filtro'].'"}';
					}
				}	
			}else{
				echo "<span id='invalid'>***Invalid file Size or Type***<span>";
			}
		}else{
			echo 'error2';
		}
	}else{
		
		$allowed = array('png', 'jpg', 'gif','zip');

		if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

			if(!in_array(strtolower($extension), $allowed)){
				echo '{"status":"Error. Aextensión de archivo no permitida"}';
				exit;
			}

			if(move_uploaded_file($_FILES['upl']['tmp_name'], '../images/banners/'.$_FILES['upl']['name'])){
				// echo '{"status":"success"}';
				echo '{"status":"success", "nombre" : "'.$_FILES['upl']['name'].'"}';
				exit;
			}
		}

		echo '{"status":"Error al subir el archivo"}';		
	}
}else{
	echo '{"status":"Proepiedad indefinida"}';
}
exit;