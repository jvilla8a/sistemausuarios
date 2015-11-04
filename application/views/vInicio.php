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
                <?
                    echo $contenido;
                ?>
            </div>
            <div id="pie">
                <?
                    echo $pie;
                ?>
            </div>
        </div>
    </body>
</html>
