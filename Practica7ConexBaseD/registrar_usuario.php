<?php
include 'conexion.php'; // Incluir el archivo de conexión a la base de datos

if (isset($_POST['usuario'])) {
    $usuario = $_POST['usuario'];

    try {
        // Verificar si el usuario ya existe en la base de datos
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :usuario");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            echo "El usuario ya está registrado";
        } else {
            // Si el usuario no existe, insertarlo en la base de datos
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre_usuario) VALUES (:usuario)");
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            echo "Usuario registrado correctamente";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!-- Explicación línea por línea:
Este código PHP se encarga de manejar la lógica del registro de usuarios en la base de datos. Vamos a revisar cada parte del código en detalle:

<php: Marca el comienzo de un bloque de código PHP.

include 'conexion.php';: Incluye el archivo conexion.php, que contiene la lógica para establecer la conexión a la base de datos.

if (isset($_POST['usuario'])) {: Verifica si hay datos enviados a través del método POST y si existe un valor con el nombre de usuario en esos datos. 
    Esto se usa para asegurarse de que se ha enviado un nombre de usuario desde el formulario HTML.

$usuario = $_POST['usuario'];: Obtiene el valor del campo usuario enviado desde el formulario HTML y lo almacena en la variable $usuario.

Se inicia un bloque try-catch para manejar posibles errores que puedan ocurrir durante la ejecución de las consultas a la base de datos.

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :usuario");: Prepara una consulta SQL para buscar si el nombre de usuario ya existe 
en la tabla usuarios de la base de datos.

$stmt->bindParam(':usuario', $usuario);: Vincula el valor de la variable $usuario al parámetro :usuario en la consulta SQL preparada.

$stmt->execute();: Ejecuta la consulta SQL preparada.

$resultado = $stmt->fetch(PDO::FETCH_ASSOC);: Obtiene el resultado de la consulta y lo almacena en la variable $resultado como un array asociativo.

if ($resultado) { ... } else { ... }: Verifica si se encontró un resultado en la consulta. Si $resultado tiene un valor, significa que el usuario ya está 
registrado, y se muestra un mensaje indicando eso. Si no hay resultado, significa que el usuario no está registrado y se procede a insertarlo en la base de datos.

En caso de cualquier excepción (error) durante la ejecución de las consultas a la base de datos, se captura con catch(PDOException $e) y se muestra un mensaje de error.

?>: Marca el fin del bloque de código PHP.

En resumen, este script PHP verifica si el usuario ya existe en la base de datos y muestra un mensaje correspondiente en función de si el usuario ya está registrado 
o si se ha registrado correctamente. Además, maneja errores en caso de que ocurran durante la ejecución de las consultas a la base de datos.





 -->