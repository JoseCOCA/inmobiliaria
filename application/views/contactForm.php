<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
    .notificationForm{
      width: 900px;
      background: linear-gradient(to bottom, #7DB9E8 0%, #2989D8 39%, #1E5799 100%) repeat scroll 0% 0% transparent;
    }
    .notificationForm label{
      color: #fff;
      margin-left: 15%;

    }
    #notForm{
      display: block;
      margin-top: 10px;
      width: 70%;
      margin-left: 15%;
      background-color: #439DAD;
      border:0px solid;
      margin-bottom: 10px;
    }

    .notificationForm textarea{
      display: block;
      margin-top: 30px;
      margin-left: 15%;
      margin-bottom: 50px;
      width: 70%;
      background-color: #439DAD;
      border:0px solid;
    }
    .formcontent{
      width: 100%;
      padding-top: 50px;
    }

    input[type="submit"]{
      width: 50%;
      height: 40px;
      background-color: #1E599B;
      color: #fff;
      border: #F29031 solid;
      border-radius: 10px;
    }
    .subButton{
      width: 300px;
      text-align: center;
      margin: 0 auto;
      padding-bottom: 50px;
    }

  </style>
</head>
<body>

  <div class="notificationForm">
    <div class="formcontent">

                            <?php 

                              echo validation_errors();

                              echo form_open('notificacion/obtenerDatos'); 
                              $data1 = array(
                                      'name' => 'Nombre',
                                      'id'  =>  'notForm'
                                      );
                              echo form_label($data1['name'].':', $data1['name']);
                              echo form_input($data1);

                              $data2 = array(
                                      'name' => 'Telefono',
                                      'id'  =>  'notForm'
                                      );
                              echo form_label($data2['name'].':', $data2['name']);
                              echo form_input($data2);
                              $data3 = array(
                                      'name' => 'Celular',
                                      'id'  =>  'notForm'
                                      );
                              echo form_label($data3['name'].':', $data3['name']);
                              echo form_input($data3);

                              $data4 = array(
                                      'name' => 'Correo',
                                      'id'  =>  'notForm'
                                      );
                              echo form_label($data4['name'].':', $data4['name']);
                              echo form_input($data4);

                              $data5 = array(
                                      'name' => 'Empresa',
                                      'id'  =>  'notForm'
                                      );
                              echo form_label($data5['name'].':', $data5['name']);
                              echo form_input($data5);
                              
                              $data6 = array(
                                      'name' => 'Comentarios',
                                      'id'  =>  'notForm'
                                      );
                              
                              echo form_label($data6['name'].':', $data6['name']);
                              echo form_textarea('Comentarios');?>

                          <div class= "subButton">
                             <?php 
                              echo form_submit('submit', 'Enviar');?>
                          </div> 

                          <?php
                              form_close();
                            ?>

    </div>
        </div>
</body>
</html>
                          