<?php

if(isset($_POST['registro'])) { //el nombre del boton (submit) es registro 
    $ante = $_POST ['ant'];
    $activ= $_POST ['act'];
    $hor = $_POST ['horarios'];
    $carb = $_POST ['carbohidratos'];
    $agua = $_POST ['agua'];
    $cint = $_POST ['cintura'];
    $cad = $_POST ['cadera']; 
    $braz = $_POST ['brazo']; 
    $alt = $_POST ['altura']; 
    $peso = $_POST ['peso']; 
    $imc = $_POST ['imc']; 
    $grasa = $_POST ['grasa']; 
    $bpm = $_POST ['bpm']; 
    $otros = $_POST ['otros']; 

    $conexion = new PDO('mysql:host=localhost:3309;dbname=pacientes','root','');
    $enunciado = $conexion->prepare("INSERT INTO datos_especificos values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    
    $enunciado->bindParam(1,$ante);
    $enunciado->bindParam(2,$activ);
    $enunciado->bindParam(3,$hor);
    $enunciado->bindParam(4,$carb);
    $enunciado->bindParam(5,$agua);
    $enunciado->bindParam(6,$cint);
    $enunciado->bindParam(7,$cad);
    $enunciado->bindParam(8,$braz);
    $enunciado->bindParam(9,$alt);
    $enunciado->bindParam(10,$peso);
    $enunciado->bindParam(11,$imc);
    $enunciado->bindParam(12,$grasa);
    $enunciado->bindParam(13,$bpm);
    $enunciado->bindParam(14,$otros);
    
    $enunciado->execute();

}

?>