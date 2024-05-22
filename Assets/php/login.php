<?php
    if(isset($_POST['submit'])){
        try{
            $User2 = $_POST['User'];
            $conexion = new PDO('mysql:host=localhost:3307; dbname=nutriologia', 'root', 'root');
            
            $enunciado = $conexion->prepare("SELECT * FROM login");
            $enunciado->setFetchMode(PDO::FETCH_ASSOC); //devuelve un arreglo asociativo
            $enunciado->execute();
            $User = $_POST['User'];
            $Password =  $_POST['Password'];

            foreach($enunciado as $row){
                
                $usuario = $row['Usuario'];
                echo $usuario;
                $contraseña = $row['Contraseña'];
                echo $contraseña;                
                    
                if($User == $usuario && $Password == $contraseña){
                    header('Location: http://localhost/SitioWebUber/dashboard.html');
                }else{
                    header('Location: http://localhost/SitioWebUber/index.html');
                }
            }
        }catch(PDOException $e){
            echo "error: ".$e->getMessage();
        }
    }
?>