<?php
    if(isset($_POST['submit'])){
        try{
            $nombre = $_POST['nombre'];
            $edad =  $_POST['edad'];
            $ocupacion = $_POST['ocupacion'];
            $estado =  $_POST['estado'];
            $telefono = $_POST['telefono'];
            $correo =  $_POST['correo'];
            $direccion = $_POST['direccion'];

            $conexion = new PDO('mysql:host=localhost:3307; dbname=nutriologia', 'root', 'root');
            $enunciado = $conexion->prepare("UPDATE datos SET nombre=?,edad=?,ocupacion=?,estado_civil=?,telefono=?,correo=?,direccion=? WHERE nombre = ?");
            $enunciado->bindParam(1,$nombre);
            $enunciado->bindParam(2,$edad);
            $enunciado->bindParam(3,$ocupacion);
            $enunciado->bindParam(4,$estado);
            $enunciado->bindParam(5,$telefono);
            $enunciado->bindParam(6,$correo);
            $enunciado->bindParam(7,$direccion);
            $enunciado->bindParam(8,$nombre);
            $enunciado->execute();

            header('Location: http://localhost/SitioWebUber/perfilcliente.html');
        }catch(PDOException $e){
            echo "error: ".$e->getMessage();
        }
    }
    if(isset($_POST['submit2'])){
        header('Location: http://localhost/SitioWebUber/perfilcliente.html');
    }
?>