# ia_test
Test
Proyecto de examen de evaluación

	NOTA:	Preferentemente utilizar Nginx como servidor web,
			ya que la configuración de laravel es menos complicada,
			pero también se puede correr en apache, creando servidores
			virtuales y cambiando los hosts. 
			al final se anexarán enlaces y contenido para facilitar la instalación
		
	:::::::::::::::::::::::::::::::::::::::
	::::::::::::: TECNOLOGÍAS :::::::::::::
	:::::::::::::::::::::::::::::::::::::::

	Backend:
		- Nginx
		- Laravel (PHP)
			~ Plugins (Instalados via composer) ~
			- Image/intervetion
			- way/generators

	Frontend
		- JQuery
		- Bootstrap
		- Underscore
		- Cropper
		- Bower (depende de nodejs)

	::::::::::::::::::::::::::::::::::::::
	:::::::::::: REQUERIMIENTOS ::::::::::
	::::::::::::::::::::::::::::::::::::::
			
	1. Git
 	2. PHP (5.4>)
		~ Dependencias ~
		- php5-fpm
		- php5-cli
		- php5-mcrypt
		- php5-mysqlnd
	3. MySQL
	4. Composer	 		~ (No necesario) ~
	5. NodeJS 			~ (No necesario) ~
		- npm 			~ (No necesario) ~
			- bower		~ (No necesario) ~
	
	::::::::::::::::::::::::::::::::::::::
	::: INSTRUCCIONES DE INSTALACION :::::
	::::::::::::::::::::::::::::::::::::::

	1. 	Instalar los requerimientos y dependencias, normalmente se subiría el proyecto sin la carpeta,
		vendor ni los componentes que se pueden actualizar con bower, ya que son dependencias y
		git estaría notando cambios constantemente. Sin embargo para facilidad de la prueba, subiré 
		absolutamente todos los archivos.

	2. 	Descargar el proyecto, creo básico este paso (git clone https://github.com/dangret/ia_test).

	3. 	Configurar el proyecto en el servidor web (para más detalles ver anexos).

	?. 	Si se configura bajo Nginx en sistemas Unix, será necesario establecer permisos:
		sudo chgrp -R www-data *  	(normalmente el grupo de trabajo de nginx)
		sudo chmod -R 775 *			(rwx-rwx-rw)

	4. 	Modifcar el archivo app/config/database.php de acuerdo a los parametros de su instancía de mysql
		el ejemplo está en el anexo 3.

	5. 	Crear la base de datos y poblarla. En linea de comandos, dirigirnos al directorio del proyecto y
		dentro escribir el siguiente comando:
		php artisan migrate --seed   

	::::::::::::::::::::::::::::::::::::::
	::::::::::::::: ANEXOS :::::::::::::::
	::::::::::::::::::::::::::::::::::::::

	1. 	ENLACE PARA CONFIGURAR EL ENTORNO EN LINUX (Debian):
		https://www.digitalocean.com/community/tutorials/how-to-install-laravel-with-an-nginx-web-server-on-ubuntu-14-04

	2. 	CONFIGURACION DE NGINX (explicado en el enlace) (para acceder con la siguiente direccion: "localhost:85/")
		server {
		    listen 85; #Puerto desocupado 
		
		    root <directorio_del_proyecto>/public;
		    index index.php index.html index.htm;
		
		    server_name localhost;
		
		    location / {
		        try_files $uri $uri/ /index.php?$query_string;
		    }
		
		    location ~ \.php$ {
		        try_files $uri /index.php =404;
		        fastcgi_split_path_info ^(.+\.php)(/.+)$;
		        fastcgi_pass unix:/var/run/php5-fpm.sock;
		        fastcgi_index index.php;
		        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
		        include fastcgi_params;
		    }
		}

	3. 	CONFIGURACIÓN DE LA BASE DE DATOS EN LA APLICACIÓN DE LARAVEL
		Solo se modificaría está parte:
		'mysql' => array(
				'driver'    => 'mysql',
				'host'      => 'localhost',        	<- nombre del host
				'database'  => 'iainteractive_db', 	<- nombre de la BD
				'username'  => 'root', 		       	<- Usuario valido de MySQL
				'password'  => 'secret',       		<- Contraseña del usuario
				'charset'   => 'utf8',
				'collation' => 'utf8_unicode_ci',
				'prefix'    => '',
			),


