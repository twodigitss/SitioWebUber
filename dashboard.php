<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/css/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/menu.css"> <!-- Enlazar el CSS -->
    <script src="menu.js"></script> <!-- Enlazar el JavaScript -->
</head>

<body>

    <header class="panel"> 
        <div class="parte2" id="menu-container"></div> <!-- El menú se cargará aquí -->
        <div class="textletras"> <p class="title">Healthsync</p> </div>     
    </header>

    <div class="dashboard">
        <div class="profile">
            <div class="profilepicture">
                <img src="Assets/img/ejemplo.jpg">
                <p class="centeredTitle">Diana Rosales Espinoza<br></p>
            </div>
            <div class="profileabout">
                <div class="bio">
                    <p class="centeredTitle">Biografia:<br></p>
                    <p class="normalParagraph"> La Dra. Diana Rosales es una apasionada nutrióloga dedicada a promover
                        la salud y el bienestar a través de una alimentación equilibrada y un estilo de vida saludable.
                        Con más de 10 años de experiencia en el campo de la nutrición, la Dra. Martínez ha ayudado a
                        numerosos pacientes a alcanzar sus objetivos de salud y a mejorar su calidad de vida.</p>
                </div>
                <div class="studies">
                    <p class="centeredTitle">Formacion Academica:<br></p>
                    <p class="normalParagraph"> La Dra. Martínez ha trabajado en una variedad de entornos clínicos y
                        comunitarios, incluyendo hospitales, consultorios privados y organizaciones sin fines de lucro.
                        Ha desarrollado programas de nutrición personalizados para una amplia gama de pacientes, desde
                        aquellos con enfermedades crónicas hasta atletas de alto rendimiento.</p>
                </div>

            </div>

        </div>

        <div class="client_Card">
            <div class="card">
                <div class="card_head">
                    <div class="add_register_txt">
                        <p> Crear un registro. </p>
                    </div>
                </div>
                <a class="plusSymbol" href="formulario1.html"> <!-- Aqui poner link otro html-->
                    <div id="plusSymbolChar" class="card_footer">+</div>
                </a>
            </div>
            <!--HERE STARTS FETCHING FOR VALUES ON DATABASE-->
            <?php
                try {
                    //TODO: with perfil cliente, make it able to accept variables and paste them on the fields
                    //just like i did on dashboard
                    $host="localhost:3307"; $database="nutriologia"; 
                    $tabla="datos";

                    $conexion = new PDO("mysql:host=$host; dbname=$database", 'root', 'root');
                    $resultado = $conexion->query("SELECT * FROM $tabla");
                    $resultado->setFetchMode(PDO::FETCH_ASSOC); //devuelve un arreglo asociativo

                    // <a href=''> <img src='https://img.icons8.com/windows/64/pin3.png' /></a>

                    foreach($resultado as $row) {
                        $nombres = $row['nombre'];
                        $urlExtension = "?nombres=".urlencode($nombres);
                        $ruta="perfilcliente.php$urlExtension";
                        print("
                        <div class='card'>
                                <div class='card_head'>
                                    <img class='image' src='Assets/img/empty-user.png'>
                                    <div class='existing_reg'>
                                        <a href='$ruta'> $nombres </a>
                                    </div>
                                </div>
                            <div class='card_footer'>
                               
                                <a href='DatosEditar.php$urlExtension'><img src='https://img.icons8.com/pastel-glyph/64/pen--v1.png' /></a>
                                <a href='eliminarpaciente.php$urlExtension'><img src='https://img.icons8.com/windows/64/erase.png' /></a>
                            </div>
                        </div>");
                        
                    }
                } 
                catch (PDOException $e) {
                    echo'error: '.$e->getMessage();
                }        
            
            ?>

        </div>


    </div>


</body>

</html>