<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Upload Form</title>
	</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/upload_bannerSld');?>

<input type="file" name="userfile" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>