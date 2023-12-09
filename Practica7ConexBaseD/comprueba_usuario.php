<!-- Modificar el archivo PHP para verificar en la base de datos:
Ahora, en lugar de usar una lista estática en PHP, debes realizar consultas a la 
base de datos para verificar si el nombre de usuario está presente.

Aquí te muestro cómo modificar el archivo comprueba_usuario.php para verificar en 
la base de datos: -->
<?php
include 'conexion.php'; // Incluir el archivo de conexión a la base de datos

if (isset($_POST['usuario'])) {
    $usuario = $_POST['usuario'];

    try {
          // Preparar una consulta para seleccionar un usuario con el nombre proporcionado
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :usuario");
         // Vincular el valor del nombre de usuario proporcionado al parámetro :usuario de la consulta
        $stmt->bindParam(':usuario', $usuario);
        // Ejecutar la consulta preparada
        $stmt->execute();
        // Obtener el resultado de la consulta en forma de array asociativo
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        // Verificar si se encontró algún resultado
        if ($resultado) {
            echo "El usuario ya está registrado";
        } else {
            echo "El usuario está disponible";
        }
    } catch (PDOException $e) {
         // Capturar excepciones (errores) relacionados con la base de datos
        echo "Error: " . $e->getMessage();
    }
}
?>
<!-- En este código, se realiza una consulta SQL para buscar si el nombre de usuario ingresado ($_POST['usuario']) está 
presente en la tabla usuarios. Si se encuentra, indica que el usuario está registrado; de lo contrario, indica que el usuario está disponible para el registro.

Ahora, la explicación línea por línea:

include 'conexion.php';: Incluye el archivo de conexión a la base de datos, que contiene la lógica para establecer la conexión utilizando PDO.

if (isset($_POST['usuario'])) { ... }: Verifica si hay datos enviados a través del método POST y si existe un valor con el nombre usuario en esos datos. Esto se usa para 
asegurarse de que se ha enviado un nombre de usuario desde el formulario HTML.

$usuario = $_POST['usuario'];: Obtiene el valor del campo usuario enviado desde el formulario HTML y lo almacena en la variable $usuario.

try { ... } catch (PDOException $e) { ... }: Se inicia un bloque try-catch para manejar cualquier excepción (PDOException) que pueda ocurrir durante la ejecución 
de la consulta a la base de datos.

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :usuario");: Prepara una consulta SQL utilizando el método prepare() de PDO para seleccionar 
un usuario específico en la tabla usuarios basado en el nombre de usuario proporcionado.

$stmt->bindParam(':usuario', $usuario);: Vincula el valor de la variable $usuario al parámetro :usuario en la consulta preparada.

$stmt->execute();: Ejecuta la consulta preparada con el nombre de usuario proporcionado.

$resultado = $stmt->fetch(PDO::FETCH_ASSOC);: Obtiene el resultado de la consulta y lo almacena en la variable $resultado como un array asociativo.

if ($resultado) { ... } else { ... }: Verifica si se encontró un resultado en la consulta. Si $resultado tiene un valor, significa que el usuario ya está registrado 
y se muestra un mensaje indicando eso. Si no hay resultado, significa que el usuario no está registrado y se muestra un mensaje indicando que el usuario está disponible.

En caso de cualquier excepción (error) durante la ejecución de las consultas a la base de datos, se captura la excepción PDOException en el bloque catch y se muestra 
un mensaje de error utilizando echo.-->
