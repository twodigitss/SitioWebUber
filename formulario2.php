<?php
$nombre = isset($_GET['nombres']) ? $_GET['nombres'] : '';
$urlExtension = "?nombres=" . urlencode($nombre);

if (isset($_POST['registro'])) { // el nombre del boton (submit) es registro 
    $nombre2 = $_POST['yamequieroir'];
    $ante = $_POST['ant'];
    $activ = $_POST['act'];
    $hor = $_POST['horarios'];
    $carb = $_POST['carbohidratos'];
    $agua = $_POST['agua'];
    $cint = $_POST['cintura'];
    $cad = $_POST['cadera']; 
    $braz = $_POST['brazo']; 
    $alt = $_POST['altura']; 
    $peso = $_POST['peso']; 
    $imc = $_POST['imc']; 
    $grasa = $_POST['grasa']; 
    $bpm = $_POST['bpm']; 
    $otros = $_POST['otros']; 

    $conexion = new PDO('mysql:host=localhost:3307;dbname=nutriologia', 'root', 'root');
    $enunciado = $conexion->prepare("INSERT INTO datos_especificos VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $enunciado->bindParam(1, $ante);
    $enunciado->bindParam(2, $activ);
    $enunciado->bindParam(3, $hor);
    $enunciado->bindParam(4, $carb);
    $enunciado->bindParam(5, $agua);
    $enunciado->bindParam(6, $cint);
    $enunciado->bindParam(7, $cad);
    $enunciado->bindParam(8, $braz);
    $enunciado->bindParam(9, $alt);
    $enunciado->bindParam(10, $peso);
    $enunciado->bindParam(11, $imc);
    $enunciado->bindParam(12, $grasa);
    $enunciado->bindParam(13, $bpm);
    $enunciado->bindParam(14, $otros);
    $enunciado->bindParam(15, $nombre2);
    
    $enunciado->execute();
    header("Location: http://localhost/SitioWebUber/perfilcliente.php" . $urlExtension);
    exit();
}

if (isset($_POST['cancel'])) { // el nombre del boton (submit) es cancel 
    header("Location: http://localhost/SitioWebUber/perfilcliente.php" . $urlExtension);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100..900&family=Nunito:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/formulario2.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/menu.css"> <!-- Enlazar el CSS -->
    <script src="menu.js"></script> <!-- Enlazar el JavaScript -->
    <title>Info. Paciente</title>
</head>
<body>
    <header class="panel"> 
        <div class="parte2" id="menu-container"></div> <!-- El menú se cargará aquí -->
        <div class="textletras"> <p class="title">Healthsync</p> </div>     
    </header>
        
    <main>      
        <section>
            <h2>Datos especificos</h2>
            <form action="<?php echo $_SERVER['PHP_SELF'] . $urlExtension; ?>" name="formu2" method="post" class="formulario2"> 
                <input class="input-text" type="hidden" name="yamequieroir" value="<?php echo htmlspecialchars($nombre); ?>">      
                <div class="contenedor-campos">
                    <div class="primera-division">
                        <div class="campo">
                            <label>Antecedentes clínicos: </label>
                            <br>
                            <input class="input-text" type="text" name="ant">
                            <br>
                            <label>Actividad física: </label>
                            <br>
                            <input class="input-text" type="text" name="act">
                            <br>
                            <label>Horarios de comida: </label>
                            <br>
                            <input class="input-text" type="float" name="horarios">
                            <br> 
                            <label>Cantidad de carbohidratos</label>
                            <br>
                            <input class="input-text" type="text" name="carbohidratos">
                            <br>
                            <label>Cantidad de agua</label>
                            <br>
                            <input class="input-text" type="text" name="agua">
                            <br>
                            <label>Cintura</label>
                            <br>
                            <input class="input-text" type="text" name="cintura">
                            <br>
                            <label>Cadera</label>
                            <br>
                            <input class="input-text" type="text" name="cadera">
                        </div>
                    </div>
                    <div class="segunda-division">
                        <div class="campo">   
                            <label>Brazo</label>
                            <br>
                            <input class="input-text" type="text" name="brazo">
                            <br>
                            <label>Altura</label>
                            <br>
                            <input class="input-text" type="text" name="altura">
                            <br>
                            <label>Peso</label>
                            <br>
                            <input class="input-text" type="text" name="peso">
                            <br>
                            <label>IMC </label>
                            <br>
                            <input class="input-text" type="text" name="imc">
                            <br>
                            <label>Grasa Corporal: </label>
                            <br>
                            <input class="input-text" type="integer" name="grasa">
                            <br>
                            <label>BPM </label>
                            <br>
                            <input class="input-text" type="text" name="bpm">
                            <br>
                            <label>Otros factores </label>
                            <br>
                            <input class="input-text" type="text" name="otros">
                        </div>
                    </div>
                </div>
                <input type="submit" name="registro" value="enviar">
                <input type="submit" name="cancel" value="cancelar">
            </form>
        </section>
    </main>
</body>
</html>
