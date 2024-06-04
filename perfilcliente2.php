<?php
    $nombre = isset($_GET['nombres']) ? $_GET['nombres'] : '';
    #$apellido = isset($_GET['apellidos']) ? $_GET['apellidos'] : '';
    $urlExtension="?nombres=".urlencode($nombre);

    $host="localhost:3307"; $database="nutriologia"; 
    $tabla="datos_especificos";
    $tabla2="datos";
                     
    $conexion = new PDO("mysql:host=$host; dbname=$database", 'root', 'root');
    $enunciado = $conexion->prepare("SELECT * FROM $tabla WHERE nombre = ?");
    $enunciado->bindParam(1,$nombre);
    #$enunciado->bindParam(2,$apellido);
    $enunciado->execute();

    $enunciado2 = $conexion->prepare("SELECT * FROM $tabla2 WHERE nombre = ?");
    $enunciado2->bindParam(1,$nombre);
    $enunciado2->execute();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/perfilcliente2.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/menu.css"> <!-- Enlazar el CSS -->
    <script src="menu.js"></script> <!-- Enlazar el JavaScript -->

    </style>
</head>
<body>
    <header class="panel"> 
        <div class="parte2" id="menu-container"></div> <!-- El menú se cargará aquí -->
        <div class="textletras"> <p class="title">Healthsync</p> </div>     
    </header>

    <main class="menu-principal contenedor">
        <div class="cuadro">
            <div class="acomodo">
                <img src="Assets/img/empty-user.png" alt="persona">
                <div class="modificar botones">
                    <a href="DatosEditar.php<?php print($urlExtension);?>">Modificar Datos</a>
                </div>
                <div class="eliminar botones">
                    <a href="eliminarpaciente.php<?php print($urlExtension)?>">Eliminar Perfil</a>
                </div>
            </div>
            <div class="texto">
                    <?php
                    foreach ($enunciado2 as $row) {
                        echo "<h3>Nombre: ".$row['nombre']."</h3>";
                        echo "<p>Edad: ".$row['edad']."</p>";
                        echo "<p>Sexo: ".$row['sexo']."</p>";
                        echo "<p>Ocupacion: ".$row['ocupacion']."</p>";
                        echo "<p>Estado civil: ".$row['estado_civil']."</p>";
                        echo "<p>Telefono: ".$row['telefono']."</p>";
                        echo "<p>Email: ".$row['correo']."</p>";
                        echo "<p>Dirección: ".$row['direccion']."</p>";
                    }
                    ?>
            </div>
        </div>
        <div class="grid-three-column contenedor">
            <div class="botones2">
                <a href="formulario2.php<?php print($urlExtension);?>">Consulta</a>
                <a href="perfilcliente.php<?php print($urlExtension)?>">Mostrar Bitacora</a>
            </div>
        </div>
    </main>

    <table class="tabla contenedor">
        <tr>
            <th>antecedentes</th>
            <th>actividades</th>
            <th>horarios</th>
            <th>carbohidratos</th>
            <th>agua</th>
            <th>cintura</th>
            <th>cadera</th>
            <th>brazo</th>
            <th>altura</th>
            <th>peso</th>
            <th>imc</th>
            <th>grasa</th>
            <th>bpm</th>
            <th>otros</th>
        </tr>
        <?php
        while($row = $enunciado->fetch()){
            echo '<tr>
                <td>'.$row['antecedentes'].'</td>
                <td>'.$row['actividades'].'</td>
                <td>'.$row['horarios'].'</td>
                <td>'.$row['carbohidratos'].'</td>
                <td>'.$row['agua'].'</td>
                <td>'.$row['cintura'].'</td>
                <td>'.$row['cadera'].'</td>
                <td>'.$row['brazo'].'</td>
                <td>'.$row['altura'].'</td>
                <td>'.$row['peso'].'</td>
                <td>'.$row['imc'].'</td>
                <td>'.$row['grasa'].'</td>
                <td>'.$row['bpm'].'</td>
                <td>'.$row['otros'].'</td>
                </tr>';
        }
        ?>
    </table>
</body>
</html>