<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    $perfil_id = $_GET["perfil"];
} else {

    die("Perfil no válido.");
}
include("../service/connections/connection.php");

$query="select u.*,p.* from users u join user_profiles up on up.user_id = u.user_id join profiles p on p.profile_id = up.profile_id ";
$users = $connection ->query($query);


if (!$users) {
    die("Error en la consulta: " . $connection->error);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/bootstrap.min.css">    <title>Proyecto final</title>
    <link rel="stylesheet" href="../style/index.css">
    
</head>
<body>
   
    <header>
    <div class="logo">
        <div class="contenedor__logo">
            <img src="../img/logo.png" alt="image" width="70">
            <p>Sistema de gestion de usuarios</p>
        </div>
        <div class="contenedor__user">
            <p>Bienvenido:<?= $_SESSION['username'] ?>  </p>
        </div>
    </div>
        <nav>
            <ul class="menu">
                <li class="dropdown">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960"
                        width="40px" fill="#FFFFFF">
                        <path d="M120-240v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
                    </svg></a>
                    <ul class="dropdown-menu">
                        <li><a href="./view-table-usr.php?perfil=<?= $perfil_id ?>">Vista de usarios</a></li>
                        <li><a href="./view-form-register-user.php?perfil=<?= $perfil_id ?>">Crear usuario</a></li>
                        <li><a href="../login/login.html">Cerrar sesion</a></li>
                    </ul>
                </li>
                <li><a href="../index.php?perfil=<?= $perfil_id ?>"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="40px" fill="#FFFFFF">  <path
                    d="M220-180h150v-250h220v250h150v-390L480-765 220-570v390Zm-60 60v-480l320-240 320 240v480H530v-250H430v250H160Zm320-353Z" />
            </svg></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h2>Lista de usuarios registrados en el sistema</h2>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Email</th>
                      <th>Usuario</th>
                      <th>Perfil</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
            if ($users->num_rows > 0){
                while($fila = $users-> fetch_assoc()){
                    echo"<tr>";
                    echo "<td>" . $fila["first_name"] . "</td>";
                    echo "<td>" . $fila["last_name"] ."</td>";
                    echo "<td>" . $fila["username"] . "</td>";
                    echo "<td>" . $fila["email"] . "</td>";
                    echo "<td>" . $fila["profile_name"] . "</td>";
                    echo "</tr>";
                }
            }
            $users->close();
        ?>
                  </tbody>
                </table>
              </div>
            
        </section>
    </main>

    <footer>
        <p>&copy; 2024. Todos los derechos reservados.</p>
    </footer>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>
