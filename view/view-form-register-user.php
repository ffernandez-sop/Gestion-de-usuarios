<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    $perfil_id = $_GET["perfil"];
} else {

    die("Perfil no válido.");
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
    <link rel="stylesheet" href="../style/index.css">
    
</head>
<body>
    <div class="logo">
        <div class="contenedor__logo">
            <img src="../img/logo.png" alt="image" width="70">
            <p>Sistema de gestion de usuarios</p>
        </div>
        <div class="contenedor__user">
            <p>Bienvenido: <?= $_SESSION['username'] ?> </p>
        </div>
    </div>
    <header>
        
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
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"> </div>
                    <div class="col-md-6 border  border-2 p-3"> 
                        <div class="text-center text-black-50">
                           <h3> Registro de usuario</h1>
                        </div>
                        <form action="../service/registro/registro.php" method="POST">
                            <div class="card-body">
                                <div class="form-group text-start">
                                    <label for="nombre1" class="text-start">Primer nombre</label>
                                    <input class="form-control" type="text" name="nombre1" id="nombre1" required>
                                </div>
                                <div class="form-group text-start">
                                    <label for="nombre2" class="text-start">Segundo nombre</label>
                                    <input class="form-control" type="text" name="nombre2" id="nombre2">
                                </div>
                                <div class="form-group text-start">
                                    <label for="apellido1" class="text-start">Primer apellido</label>
                                    <input class="form-control" type="text" name="apellido1" id="apellido1" required>
                                </div>
                                <div class="form-group text-start">
                                    <label for="apellido2" class="text-start">Segundo apellido</label>
                                    <input class="form-control" type="text" name="apellido2" id="apellido2">
                                </div>
                                <div class="form-group text-start">
                                    <label for="email" class="text-start">Correo electrónico</label>
                                    <input class="form-control" type="email" name="email" id="email" required>
                                </div>
                                <div class="form-group text-start">
                                    <label for="password" class="text-start">Contraseña</label>
                                    <input class="form-control" type="password" name="password" id="password" required>
                                </div>
                                <div class="form-group text-start">
                                    <label for="nombre-usuario" class="text-start">Nombre de usuario</label>
                                    <input class="form-control" type="text" name="nombre-usuario" id="nombre-usuario" required>
                                </div>
                                <div class="form-group text-start">
                                    <label for="perfil" class="text-start">Seleccione un perfil</label>
                                    <select class="form-select form-select-sm" type="sel" name="perfil" id="perfil" required>
                                        <option value=""></option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Usuario</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer text-start">
                                <button type="submit" class="btn btn-primary btn-lg mt-2">Registrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3"> </div>
                </div>
            </div>
    
           </section>
    </main>

    <footer>
        <p>&copy; 2024 Mi Empresa. Todos los derechos reservados.</p>
    </footer>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
