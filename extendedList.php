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
    <script src="Assets/javascript/menu.js"></script> <!-- Enlazar el JavaScript -->
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
            <?php 
            try {
                    $conexion = new PDO('mysql:host=127.0.0.1:3306; dbname=nutribase','root','root',);
                    $resultado = $conexion->query('SELECT NOMBRES, APELLIDOS FROM pacientes');
                    foreach($resultado as $row) {
                       echo '
                            <div class="card">
                                <div class="card_head">
                                <a href="dashboard.html">
                                    <img width="32" height="32" src="https://img.icons8.com/windows/64/pin3.png" alt="pin3"/></a> 
                                </div>
                                <div class="card_body"> 
                                    <a href="perfilcliente.html">
                                        <p>'.$row['NOMBRES'].' '.$row['APELLIDOS'].'</p></a>
                                </div>
                                <div class="card_tail">
                                <a href="editarDatos.html">
                                    <img class="pen" width="32" height="32" src="https://img.icons8.com/pastel-glyph/64/pen--v1.png" alt="pen--v1"/></a> 
                                <a href="#">
                                    <img width="32" height="32" src="https://img.icons8.com/windows/64/erase.png" alt="erase"/></a> 
                                </div>
                            </div>           
                       '; 
                    }
                }
                catch (PDOException $e) { echo'error: '.$e->getMessage(); }
            ?>
            
            
            
            
        </div>
        
        
    </div>

</body>
</html>