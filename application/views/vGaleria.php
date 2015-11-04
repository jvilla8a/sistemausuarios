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
                <form name="frmConsultar" id="frmConsultar" action="<? echo base_url() . 'index.php/Upload/listarFotos' ?>" method="post">
                    Buscar por
                    <select name="cboCampo" id="cboCampo">
                        <option value="mostrartodos" selected="selected">Mostrar todos</option>
                        <?
                            foreach ($campos->result() as $campo)
                            {
                                echo "<option value='$campo->usuario'>". ucwords($campo->usuario) ."</option>";
                            }
                        ?>
                    </select>
                    <br/>
                    Texto de búsqueda
                    <input type="submit" value="Buscar"/>
                </form>

                <br/>


                <table border="1">
                    <tr>
                        <th>foto</th>
                    </tr>
                    <?
                        foreach ($contenido->result() as $fila)
                        {
                            $nombre = explode(".", $fila->foto);
                            echo "<tr>";
                            echo "<td>";
                            echo "<img src='" . base_url() . "assets/uploads/thumbs/". $nombre[0] . "_thumb.". $nombre[1] ."' />";
                            echo "</td>";
                            echo "</tr>";
                        }

                        echo "<caption align='bottom'>
                                Total Registros:
                                <span style='color:orange;'>" .
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
