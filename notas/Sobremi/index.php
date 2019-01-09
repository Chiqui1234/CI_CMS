<!doctype html>
    <html lang="es">
    
     <head>
         <?php require_once("../../internal/info.php"); /* Bajo dos directorios porque el post está en $category/$title */ ?>
         <title>Sobre mi | <?php echo $nombreDelSitio; ?></title>
         <?php include_once(locacion()."internal/header.php"); ?> <!-- Para insertar estilos CSS -->
         <meta charset="UTF-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
     </head>
    <body>
    
    <?php include_once(locacion()."template/main/include/nav.php"); ?>
    
    <div id="root">
        <div class="portrait" style="background-image:url('https://i.imgur.com/Xx6x1N5.jpg');">
        <div class="title">Sobre mi</div>
        <div class="author">@Chiqui1234</div>
        </div>
            <div class="post">
                <p>¡Hola! Me llamo <strong>Santiago</strong> y soy un fanático de la informática. Desde el 2014 estoy escribiendo con un amigo en
                <strong>Informática Cero</strong>, dónde comenzamos explicando las noticias y análisis de una manera simple y amena, hasta que el
                público fue creciendo con nosotros. <i>Chiqui's</i> nace a partir de mi apodo, refiriéndose a mi altura :D Mi principal objetivo
                es brindar contenido informativo en este rubro, haciendo reviews a hardware barato para ayudar a nuestros seguidores acceder a la
                PC Gamer de una manera más sencilla ;) Además, el poder expresarse como uno quiere y de una manera más relajada e informal, me
                dan las herramientas que estaba buscando, junto a Info0.</p>
                <p>Siempre me gustó discutir bien y con fundamentos, así que no perdí la oportunidad ni me
                quedé con ganas de probar casi cualquier hardware. Fundé <strong>Olivaires Hardware</strong> en el 2016 con el objetivo de traer la
                mejor atención y precios a Argentina... además de trabajar de lo que me gusta. </p>
                
                <p>También estoy comenzando un proyecto de Seguridad
                Informática con 4 compañer@s, llamado Infosegura. De momento, con ellos estoy simplemente aportando en el Desarrollo Web, pero no
                descarto este tema para aprenderlo próximamente.</p>

<p>Me emociona programar y siempre me gusta buscar la manera de optimizar las cosas, para evitar la obsolencia programada (vía software) que deja
abatidas a máquinas tan accesibles para todos, como una netbook con Atom N455. Simplemente no me gusta que esas máquinas se queden fuera de la red,
así que trabajo de manera activa en perfeccionar mis métodos para abarcar la mayor cantidad de máquinas posible, siempre.</p>

<p>¿Nunca armaste un maquinón para jugar un videojuego, y sufriste de <i>stuttering</i> o algún fenómeno así? ¡Da rabia gastarse un dineral para no
tener un gran rendimiento por culpa del software! Siempre hago hincapié en eso y me alegra no ser el único.<br/>
Las cosas buenas necesitan tiempo y dedicación.</p>
<p>¡Gracias por leer hasta acá! Un saludo.</p>
            </div>
        <div class="comments"><?php include_once("../../plug-in/fancyComments/include/mini.php"); ?></div>
    </div>
    </body>
    </html>
    