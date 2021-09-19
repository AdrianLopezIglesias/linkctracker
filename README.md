# URL Ofuscator
## Documentación de desarrollo
https://special-grouse-217.notion.site/Challenge-TerapiaMia-Link-Tracker-0a677833f6d541c2b89669368447bf27

## Instalacion
Tener PHP y MySQl instalado. Recomiendo usar XAMPP: https://www.apachefriends.org/es/download.html
Tener Composer instalado (dependency manager de PHP): https://getcomposer.org/download/

```
git clone https://github.com/AdrianLopezIglesias/linkctracker.git
cd linkctracker
composer install
```
Actualizar .env con datos de BD del usuario
```
php artisan migrate
php artisan serve
```

Rutas Generales
/links : muestra un panel para ver todos los Links creados
/linkstatistics : muestra todos los usos de los links y la IP desde la que se accedio

Rutas API
post('l/create') : Parametro obligatorio una string para URL, Parametro opcional: expiration_date (fecha) y password (string)
get('l/{url}') devuelve el target_url
get('e/{url}') devuelve cantidad veces link utilizado
put('l/{url}') anula un link

Correr test
```
cd linkctracker
php artisan test --testsuite=Feature
```
El archivo del test está en 'tests/Features/APITest.php' 

# Errores de instalación comunes
Si al dar `php artisan serve` aparece el error `HP Warning:  Unknown: failed to 
open stream: No such file or directory in Unknown on line 0 ` es por que el antivirus bloqueo el archivo `server.php`. Hay que o sacarlo de cuarentena o crearlo manual. Si al intentar crearlo windows dice que necesita permisos de administrador, con solo cambiarle el nombre a la carpeta yo pude operar normal.
```
server.php
<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';

```
