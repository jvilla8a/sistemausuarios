<!DOCTYPE html>
<html>
    <head>
        <? 
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
                <h3>Misión</h3>
                <p>Esta es la misión</p>
                
                <h3>Visión</h3>
                <p>Esta es la visión</p>
                
                <h3>Historia</h3>
                <p>Esta es la historia</p>
            </div>
            <div id="pie">
                <?
                    echo $pie;
                ?>
            </div>
        </div>
    </body>
</html>
