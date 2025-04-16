# Proyecto de optimización de aplicaciones web

## Integrantes 

| Nombre | <!-- --> |
|--------|-|
|Arzat Torres, Erick Christopher|<img src="https://i.postimg.cc/6QrX6jLf/Screenshot-2023-08-31-10-51-08-86-2.jpg" loading="lazy" alt="Foto de integrante" width="120" height="150">|
|Pan Zaldivar, Cristian David| <img src="https://i.postimg.cc/7P0qGTD5/16003566.png" loading="lazy" alt="Foto de integrante" width="120" height="150"> |
|Puc Moo, José Luis| <img src="https://i.postimg.cc/KzDWtH0c/Jos-Puc.jpg" loading="lazy" alt="Foto de integrante" width="120" height="150">|
|Vazquéz Rodríguez, Diana Carolina| <img src="https://i.postimg.cc/yYhN6C0W/Whats-App-Image-2024-01-24-at-8-05-58-AM.jpg" loading="lazy" alt="Foto de integrante" width="120" height="120"> |

# Ejecución del proyecto
Para que pueda utilizar y probar de forma adecuada el proyecto deberá de realizar lo siguiente: 
- Ejecuta `composer install`
- Ejecuta `npm install` y posteriormente `npm run build`. 
- En el archivo `.env` asegurate de tener el entorno de ejecución en producción, es decir `CI_ENVIROMENT = production`, así como colocar tus credenciales de acceso al gestor de base de datos
- Deberás de crear un virtualhost o un directorio a través del cual puedas realizar la configuración del servidor en apache. La configuración a realizar deberá de ser la siguiente: 
```
<VirtualHost *:80>
	ServerName masnoticias.cm
	DocumentRoot "YOUR_PATH/public"
	<Directory  "YOUR_PATH/public/">
		Options -Indexes
		AllowOverride All
		Require local

		<IfModule mod_rewrite.c>
		Options +FollowSymlinks
		RewriteEngine On

		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteCond %{REQUEST_URI} (.+)/$
		RewriteRule ^ %1 [L,R=301]

		RewriteCond %{HTTPS} !=on
		RewriteCond %{HTTP_HOST} ^www\.(.+)$ [NC]
		RewriteRule ^ http://%1%{REQUEST_URI} [R=301,L]

		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteRule ^([\s\S]*)$ index.php/$1 [L,NC,QSA]

		RewriteCond %{HTTP:Authorization} .
		RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
		</IfModule>

		<IfModule !mod_rewrite.c>
		ErrorDocument 404 index.php
    </IfModule>

      ServerSignature Off
	</Directory>

	<IfModule mod_headers.c>
    	Header set Connection keep-alive
  	</IfModule>

	KeepAlive On
	KeepAliveTimeout 5
	MaxKeepAliveRequests 50

	<IfModule mod_deflate.c>
		AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript image/png image/jpeg image/svg+xml
		DeflateCompressionLevel 9
	</IfModule>

	<IfModule mod_expires.c>
		ExpiresActive On
		ExpiresByType image/png "access 3 months"
		ExpiresByType image/jpeg "access 3 months"
		ExpiresByType image/svg+xml "access plus 3 months"

		ExpiresByType text/javascript "access 2 months"
		ExpiresByType text/css "access 2 months"
	</IfModule>
</VirtualHost>
```
