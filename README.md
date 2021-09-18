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
Si se quiere que la UI de las rutas para ver las cargas correr: 
```
npm i
```
