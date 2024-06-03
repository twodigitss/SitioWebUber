<?php
$nombre = isset($_GET['nombres']) ? $_GET['nombres'] : '';
$urlExtension = "?nombres=" . urlencode($nombre);

$conexion = new PDO('mysql:host=localhost:3307; dbname=nutriologia', 'root', 'root');
$enunciado2 = $conexion->prepare("SELECT * FROM datos WHERE nombre = ?");
$enunciado2->bindParam(1, $nombre);
$enunciado2->execute();

if (isset($_POST['submit'])) {
    try {
        $nombre2 = $_POST['nombre2'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $ocupacion = $_POST['ocupacion'];
        $estado = $_POST['estado'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];

        $conexion2 = new PDO('mysql:host=localhost:3307; dbname=nutriologia', 'root', 'root');
        $enunciado = $conexion2->prepare("UPDATE datos SET nombre=?, edad=?, sexo=?, ocupacion=?, estado_civil=?, telefono=?, correo=?, direccion=? WHERE nombre=?");
        $enunciado->bindParam(1, $nombre2);
        $enunciado->bindParam(2, $edad);
        $enunciado->bindParam(3, $sexo);
        $enunciado->bindParam(4, $ocupacion);
        $enunciado->bindParam(5, $estado);
        $enunciado->bindParam(6, $telefono);
        $enunciado->bindParam(7, $correo);
        $enunciado->bindParam(8, $direccion);
        $enunciado->bindParam(9, $nombre);
        $enunciado->execute();

        header('Location: http://localhost/SitioWebUber/perfilcliente.php' . $urlExtension);
        
    } catch (PDOException $e) {
        echo "error: " . $e->getMessage();
    }
}

if (isset($_POST['submit2'])) {
    header('Location: http://localhost/SitioWebUber/perfilcliente.php' . $urlExtension);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthsync</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;400;700&family=Nunito:wght@200;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/editarDatos.css">
    <script src="Assets/javascript/DosDigitos.js"></script>
    <link rel="stylesheet" type="text/css" href="Assets/css/menu.css">
    <script src="menu.js"></script>
</head>
<body>
    <header class="panel"> 
        <div class="parte2" id="menu-container"></div>
        <div class="textletras"> <p class="title">Healthsync</p> </div>     
    </header>

    <form action="<?php echo $_SERVER['PHP_SELF'] . $urlExtension; ?>" method="post">
        <?php
        foreach ($enunciado2 as $row) {
            echo "<div class='editar-datos'>Editar Datos</div>
            <div class='casillaTexto'>
                <label for='nombre2' class='label'>Nombre Completo:</label>
                <br>
                <input type='text' id='nombre2' class='cuadroTexto' name='nombre2' value='" . htmlspecialchars($row['nombre'], ENT_QUOTES, 'UTF-8') . "'>
            </div>
    
            <div class='casillaTexto'>
                <label for='edad' class='label'>Edad:</label>
                <br>
                <input type='number' id='limited-number' oninput='limitInput(event)' class='cuadroTexto' min='0' name='edad' value='" . htmlspecialchars($row['edad'], ENT_QUOTES, 'UTF-8') . "'>
            </div>
    
            <div class='casillaTexto'>
                <label for='sexo' class='label'>Sexo:</label>
                <br>
                <input type='text' id='sexo' class='cuadroTexto' placeholder='' name='sexo' value='" . htmlspecialchars($row['sexo'], ENT_QUOTES, 'UTF-8') . "'>
            </div>
    
            <div class='casillaTexto'>
                <label for='ocupacion' class='label'>Ocupación:</label>
                <br>
                <input type='text' id='ocupacion' class='cuadroTexto' placeholder='' name='ocupacion' value='" . htmlspecialchars($row['ocupacion'], ENT_QUOTES, 'UTF-8') . "'>
            </div>
    
            <div class='casillaTexto'>
                <label for='estado' class='label'>Estado Civil:</label>
                <br>
                <select id='estado' name='estado'>
                    <option value='' selected disabled hidden>" . htmlspecialchars($row['estado_civil'], ENT_QUOTES, 'UTF-8') . "</option>
                    <option value='soltero(a)'>Soltero(a)</option>
                    <option value='casado(a)'>Casado(a)</option>
                    <option value='divorciado(a)'>Divorciado(a)</option>
                    <option value='viudo(a)'>Viudo(a)</option>
                </select>
            </div>
    
            <div class='casillaTexto'>
                <label for='telefono' class='label'>Teléfono:</label>
                <br>
                <input type='text' id='telefono' class='cuadroTexto' placeholder='' name='telefono' value='" . htmlspecialchars($row['telefono'], ENT_QUOTES, 'UTF-8') . "'>
            </div>
    
            <div class='casillaTexto'>
                <label for='correo' class='label'>Correo Electrónico:</label>
                <br>
                <input type='text' id='correo' class='cuadroTexto' placeholder='' name='correo' value='" . htmlspecialchars($row['correo'], ENT_QUOTES, 'UTF-8') . "'>
            </div>
    
            <div class='casillaTexto'>
                <label for='direccion' class='label'>Dirección:</label>
                <br>
                <input type='text' id='direccion' class='cuadroTexto' placeholder='' name='direccion' value='" . htmlspecialchars($row['direccion'], ENT_QUOTES, 'UTF-8') . "'>
            </div>
    
            <br>
            <br>
            <br>
    
            <div class='contenedorBotones'>
                <div class='grid3'>
                    <input type='submit' name='submit' value='Finalizar'>
                </div>
    
                <div class='grid4'>
                    <input type='submit' name='submit2' value='Cancelar'>
                </div>
            </div>";
        }
        ?>
    </form>
</body>
</html>
