<?php
include("../service/connections/connection.php");
$query="select * from users";
$users = $connection ->query($query);


if (!$users) {
    die("Error en la consulta: " . $connection->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Usuarios</h1><br>

    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
        </tr>
        <?php
            if ($users->num_rows > 0){
                while($fila = $users-> fetch_assoc()){
                    echo"<tr>";
                    echo "<td>" . $fila["user_id"] . "</td>";
                    echo "<td>" . $fila["first_name"] ."</td>";
                    echo "<td>" . $fila["last_name"] . "</td>";
                    echo "</tr>";
                }
            }
            $users->close();
        ?>
    </table>


</body>
</html>
