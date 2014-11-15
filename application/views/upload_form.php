
<?php echo $error;

?>

<?php echo form_open_multipart('upload/upload_images');?>

<?php  
$data = array(
              'name'        => 'padre',
              'size'        => '2',
              'type'		=> 'hidden',
              'value'		=> $padre
            );


echo form_input($data);

?>
<input type="file" name="userfile" />

<br /><br />

<input type="submit" value="upload" />

</form>