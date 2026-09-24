<?php

  require('conexion.php');

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre=$_POST['nombre'];
    $fecha_nacimiento=$_POST['fecha_nacimiento'];
    $correo=$_POST['correo'];

  $sql = "INSERT INTO personas (nombre, correo, fecha_nacimiento)
                    VALUES ('$nombre', '$correo', '$fecha_nacimiento')";
            $conn->exec($sql);
            // Mostrar información de tabla personas
            $stmt = $conn->query("SELECT * FROM personas");
            $personas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Recorre el array de personas y muestra la información
            foreach ($personas as $persona) {
                echo "<p>Nombre: " . $persona['nombre'] . ", Correo: " . $persona['correo'] . ", Fecha de nacimiento: " . $persona['fecha_nacimiento'] . "</p>";
            }
        }
        else {
            echo "<p>No es una petición tipo POST.</p>";
        }
?>