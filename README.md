# DAW - DAWES - Práctica 12 - Gestión de almacén.

## 1. Requisitos

Nuestro cliente, una fábrica de muebles, desea informatizar algunos procesos de su negocio para lo que nos solicita que diseñemos una aplicación WEB.

La información que pretende gestionar gira en torno a los muebles y las piezas que los componen. Los <mark>datos a tener en cuenta para los muebles son su código de mueble (único), su nombre y su precio. Todo mueble está formado por una o más piezas. Cada pieza tiene un identificador único, un nombre y una descripción. Cada pieza puede formar parte de varios muebles. Interesa saber cuántas unidades de cada pieza componen cada mueble.</mark>

*Por ejemplo, la mesa de televisión está formada por 3 piezas: tablero en 1 unidad, patas en 4 unidades y ruedas en 4 unidades.*

<mark> Todas las unidades de una pieza se encuentran en uno o más estantes del almacén. No se permite mezclar distintas piezas en cada estante. El estante viene determinado de forma única</mark> por dos valores: <mark>pasillo y altura.</mark> Además de en qué estantes están las piezas, <mark>interesa conocer cuantas unidades de la pieza hay almacenadas en cada estante</mark>.

*Por ejemplo, en el pasillo uno altura uno hay almacenadas 50 unidades de la pieza “Bisagra metal”. De dicha pieza hay un total de 173 unidades almacenadas en cuatro estantes de acuerdo con la siguiente distribución: 50, 50, 50 y 23.*

<mark>La aplicación WEB debe permitir:
- Solicitar un <mark>listado con todos los muebles. Para cada mueble</mark> se ha de <mark>mostrar su nombre y precio.</mark> Este <mark>listado</mark> debe estar <mark>disponible para todos los usuarios.</mark>
- <mark>La consulta de una pieza mostrando su nombre y unidades disponibles</mark> de esa pieza en el almacén. Este <mark>listado</mark> debe estar <mark>disponible sólo para usuarios identificados</mark>.

## 2. Base de datos

El equipo de bases de datos ha diseñado la base de datos de acuerdo al siguiente esquema relacional:

- Mueble (#cod, nombre, precio);
- Pieza (#cod, nombre, descripc);
- Formado (#cod_mueble, #cod_pieza, unidades);
- Estante (#pasillo, #altura,   cod_pieza, unidades);
- Formado.cod_mueble ⊆ Mueble.cod;
- Formado.cod_pieza ⊆ Pieza.cod;
- Estante.cod_pieza ⊆ Pieza.cod;

A partir de dicho esquema se ha creado la base de datos. <mark>Dicha base de datos se puede importar</mark> desde un SGBD <mark>a partir del archivo “Muebles.sql”</mark> disponible en: https://app.box.com/s/5u5rr9mblgcncszpi47jboh4df7sazyw.

## 3. Presentación

El equipo de diseño WEB ha diseñado las páginas estáticas de la aplicación. El esquema general de las mismas contiene un <mark>menú situado a la izquierda</mark>. Cada menú de cada página incluye <mark>opciones que deben ser restringidas o no de acuerdo con los requisitos que se van a detallar</mark>. Las páginas que entrega el equipo de diseño WEB son:
- <mark>index.php -> Página de inicio accesible para todos los usuarios</mark>.
- <mark>listado.php -> Listado de muebles disponible para todos los usuarios</mark>.
- <mark>login.php -> Página de acceso sólo accesible para usuarios anónimos. Esta página envía por método POST las variables user y pass</mark>.
- <mark>user_page.php -> Página de bienvenida a usuarios identificados. No accesible desde menú</mark>. 
- <mark>form_existencias.php -> Página con desplegable de selección de pieza sólo accesible a usuarios identificados</mark>. 
- <mark>existencias.php -> Página no accesible desde menú con información de existencias de la pieza seleccionada en form_existencias. Dicha pieza se recoge por método POST de la variable “pieza”</mark>.
- <mark>La opción del menú "Cerrar sesión" sólo estará disponible para usuarios identificados</mark>.

<mark>Las páginas estáticas se suministran en el archivo “www Muebles.zip”</mark> disponible en la URL: https://app.box.com/s/k2fpf8ru1zyjtfv1pstxs0gqeqohqwo1.

## 4. Se pide

Las tareas a realizar son:
- <mark>Establecer plan de pruebas de validación</mark>.
- <mark>Desplegar la base de datos en la máquina Lubuntu que tiene LAMP y phpMyAdmin ya instalados.</mark>
- <mark>Desarrollar la aplicación WEB con consultas a la base de datos a partir de las páginas estáticas</mark>.
- <mark>Desplegar la aplicación</mark>.
- <mark>Pasar el plan de pruebas</mark>.
- <mark>Una memoria de todas las tareas realizadas</mark>.


Enviad la práctica resuelta a gs.trabajos@gmail.com con asunto "DAW - DAWES - Práctica 12 - Gestión de almacén".

## Registro

- Usuarios hecho
    - php de verificación
    - Página de bienvenida
    - Todos los menús adaptados según la sesión
    - Redireccionamiento según la sesión en las páginas necesarias

- Listado terminado
    - 
