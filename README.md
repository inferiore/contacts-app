# contacts-app
## Passos para instalar contacts-app.

Abrir dos terminales, en la primera instalamos el sitio y levantamos el servidor mediante los  comandos siguientes:

1. `git clone https://github.com/inferiore/contacts-app.git`
2. `composer install`
3. `composer dump autoload`
4. `cp .env.example .env`
4. `php artisan serve`

En la segunda terminal mantenemos el worker para procesar job

1.  `php artisan queue:work` 

[Ruta de Login ](http://localhost:8000/login).
 

[Ejemplo de formato CSV ](https://github.com/inferiore/contacts-app/blob/master/contacts%20-%20%20example.csv) 

Usuario:camila@gmail.com
Pass: 123

