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
| program                      |Representa programa con un nombre y descripción|
| call_for_application         |Representa el o los procesos de postulación a un programas definiendo un máximo de postulantes y una columna para indicar activar o desactivar el proceso de postulación|
| commune                      |Representa las comunas del país|
| grant_application            |Representa a los registros de postulantes a los programas, registra email, comuna y al proceso que postula.|
| call_for_application_commune |Define los limites de postulación por comuna a los procesos de postulación.|
| call_grant_application_view  |Una vista para ver el máximo de postulantes versus la cantidad de postulantes ya registrados|

Páginas

| URL | Descripción |
|-----|-------------|
| http://localhost:8080/site/index | Lista los todos los procesos de postulación indicando cuales son procesos abiertos y cuales ya están cerrados por cupos completados o por estar desactivados arbitrariamente(active) |
| http://localhost:8080/site/postular/ID | Formulario de registro a proceso de postulación. |
| http://localhost:8080/site/postular/ID | La misma página de registro se usa como página de agradecimiento y éxito al registrarse. |
| http://localhost:8080/site/postulaciones | Listado de los usuarios registrados en los programas. |
