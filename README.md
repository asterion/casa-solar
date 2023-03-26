<p align="center">
    <h1 align="center">Prototipo de postulaciones en Yii 2 para Casa Solar</h1>
    <br>
</p>

ENUNCIADO
---------

En la plataforma de casa solar los usuarios pueden registrar su postulación al programa, la postulación pasa por
varias etapas(5) para que el usuario se convierta en un beneficiario, estas postulaciones se hicieron desde todas
partes de chile y las postulantes de solo 24 comunas fueron seleccionados (unos 3.500 beneficiarios
aproximadamente , que se distribuyen en las comunas que acumulaban más postulantes), como al programa le ha
ido también va a haber un segundo llamado para tener unos 3.000 postulantes más, por lo que necesitamos llevar
más de 1 llamado en paralelo, y las comunas seleccionadas serán aquellas que cumplan con un mínimo
postulaciones (sin establecer aún), las comunas dejarán de recibir postulaciones si llegan hasta un cupo máximo,
y la región se cerrará si llega a una cantidad máxima de postulaciones (esto significa que cerrará todas las
comunas independientemente de su cantidad de postulaciones). Cabe destacar que estos procesos de control de
apertura y cierre de comunas debe ser automático.


SOLUCIÓN
--------

Modelo de datos

| Tablas                       | Descripción |
|------------------------------|-------------|
| program                      |Representa los programas con un nombre y descripción.|
| call_for_application         |Representa el o los procesos de postulaciónes a los programas, se puede definir un máximo de postulantes e indicar si la postulación esta activa o desactivada|
| commune                      |Representa las comunas del país con su nombre|
| grant_application            |Representa los registros de postulantes a los procesos de postulación, registra email, comuna y el proceso que postula el usuario.|
| call_for_application_commune |Define los limites de postulación por comuna a los procesos de postulación.|
| call_grant_application_view  |Una vista para ver el máximo de postulantes versus la cantidad de postulantes ya registrados|

Páginas

| URL | Descripción |
|-----|-------------|
| http://localhost:8080/site/index | Lista los todos los procesos de postulación indicando cuales son procesos abiertos y cuales ya están cerrados por cupos completados o por estar desactivados arbitrariamente(active) |
| http://localhost:8080/site/postular/ID | Formulario de registro a proceso de postulación. |
| http://localhost:8080/site/postular/ID | La misma página de registro se usa como página de agradecimiento y éxito al registrarse. |
| http://localhost:8080/site/postulaciones | Listado de los usuarios registrados en los programas. |

INSTALACIÓN
-----------

Clonar el repositorio "casa-solar" desde *https://github.com/asterion/casa-solar*

```
git clone git@github.com:asterion/casa-solar.git
```

Crear una base de datos en MySQL o MariaDB

```
CREATE DATABASE casasolar;
```

Configurar el acceso a de Yii 2 a la base de datos recien creada en el archivo
*config/db.php* que se encuentra en el directorio creado al clonar el repositorio.

```
<?php

return [
    'class'    => 'yii\db\Connection',
    'dsn'      => 'mysql:host=localhost;dbname=agenciase',
    'username' => 'root',
    'password' => 'root',
    'charset'  => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
```

Crear el modelo de datos en la base de datos con Yii 2. Ejecutar migrate de Yii
en el mismo directorio del proyecto.

Se cargar el modelo de datos y los datos pruebas.

```
php yii migrate
```
