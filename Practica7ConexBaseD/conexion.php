<?php
// Detalles de conexión a la base de datos
$host = 'localhost';
$db_name = 'verificar_correo_ajax';
$username = 'root';
$password = '';

try {
    // Conexión a la base de datos utilizando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
      // Establece el modo de error de PDO para lanzar excepciones en caso de error.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
     // En caso de error en la conexión, muestra un mensaje de error con la descripción del error.
    die("Error de conexión: " . $e->getMessage());
}
?>
<!-- Se definen variables que almacenan los detalles necesarios para la conexión a la base de datos, como el nombre del host ($host), el nombre de la base de datos ($db_name), 
el nombre de usuario ($username) y la contraseña ($password). En este caso, los valores son para una configuración local común.

Se inicia un bloque try-catch que maneja la conexión a la base de datos mediante PDO.

En el bloque try, se utiliza el constructor new PDO() para crear una instancia de la clase PDO, que representa una conexión a la base de datos. Se pasa la cadena de conexión con los 
parámetros necesarios (nombre del host, nombre de la base de datos, nombre de usuario y contraseña) como argumentos.

setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);: Esta línea establece el modo de error de PDO en ERRMODE_EXCEPTION. Esto indica que PDO debe lanzar excepciones en caso de 
errores, lo que facilita la captura y el manejo de errores durante la interacción con la base de datos.

En caso de que ocurra un error durante la conexión (por ejemplo, datos incorrectos de conexión o la base de datos no está disponible), se captura la excepción PDOException en el 
bloque catch, y se muestra un mensaje de error utilizando die() que finaliza la ejecución del script y muestra el mensaje proporcionado.

En resumen, este código PHP utiliza PDO para intentar establecer una conexión a una base de datos MySQL utilizando los detalles de conexión proporcionados y configura PDO para que 
lance excepciones en caso de errores durante la conexión.


En resumen, PDO es una extensión de PHP que proporciona una capa de abstracción para interactuar con bases de datos, facilitando el desarrollo de 
aplicaciones web más seguras, portables y mantenibles.


 -->

