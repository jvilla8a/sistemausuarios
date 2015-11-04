<!DOCTYPE html>
<html>
    <head>
        <?php 
            echo $head;
        ?>
    </head>
    <body>
        <div id="contenedor">
            <div id="cabecera">
                <? 
                    echo $cabecera;
                ?>
            </div>
            <div id="enlaces">
                <? 
                    echo $enlaces;
                ?>
            </div>
            <div id="contenido">
                <? echo $contenido; ?>
                <?
                    $usuario = array(
                      'name' => 'txtUsuario',  
                      'id' => 'txtUsuario',
                      'maxlength' => '30',
                      'value' => set_value('txtUsuario','')
                    );
                    $nombre = array(
                      'name' => 'txtNombre',  
                      'id' => 'txtNombre',
                      'maxlength' => '50',
                      'value' => set_value('txtNombre','')
                    );
                    $correo = array(
                      'name' => 'txtCorreo',  
                      'id' => 'txtCorreo',
                      'maxlength' => '255',
                      'value' => set_value('txtCorreo','')
                    );
                    $clave1 = array(
                      'name' => 'txtClave1',  
                      'id' => 'txtClave1',
                      'maxlength' => '30',
                    );
                    $clave2 = array(
                      'name' => 'txtClave2',  
                      'id' => 'txtClave2',
                      'maxlength' => '30',
                    );
                    /*$idPerfil = array(
                      'name' => 'txtIdPerfil',  
                      'id' => 'txtIdPerfil',
                      'maxlength' => '3',
                      'value' => set_value('txtIdPerfil','')
                    );*/
                    $submit = array(
                      'value' => "Guardar"
                    );
                    $reset = array(
                      'value' => "Restablecer"
                    );
                    
                    echo form_open("cInicio/registrarUsuario");
                ?>
                <table>
                    <tr>
                        <th>Usuario</th>
                        <td><? echo form_input($usuario); ?></td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td><? echo form_input($nombre); ?></td>
                    </tr>
                    <tr>
                        <th>Correo</th>
                        <td><? echo form_input($correo); ?></td>
                    </tr>
                    <tr>
                        <th>Contraseña</th>
                        <td><? echo form_password($clave1); ?></td>
                    </tr>
                    <tr>
                        <th>Confirmar Contraseña</th>
                        <td><? echo form_password($clave2); ?></td>
                    </tr>
                    <tr>
                        <th>Perfil</th>
                        <td>
                            <select name="cboIdPerfil" id="cboIdPerfil">
                            <?  
                                foreach ($perfiles->result() as $perfil)
                                {
                                    echo "<option value='". $perfil->id ."'>". $perfil->descripcion ."</option>";
                                }
                            ?>  
                            </select>    
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <? 
                            echo form_submit($submit);
                            echo form_reset($reset);
                            
                            ?>
                        </td>
                    </tr>
                    
                    
                </table>
                <? echo form_close(); ?>
                
                <div id="error">
                    <? echo validation_errors(); ?>
                </div>
                
            </div>
            <div id="pie">
                <?
                    echo $pie;
                ?>
            </div>
        </div>
    </body>
</html>
