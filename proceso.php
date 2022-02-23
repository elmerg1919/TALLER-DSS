<?php
    include('conexion.php');
    if(isset($_POST['enviar']))
    {
            $nombre = trim($_POST['nombres']);
            $apellido = trim($_POST['apellidos']);
            $calificacion = trim($_POST['calificacion']);
            $consulta = "INSERT INTO estudiantes(Nombre_Al, Apellido, Calificacion_Al) VALUES ('$nombre','$apellido','$calificacion')";
            $resultado = mysqli_query($mysqli,$consulta);

            ?>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="css/style.css">
            <title>Menu</title>
            <section class="form-register">
                <a href="mostrar.php">
                    <input class="botons" type="submit" value="Ver Estudiantes">
                </a>
                <a href="index.html">
                    <input class="botons" type="submit" value="Regresar">
                </a>
            </section>
            <?php
    }


?>