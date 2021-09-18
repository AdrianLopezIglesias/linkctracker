# URL Ofuscator
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
php artisan test
```
El archivo del test está en 'tests/Features/APITest.php' 

