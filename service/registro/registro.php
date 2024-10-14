<?php
include("../../service/connections/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name1 = $_POST["nombre1"];
    $name2 = $_POST["nombre2"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $nombreUsuario = $_POST["nombre-usuario"];
    $perfil = $_POST["perfil"];

    // Iniciar transacción
    $connection->begin_transaction();
    try {
        // 1. Insertar en la tabla users
        $stmt = $connection->prepare(
            "INSERT INTO users (first_name, middle_name, last_name, second_last_name, username, email, password) 
             VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssssss", $name1, $name2, $apellido1, $apellido2, $nombreUsuario, $email,  $pass );

        if ($stmt->execute()) {

        } else {
            throw new Exception("Error en la inserción en users: " . $stmt->error);
        }

        // Obtener el ID del usuario recién insertado
        $user_id = $connection->insert_id;

        // 2. Insertar en la tabla user_profile
        $stmt = $connection->prepare("INSERT INTO user_profiles (user_id, profile_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $user_id, $perfil);

        if ($stmt->execute()) {
           
        } else {
            throw new Exception("Error en la inserción en user_profile: " . $stmt->error);
        }

        // Confirmar la transacción
        $connection->commit();

    } catch (Exception $e) {
        // Si algo falla, hacer rollback de todas las consultas
        $connection->rollback();
        echo "Transacción fallida: " . $e->getMessage();
    }

    // Cerrar los statements para liberar memoria
    $stmt->close();

    // Cerrar la conexión
    $connection->close();
}
?>
