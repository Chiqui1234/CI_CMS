# CI_CMS
Expandable Content Management System without database. Instead using a MySQL or MongoDB (for example), the system is based in PHP files across the directories to stand up.
(4 of January, 2019) :: Supports creation of posts, users (alias, email, md5 password), login and logout. The next step is bring the hability of list and categorize the posts created by the users.
It has "themes" and "plug-ins" built-in, but I don't developed the installer of them :P Anyway, it might be in the next update ;)

The main objetive is bring to any person to the Internet revolution, even with free hosting like Byethost, 000Webhost, etc.
You can run the website in any 32-bits computer with 1GHz and 256MB of RAM with a Linux distro and works very well.

Requeriments to run: only Apache 2 / Nginx (with PHP 7.x module)

/*****************************************/

Tareas pendientes / Tasks (ES)
- (TERMINADO) La página "registrarme.php" tiene que ser terminada y utilizar la función crearUsuario(). Actualmente sólo se pueden crear usuarios desde el panel de control (previo login como administrador)
- La función que crea los posts debe tener en cuenta las categorías para poder clasificar y organizar entradas en distintas páginas (previamente creadas por el usuario)
- Desarrollar "perfil.php", para mostrar el perfil del usuario de manera completa + permitir la edición de su privacidad, email, contraseña, avatar, portada, etc.
- Pulir el sistema de activación de cuentas del usuario.
- Implementar require_once en lugar de include_once, para las funciones críticas del sistema (las cuáles sería ideal que el script parara si no se está cargando la función correspondiente)
- Terminar la traducción del sistema al inglés
- Soporte completo para templates (actualmente: sin soporte salvo el que viene de fábrica. Debo estandarizar nombres de las clases y pensar las políticas de plantillas)
- Soporte completo para plug-ins (actualmente: parcial)
- Revisar fallos / búsqueda de bugs