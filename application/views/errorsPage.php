<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
  <?php echo validation_errors(); ?>

  <script>
  setTimeout(function(){
  window.location.href = "<?php echo base_url('admin'); ?>";
},5000)</script>
</body>

</html>