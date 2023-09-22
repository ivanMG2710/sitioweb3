<?php

$conexion = mysqli_connect('localhost','ivan','futbol10','registro') 
or die(mysql_error($mysqli));

diferencia($conexion);

function diferencia($conexion){
    if(isset($_POST['enviar'])){
        insertar($conexion);
    }
    if(isset($_POST['eliminar'])){
        eliminar($conexion);
    }
}



function insertar($conexion){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellidos'];
    $correo = $_POST['correo'];

    $consulta = "INSERT INTO clientes(id, nombre, apellido, correo)
    VALUES ('$id','$nombre', '$apellido','$correo')";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header("Location: Registro.php");
}

function eliminar($conexion){
    $id = $_POST['id'];

    $consulta = "DELETE FROM clientes WHERE id='$id'";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header("Location: Registro.php");
}

function hacerTabla(){
    $consulta = "SELECT * FROM clientes";
    $resultado = mysqli_query($conexion, $consulta);

    while($fila = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>".$fila['id'];
        echo "<td>".$fila['nombre'];
        echo "<td>".$fila['apellido'];;
        echo "<td>".$fila['correo'];;
        echo "<tr>";
    }
    mysqli_close($conexion);
}
?>