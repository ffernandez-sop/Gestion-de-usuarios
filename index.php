<?php
session_start();

include("./service/connections/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
        $perfil_id = $_GET["perfil"];
    } else {
    
        die("Perfil no válido.");
    }

   
    if (isset($_SESSION['username'])) {
        $user = htmlspecialchars($_SESSION['username']);
    } else {
        header("Location: login/login.html");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/bootstrap.min.css">    
    <title>Proyecto final</title>
    <link rel="stylesheet" href="./style/index.css">
</head>
<body>
    
    <header>
    <div class="logo">
        <div class="contenedor__logo">
            <img src="./img/logo.png" alt="image" width="70">
            <p>Sistema de gestión de usuarios</p>
        </div>
        <div class="contenedor__user">
            <p>Bienvenido: <?= $user ?></p>
        </div>
    </div>
        <nav>
            <ul class="menu">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="40px" fill="#FFFFFF">
                        <path d="M120-240v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
                    </svg></a>
                    <ul class="dropdown-menu">
                        <?php
                        if ($perfil_id == 1) {
                            echo "<li><a href='./view/view-table-usr.php?perfil=" . $perfil_id . "'>Vista de usuarios</a></li>";
                            echo "<li><a href='./view/view-form-register-user.php?perfil=" . $perfil_id . "'>Crear usuario</a></li>";
                            echo "<li><a href='login/login.html'>Cerrar sesión</a></li>";
                        } else if ($perfil_id == 2) {
                            echo "<li><a href='./view/view_user_profile.php?perfil=" . $perfil_id . "&user=" . urlencode($user) . "'>Perfil</a></li>";
                            echo "<li><a href='login/login.html'>Cerrar sesión</a></li>";
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="index.php?perfil=<?= $perfil_id ?>"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="40px" fill="#FFFFFF">
                    <path d="M220-180h150v-250h220v250h150v-390L480-765 220-570v390Zm-60 60v-480l320-240 320 240v480H530v-250H430v250H160Zm320-353Z" />
                </svg></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Contenido principal aquí -->
    </main>

    <footer>
        <p>&copy; 2024. Todos los derechos reservados.</p>
    </footer>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
