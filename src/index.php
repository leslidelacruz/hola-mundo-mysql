
<?php
$host = "db";
$usuario = "root";
$contrasena = "123456";
$base_datos = "hola_mundo";

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT mensaje FROM mensajes";
$resultado = $conexion->query($sql);

$mensaje = "";

if ($resultado && $fila = $resultado->fetch_assoc()) {
    $mensaje = $fila["mensaje"];
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola Mundo | PHP y MySQL</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eadcf8, #fce4ec);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .contenedor {
            background: white;
            width: 100%;
            max-width: 550px;
            padding: 45px 35px;
            border-radius: 22px;
            text-align: center;
            box-shadow: 0 12px 35px rgba(90, 50, 120, 0.15);
        }

        .icono {
            font-size: 55px;
            margin-bottom: 18px;
        }

        h1 {
            color: #75469b;
            font-size: 34px;
            margin-bottom: 15px;
        }

        .descripcion {
            color: #777;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .estado {
            background: #e7f8ed;
            color: #25834a;
            padding: 12px;
            border-radius: 12px;
            font-weight: bold;
            margin-bottom: 22px;
        }

        .mensaje {
            background: #f7f0fc;
            color: #654080;
            padding: 18px;
            border-radius: 12px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .pie {
            color: #999;
            font-size: 13px;
        }
    </style>
</head>

<body>

    <div class="contenedor">

        <div class="icono">💜</div>

        <h1>¡Hola Mundo!</h1>

        <p class="descripcion">
            Bienvenido a mi primera aplicación web
            conectada a una base de datos MySQL.
        </p>

        <div class="estado">
            ✓ Conexión con MySQL exitosa
        </div>

        <div class="mensaje">
            <?php
            if ($mensaje !== "") {
                echo htmlspecialchars($mensaje);
            } else {
                echo "No se encontraron mensajes en la base de datos.";
            }
            ?>
        </div>

        <p class="pie">
            Desarrollado con PHP, MySQL y Docker
        </p>

    </div>

</body>
</html>
