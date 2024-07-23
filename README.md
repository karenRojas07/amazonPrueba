pasos para ejecutar la aplicacion 
1. descargar el proyecto con git clone --> https://github.com/karenRojas07/amazonPrueba.git
3. dirijirse a la ubicacion del proyecto y abrir la terminal, en esta ejecutar el siguiente comando --> composer install
4. crear una copia del archivo .env.example en la carpeta raiz del proyecto y llamarla .env
5. en el archivo .env recien creado definir el nombre de la base de datos, el usuario y la contraseña de acceso
6. luego ejecutar el comando --> php artisan key:generate
7. luego ejecutar las migraciones para que se cree la tabla de la base de datos, para esto ejecutar el comando --> php artisan migrate
8. finalmente ejecutar el comando para iniciar el proyecto --> php artisan serve
9. para ver el proyecto en el navegador ingresar a la direccion http://amazonprueba.test/ ten en cuenta que asi lo defini yo y que yo estoy ejeutando mis proyectos con laragon


