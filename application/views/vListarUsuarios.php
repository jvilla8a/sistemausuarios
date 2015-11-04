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

                <h2>Usuarios</h2>
                <form name="frmConsultar" id="frmConsultar" action="<? echo base_url() . 'index.php/cInicio/listarUsuarios' ?>" method="post">
                    Buscar por
                    <select name="cboCampo" id="cboCampo">
                        <option value="mostrartodos" selected="selected">Mostrar todos</option>
                        <?
                            foreach ($campos as $campo)
                            {
                                echo "<option value='$campo'>". ucwords($campo) ."</option>";
                            }
                        ?>
                    </select>
                    <br/>
                    Texto de búsqueda
                    <input type="text" name="txtDato" id="txtDato"/>
                    <input type="submit" value="Buscar"/>
                </form>

                <br/>


                <table border="1">
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>F/H Registro</th>
                        <th>Perfil</th>
                        <th>Eliminar</th>
                        <th>Modificar</th>
                    </tr>
                    <?
                        foreach ($contenido->result() as $fila)
                        {
                            $id = $fila->id;
                            echo "<tr>";
                            echo "<td>" . $fila->id . "</td>";
                            echo "<td>" . $fila->usuario . "</td>";
                            echo "<td>" . $fila->nombre . "</td>";
                            echo "<td>" . $fila->correo . "</td>";
                            echo "<td>" . $fila->fechahoraregistro . "</td>";
                            echo "<td>" . $fila->perfil . "</td>";
                            echo "<td>";
                            echo "<a href='". base_url() . "index.php/cInicio/eliminarRegistro/$id/usuario' title='Elimina a " . $fila->usuario . "' onclick='return confirm(\"¿Está seguro?\");'>Eliminar</a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<a href='". base_url() . "index.php/cInicio/modificarUsuario/$id' title='Modifica a " . $fila->usuario . "' onclick='return confirm(\"¿Está seguro?\");'>Modificar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }

                        echo "<caption align='bottom'>
                                Total Registros:
                                <span style='color:orange;'>" .
                                    //$contenido->num_rows() .
                                    $nreg .
                                "</span>
                              </caption>";

                    ?>
                </table>

            </div>
            <div id="pie">
                <?
                    echo $pie;
                ?>
            </div>
        </div>
    </body>
</html>
