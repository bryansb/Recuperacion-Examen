# Recuperacion-Examen
Creación del ejercicio de Programación Hipermedial; recuperación post-examen.

**Nombre:** Douglas Bryan Sarmiento Basurto.

**Aplicación:** Servicio de parqueadero de carros.

----------

<h3>1. Diseño de la Base de Datos.</h3>

Para cumplir el requermiento se han creado tres tablas: CLIENTES, VEHICULOS y TICKETS. Se presenta a continuación las sentencias de estructura SQL de la Base de Datos.

<h4>Sentencias SQL de la estructura.</h4>

![imagen](/resources/readme/g1.png)

<h4>Sentencias SQL de claves, índices y constrains.</h4>

![imagen](/resources/readme/g2.png)

----------

<h3>2. Funcionalidad: Registrar/Ingresar Tickets.</h3>

Se pidió como requerimiento que se pudiera registrar tickets; para ello se solicita que se ingrese la cédula del cliente, los datos del vehículo y los datos propios del ticket en sí. 

<h4>Parte de la Vista de la funcionalidad.</h4>

Se trata de formulario con todos los campos solicitados como requerimiento.

![imagen](/resources/readme/g3.png)

<h4>Función con AJAX que persiste la información del formulario a la Base de Datos.</h4>

La función captura todos los datos del formulario, y luego los envía hacia la página PHP mediante el método POST.

![imagen](/resources/readme/g4.png)

<h4>Parte del Código PHP que contiene las sentencias SQL.</h4>

Lo que realiza esta página es seguir un proceso: buscar el cliente con la cédula, crear un vehículo para dicho cliente; buscar el vehículo ingresado, y asignarle a ese vehículo el ticket con los datos enviados. 

![imagen](/resources/readme/g5.png)

----------

<h3>3. Funcionalidad: Buscar Cliente.</h3>

Además, se solicita una página, en donde mediante una función AJAX se busque un determinado usuario dado su número de cédula.

<h4>Parte de la Vista de la funcionalidad.</h4>

Se trata de una barra de búsqueda que recibe como parámetro la cédula de un cliente, un botón que llama a la función y una tabla que captura la información obtenida de la base de datos.

![imagen](/resources/readme/g6.png)

<h4>Función con AJAX que obtiene el cliente de la base de datos.</h4>

La función captura el número de cédula del pequeño formulario, y luego envía el mismo hacia la página PHP mediante el método POST.

![imagen](/resources/readme/g7.png)

<h4>Parte del Código PHP que contiene la sentencia SQL.</h4>

Lo que realiza esta página es buscar si en la base de datos hay un cliente con ese número de cédula; en caso de haberlo, se comienza a mostrar la información del mismo, en caso contrario, se presenta una sola fila informando que no se encuentra tal cliente en la base de datos. 

![imagen](/resources/readme/g8.png)

----------

<h3>4. Funcionalidad: Listar Ticket.</h3>

Este requerimiento trata acerca de listar un ticket dado la cédula de un cliente, y una placa de algún vehículo que disponga; los datos mostrados deben ser tanto del ticket como del cliente y el vehículo.

<h4>Parte de la Vista de la funcionalidad.</h4>

Se trata de una barra de búsqueda que recibe como parámetro la cédula de un cliente y la placa de uno de sus vehículos, un botón que llama a la función y una tabla que captura la información obtenida de la base de datos de las tres tablas.

![imagen](/resources/readme/g9.png)

<h4>Función con AJAX que obtiene toda la información de las tablas.</h4>

La función captura todo lo que se ingresó en el input de búsqueda, se envía mediante el método POST a través de la función AJAX hacia la página PHP que verifica los datos ingresados.

![imagen](/resources/readme/g10.png)

<h4>Parte del Código PHP que contiene la sentencia SQL.</h4>

Lo que realiza esta página es obtener el string con los parámetros de búsqueda, y mediante la función split se separa cada término; así, posteriormente se verfica si existe alguna tupla en la base de datos que concuerde con la cédula y la placa que se envío, esto mediante una búsqueda simultánea en las tres tablas mediante INNER JOINs.

![imagen](/resources/readme/g11.png)