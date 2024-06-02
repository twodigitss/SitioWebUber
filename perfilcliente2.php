<?php
    $nombre = isset($_GET['nombres']) ? $_GET['nombres'] : '';
    #$apellido = isset($_GET['apellidos']) ? $_GET['apellidos'] : '';
    $urlExtension="?nombres=".urlencode($nombre);

    $host="127.0.0.1:3306"; $database="nutribase"; 
    $tabla="pacientes";
                     
    $conexion = new PDO("mysql:host=$host; dbname=$database", 'root', 'root');
    $enunciado = $conexion->prepare("SELECT * FROM $tabla WHERE NOMBRES = ?");
    $enunciado->bindParam(1,$nombre);
    #$enunciado->bindParam(2,$apellido);
    $enunciado->execute();
    $i = 0;
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
    <link rel="stylesheet" href="assets/css/perfilcliente2.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/menu.css"> <!-- Enlazar el CSS -->
    <script src="menu.js"></script> <!-- Enlazar el JavaScript -->
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
                    <a href="editarDatos.html<?php print($urlExtension)?>">Modificar Datos</a>
                </div>
                <div class="eliminar botones">
                    <a href="eliminarpaciente.php<?php print($urlExtension)?>">Eliminar Perfil</a>
                </div>
            </div>
            <div class="texto">
                <section class="centrado">
                    <h3><?php print("$nombre");?></h3>
                    <p>Ocupacion: Profesora</p>
                    <p>Edad: 20</p>
                    <p>Telefono: 4531552467</p>
                    <p>Email: al21020013@itsa.edu.mx</p>
                </section>
            </div>
        </div>
        <div class="grid-three-column contenedor">
            <div class="botones2">
                <a href="formulario2.html">Consulta</a>
                <a href="perfilcliente.php<?php print($urlExtension)?>">Mostrar Bitacora</a>
            </div>
        </div>
    </main>

    <section class="contenedor">
        <table class="tabla">
            <tr>
                <th>ID</th>
                <th>Nutricionista</th>
                <th>Nombre</th>
            </tr>
            <?php
            while($row = $enunciado->fetch()){
                echo '<tr>
                    <td>'.$row['ID'].'</td>
                    <td>'.$row['NUTRICIONISTA'].'</td>
                    <td>'.$row['NOMBRES'].'</td>
                    </tr>';
            }
            ?>
        </table>
    </section>
</body>
</html>