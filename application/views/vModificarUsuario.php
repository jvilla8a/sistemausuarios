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
                <h2>Actualización de datos</h2>
                <?
                    $fila = $contenido->row();
                    
                    $id = array(
                      'name' => 'txtId',  
                      'id' => 'txtId',
                      'value' => $fila->id,
                      'style' => 'display:none;'
                    );
                    $usuario = array(
                      'name' => 'txtUsuario',  
                      'id' => 'txtUsuario',
                      'value' => $fila->usuario,
                      'readonly' => 'readonly',
                    );
                    $nombre = array(
                      'name' => 'txtNombre',  
                      'id' => 'txtNombre',
                      'maxlength' => '50',
                      'value' => $fila->nombre
                    );
                    $correo = array(
                      'name' => 'txtCorreo',  
                      'id' => 'txtCorreo',
                      'maxlength' => '255',
                      'value' => $fila->correo
                    );
                    $submit = array(
                      'value' => "Guardar"
                    );
                    $reset = array(
                      'value' => "Restablecer"
                    );
                    
                    
                    echo form_open("cInicio/actualizarUsuario");
                ?>
                <table>
                    <tr>
                        <? echo form_input($id); ?>
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
