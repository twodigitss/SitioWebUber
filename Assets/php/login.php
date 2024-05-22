<?php
    if(isset($_POST['submit'])){
        try{
            $User = $_POST['User'];
            $Password =  $_POST['Password'];

            $conexion = new PDO('mysql:host=localhost:3307; dbname=nutriologia', 'root', 'root');
            $enunciado = $conexion->prepare("SELECT * FROM login WHERE Usuario = ? ");
            $enunciado->bindParam(1,$User);
            $enunciado->execute();
            

            if($row = $enunciado->fetch()){
                if($row['Contraseña'] == $Password and $row['Usuario'] == $User){
                    header('Location: http://localhost/SitioWebUber/dashboard.html');
                }else{
                    header('Location: http://localhost/SitioWebUber/index.html');
                }

            }else{
                header('Location: http://localhost/SitioWebUber/index.html');
            }
        }catch(PDOException $e){
            echo "error: ".$e->getMessage();
        }
    }
?>