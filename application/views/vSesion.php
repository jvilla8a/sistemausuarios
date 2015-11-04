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
                    $clave1 = array(
                      'name' => 'txtClave1',  
                      'id' => 'txtClave1',
                      'maxlength' => '30',
                    );
                    $submit = array(
                      'value' => "Iniciar"
                    );
                    $reset = array(
                      'value' => "Restablecer"
                    );
                    
                    echo form_open("cInicio/sesion");
                ?>
                <table>
                    <tr>
                        <th>Usuario</th>
                        <td><? echo form_input($usuario); ?></td>
                    </tr>
                    <tr>
                        <th>Contraseña</th>
                        <td><? echo form_password($clave1); ?></td>
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
