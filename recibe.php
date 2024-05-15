<?php
    try{
        $conexion = new PDO('mysql:host=localhost:3307; dbname=nutriologia', 'root', 'root');

        $enunciado = $conexion->prepare("SELECT * FROM login");
        $enunciado->setFetchMode(PDO::FETCH_ASSOC); //devuelve un arreglo asociativo
        $enunciado->execute();

        while($row = $enunciado->fetch()){
            $usuario = $row['Usuario'];
            $contraseña = $row['Contraseña'];
        }
    }catch(PDOException $e){
        echo "error: ".$e->getMessage();
    }

    if(isset($_POST['submit'])){
        if($_POST['User'] == $usuario && $_POST['Password'] == $contraseña){
            header('Location: http://localhost/SitioWebUber/dashboard.html');
        }else{
            header('Location: http://localhost/SitioWebUber/login.php');
        }
    }
?>