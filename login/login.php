<?php
session_start();
include("../service/connections/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_name = $_POST["user"];
    $user_pass = $_POST["pass"];

    $query = $connection->prepare(" SELECT users.*, user_profiles.*
                                    FROM users
                                    INNER JOIN user_profiles ON users.user_id = user_profiles.user_id
                                    WHERE users.username = ? AND users.password = ?");

    if ($query === false) {
        die("Fallo en la preparación de la consulta: " . $connection->error);
    }

    $query->bind_param("ss", $user_name, $user_pass);

    if(!$query->execute()){
        die("Fallo en la ejecucion de la conslta  " . $query->error);
    }

    $result = $query->get_result();

    if ($result->num_rows === 1) {
    
        $fila = $result->fetch_assoc();
        $_SESSION['username'] = $user_name;
        header('Location: ../index.php?perfil=' . urlencode($fila['profile_id']));
        exit(); 
    } else {
        header('Location: login_error.html?');
    }

    $query->close();
}
?>