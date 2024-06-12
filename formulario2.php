<?php
// Obtener el nombre de forma segura desde la URL
$nombre = isset($_GET['nombres']) ? htmlspecialchars($_GET['nombres']) : '';

// Construir la extensión de la URL para mantener el nombre en los redireccionamientos
$urlExtension = "?nombres=" . urlencode($nombre);

// Procesar el formulario cuando se envíe
if (isset($_POST['registro'])) { 
    // Recopilar datos del formulario de manera segura
    $nombre2 = htmlspecialchars($_POST['yamequieroir']);
    $ante = htmlspecialchars($_POST['ant']);
    $activ = htmlspecialchars($_POST['act']);
    $hor = htmlspecialchars($_POST['horarios']);
    $carb = htmlspecialchars($_POST['carbohidratos']);
    $agua = htmlspecialchars($_POST['agua']);
    $cint = htmlspecialchars($_POST['cintura']);
    $cad = htmlspecialchars($_POST['cadera']); 
    $braz = htmlspecialchars($_POST['brazo']); 
    $alt = htmlspecialchars($_POST['altura']); 
    $peso = htmlspecialchars($_POST['peso']); 
    $imc = htmlspecialchars($_POST['imc']); 
    $grasa = htmlspecialchars($_POST['grasa']); 
    $bpm = htmlspecialchars($_POST['bpm']); 
    $otros = htmlspecialchars($_POST['otros']); 

    // Establecer conexión a la base de datos
    $conexion = new PDO('mysql:host=localhost:3307;dbname=nutriologia', 'root', 'root');
    
    // Preparar la consulta SQL para inserción
    $enunciado = $conexion->prepare("INSERT INTO datos_especificos VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Vincular parámetros y ejecutar la consulta
    $enunciado->execute([$ante, $activ, $hor, $carb, $agua, $cint, $cad, $braz, $alt, $peso, $imc, $grasa, $bpm, $otros, $nombre2]);
    
    // Redirigir al usuario después de procesar el formulario
    header("Location: http://localhost/SitioWebUber/perfilcliente.php" . $urlExtension);
    exit();
}

// Redirigir si se cancela el formulario
if (isset($_POST['cancel'])) { 
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
    <link rel="stylesheet" type="text/css" href="Assets/css/menu.css"> 
    <script src="menu.js"></script> 
    <title>Información del Paciente</title>
</head>
<body>
    <header class="panel"> 
        <div class="parte2" id="menu-container"></div> 
        <div class="textletras"> <p class="title">Healthsync</p> </div>     
    </header>
        
    <main class="contenedor">      
        <section>
            <h2>Datos Específicos</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . $urlExtension); ?>" name="formu2" method="post" class="formulario2"> 
                <input class="input-text" type="hidden" name="yamequieroir" value="<?php echo $nombre; ?>">      
                <div class="contenedor-campos contenedor">
                    <div class="primera-division">
                        <div class="campo">
                            <div class="campo2">
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
                    </div>
                    <div class="segunda-division">
                        <div class="campo">   
                            <div class="campo2">
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
                </div>
                <div class="botn">
                    <input class='botn1' type="submit" name="registro" value="Enviar">
                    <input class='botn1' type="submit" name="cancel" value="Cancelar">
                </div>
            </form>
        </section>
    </main>
</body>
</html>
