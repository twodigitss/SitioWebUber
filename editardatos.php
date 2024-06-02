<?php
    if(isset($_POST['submit'])){
        try{
            $nombre = $_POST['nombre'];
            $edad =  $_POST['edad'];
            $sexo =  $_POST['sexo'];
            $ocupacion = $_POST['ocupacion'];
            $estado =  $_POST['estado'];
            $telefono = $_POST['telefono'];
            $correo =  $_POST['correo'];
            $direccion = $_POST['direccion'];

            $conexion = new PDO('mysql:host=localhost:3307; dbname=nutriologia', 'root', 'root');
            $enunciado = $conexion->prepare("UPDATE datos SET nombre=?,edad=?,sexo=?,ocupacion=?,estado_civil=?,telefono=?,correo=?,direccion=? WHERE nombre = ?");
            $enunciado->bindParam(1,$nombre);
            $enunciado->bindParam(2,$edad);
            $enunciado->bindParam(3,$sexo);
            $enunciado->bindParam(4,$ocupacion);
            $enunciado->bindParam(5,$estado);
            $enunciado->bindParam(6,$telefono);
            $enunciado->bindParam(7,$correo);
            $enunciado->bindParam(8,$direccion);
            $enunciado->bindParam(9,$nombre);
            $enunciado->execute();

            header('Location: http://localhost/SitioWebUber/perfilcliente.php');
        }catch(PDOException $e){
            echo "error: ".$e->getMessage();
        }
    }
    if(isset($_POST['submit2'])){
        header('Location: http://localhost/SitioWebUber/perfilcliente.php');
    }
?>