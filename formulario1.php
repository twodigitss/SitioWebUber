<?php
    if(isset($_POST['registro'])) { //el nombre del boton (submit) es registro 
        try{
            $nom = $_POST ['nombre'];
            $edad = $_POST ['edad'];
            $genero = $_POST ['sexo'];
            $ocpn = $_POST ['ocupacion'];
            $edo = $_POST ['estado'];
            $tel = $_POST ['telefono'];
            $correo =  $_POST['correo'];
            $dir = $_POST ['direccion']; 


            $conexion = new PDO('mysql:host=localhost:3307; dbname=nutriologia', 'root', 'root');
            $enunciado = $conexion->prepare("INSERT INTO datos(nombre, edad,sexo, ocupacion, estado_civil, telefono, correo, direccion) values (?,?,?,?,?,?,?,?)");
            
            $enunciado->bindParam(1,$nom);
            $enunciado->bindParam(2,$edad);
            $enunciado->bindParam(3,$genero);
            $enunciado->bindParam(4,$ocpn);
            $enunciado->bindParam(5,$edo);
            $enunciado->bindParam(6,$tel);
            $enunciado->bindParam(7,$correo);
            $enunciado->bindParam(8,$dir);
            
            $enunciado->execute();
        }catch(PDOException $e){
            echo "error: ".$e->getMessage();
        }
    }
    if(isset($_POST['cancel'])) {
        header('Location: http://localhost/SitioWebUber/dashboard.php');
    }
?>