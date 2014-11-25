
<?php echo $error;

?>

<?php echo form_open_multipart('upload/upload_images');?>

<?php
$data = array(
              'name'        => 'padre',
              'size'        => '2',
              'type'		=> 'hidden',
              // 'value'		=> $padre
            );

echo form_input($data);

?>
<label for="propiedad-nombre">Nombre:</label>
<input type="text" class="nombre" id="propiedad-nombre" name="propiedad-nombre" value="">
<br>
<input type="file" name="userfile" />

<br /><br />

<input type="submit" value="upload" />

</form>