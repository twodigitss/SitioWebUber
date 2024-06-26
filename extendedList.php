<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/css/extendedList.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Assets/css/menu.css"> <!-- Enlazar el CSS -->
    <script src="menu.js"></script> <!-- Enlazar el JavaScript -->
    <style> <!-- wtf por que? -->
        .panel{
            font-family: "Fira Sans", sans-serif;
            font-size: 2rem; font-weight: 500;
            background-color: var(--col_main);
            height: 3.5rem;
            
            display: flex; 
            align-items: center;
            padding: 0px 10px 0px 15px ;
            margin-bottom: 10px;
            border: 0px solid #010101;
            border-radius: 0px;

            .parte2{
                width: 15%;
                background-color: none;
            }
            .textletras{
                width: 85%;
                align-items: center;
                justify-content: center;
                .title{
                    padding-left: 10px;
                    color: var(--text);
                    text-align: center; 
                    align-items: center;
                }
            }
        }
        @media (min-width:768px) {
            .panel{
                .parte2{
                    width: 10%;
                }
                .textletras{
                    width: 90%;
                }
            }
        }
        @media (min-width:1200px) {
            .panel{
                .parte2{
                    width: 4%;
                }
                .textletras{
                    width: 90%;
                }
            }
        }
    </style>
</head>
<body>
    <header class="panel"> 
        <div class="parte2" id="menu-container"></div> <!-- El menú se cargará aquí -->
        <div class="textletras"> <p class="title">Healthsync</p> </div>     
    </header>

    <div class="mainBody">
        <div class="searchAndFilters">
            <div class="mainSearchFrame">
                <div class="searchbar">
                    <!--p> pacientes barra buscar </p-->
                    <input class="searchField" type="text" placeholder="Ingrese un nombre o un apellido">
                </div>
            </div>
        </div>
        <div class="extendedRegList">
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

                    foreach($resultado as $row) {
                        $nombres = $row['nombre']; $ruta="perfilcliente.php"; 
                        $urlExtension="?nombres=".urlencode($nombres);
                        print("
                        <div class='card'>
                                <div class='card_body'> 
                                    <a href='$ruta$urlExtension'>
                                        <p> $nombres </p></a>
                                </div>
                                <div class='card_tail'>
                                <a href='DatosEditar.php$urlExtension'>
                                    <img class='pen' width='32' height='32' src='https://img.icons8.com/pastel-glyph/64/pen--v1.png'/></a> 
                                <a href='eliminarpaciente.php$urlExtension'>
                                    <img width='32' height='32' src='https://img.icons8.com/windows/64/erase.png'/></a> 
                                </div>
                            </div>       
                            ");
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