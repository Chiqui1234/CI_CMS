<!doctype html>
<html lang="es">

	<head>
		<title>Documentación de ChiquiCMS</title>
	</head>

<body>
<h1>ChiquiCMS</h1>

<p><strong>Glosario</strong>: Introducción, Tecnologías usadas, Jquery vs Javascript, Modularidad, 
	Licencia.</p>

<h2>¿Qué es?</h2>
<p><strong>ChiquiCMS</strong> es un gestor de contenidos web. Un software que se encarga de maximizar
	la productividad de su organización mediante tecnologías de bajo consumo para sus piezas hardware.<p>
<p>Nuestro objetivo es ofrecer la mejor experiencia que deberían ofrecer todos los gestores de contenido
	(CMS) a día de hoy.</p>

<h2>¿En qué tecnologías se basa?</h2>
<p>Este internal utiliza PHP puro. No se pensó como un framework sino como un gestor de contenido
	<strong>completo</strong>, con la capacidad de agregar módulos para ampliar las funciones del
	sitio web.</p>

<h2>Javascript puro vs Jquery</h2>
<p>Mientras que el uso de JQuery necesita una librería externa y un gran uso de CPU, que se traduce en un
	detrimento en la experiencia de usuario. Por ende, usamos -poco- Javascript para cosas muy específicas,
	de hecho, es probable que no halles Javascript en las plantillas que diseñamos. Muchas características
	presentes en JQuery pueden ser más eficientes al maquetarse en CSS3.</p>
<h3>Comparativas entre el rendimiento de JQuery y JS</h3>
<p>Hay diversos sitios webs que realizan estos benchmarks. Por ejemplo, JQueryEvidence.com. ¡Probalo vos
mismo!</p>

<h2>Con la escalabilidad en mente</h2>
<p>Texto</p>

<h2>Modularidad</h2>
<p>Mediante el uso de las llamadas "plug-ins", los desarrolladores pueden ampliar las funciones del
	CMS. Estas porciones de código se instalan a la base de este software y pueden agregarse o quitarse
	según la organización lo requieran.</p>
<p>En vez de utilizar funciones, utilizamos distintos archivos que se incluyen con la función
	<strong>include_once</strong> al archivo que requiera de estas funciones.</p>
<p>Si bien el software así se pensó, el desarrollador tiene camino libre a la hora de crear y distribuir
	su plug-in. De todas formas, se pide conciencia a la hora de programar, ya que se debe garantizar dentro
	de lo posible, las siguientes condiciones:</p>
 <ul>
 	<li>Legibilidad del código: nombres descriptivos en las variables, funciones y archivos.</li>
 	<li>Distribución libre: estoy a favor del software libre, por lo cuál es vital que los plug-ins sean de
 		libre distribución y edición. Si sos una empresa y desarrollás un plug-in específico para tu uso,
 		seria ideal que ese código se haga público. Al menos para agradecer el libre uso que permito sobre
 		este software <i>copyleft</i>.</li>
 	<li>Seguridad e integridad de los datos</li>
 </ul>
 <p>Todos estos ítems son campos donde la comunidad puede aportar enormemente para mejorar el software base y
 	los plug-ins (módulos) que rodean al ecosistema de ChiquiCMS.</p>

<h3>Plug-Ins propias del desarrollador original</h3>
<p>Debido a que este CMS se hizo para la organización <a href="#">Infosegura</a> y al terminar la primer
	versión <a href="#">se liberó en Github</a>, ya tenía la escalabilidad y modularidad en mente, por lo que ya
de por sí, se puede decir que la primer versión nació con estos estos plug-ins.</p>
<ul>
	<li>Blog: este módulo agrega un internal de blogposting al software base. Es decir, podremos crear una entrada
	(post, en inglés) y ésta se listará en la página blog.php, marcando el título, contenido, autor y fecha del
	post.</li>
	<li>Recursos: es un subidor de información a tu servidor, que admite archivos .zip. Además, podremos crear
	documentos PHP/HTML. Para crear un recurso web PHP/HTML (ChiquiCMS utiliza siempre extensión php), es
	necesario el plug-in "<strong>blog</strong>". Si usás sistemas UNIX-Like (Linux, por ejemplo), notarás que para ésta última función mencionada en el plug-in "recursos" es <i>dependiente</i> de "blog".</li>
</ul>

<h2>Licencia y descarga</h2>
</body>

</html>