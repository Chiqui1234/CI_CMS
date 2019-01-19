<!doctype html>
    <html lang="es">
    
     <head>
         <?php require_once("../../internal/info.php"); /* Bajo dos directorios porque el post está en $category/$title */ ?>
         <title>Porqué los VRM deberían importarte | <?php echo $nombreDelSitio; ?></title>
         <?php include_once(locacion()."internal/header.php"); ?> <!-- Para insertar estilos CSS -->
         <meta charset="UTF-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
     </head>
    <body>
    <style>
        :root {
            --linkColor: #b93535;
            --linkHover: #e71010;
        }
        </style>
    <?php include_once(locacion()."template/main/include/nav.php"); ?>
    
    <div id="root">
        <div class="portrait" style="background-image:url('img/asus-crosshair-vii-hero-wifii.jpg');">
        <div class="title">Porqué los VRM deberían importarte</div>
        <?php require_once("author.php"); ?>
        <div class="author">@<?php echo $owner; ?></div>
        </div>
            <div class="post">
                <strong>POST EN PROCESO</strong>
                Los VRM (Voltage Regulator Module, en español, <strong>Módulo de regulador de voltaje</strong>) son los encargados de suministrar y regular energía a las distintas piezas de nuestra PC. ¡Están literalmente en todos lados! Por ejemplo:

<ul><li>Motherboard: hay varios módulos encargados de alimentar al SoC (CPU), a los sticks de RAM, al Chipset, etc.</li></ul>

<ul><li>Placas de video: cuánto mayor consumo, más componentes estabilizadores de la energía debe haber, para evitar <i>VDrops</i> bajo carga</li></ul>

<div id='info'><div class='logo'></div><h1>¿Qué es un VDrop?</h1> Un &quot;Voltage Drop&quot; (caída de voltaje) es un fenómeno muy común en los motherboards gama baja que se produce cuándo el consumo del procesador sube porque se lo está exigiendo (sube el amperaje) pero el módulo no alcanza para satisfacer ese consumo, y el voltaje cae.<br />
Esto podría suceder cuándo se usa un CPU gama alta con un motherboard gama baja. 
<br /><strong>Ejemplo</strong>: i7 9700K + Gigabyte H310H-M</div>


            </div>
        <div class="comments"><?php include_once("../../plug-in/fancyComments/include/mini.php"); ?></div>
    </div>
    </body>
    </html>
    