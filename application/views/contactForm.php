                          <div class="notificationForm">
                            <?php 

                              echo form_open('admin/getContactData'); 

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

                              echo form_textarea('Comentarios');

                              echo form_submit('name', 'Enviar');
                              form_close();
                            ?>



                          </div>