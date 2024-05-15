<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/style.css">
    
</head>
<body>
    
    <header class="panel"> 
        <div class="textletras"> <p class="title">Healthsync</p> </div>     
    </header>

    <div class="contenedor">
        <div class="login">
            <?php
            echo '<form action="recibe.php" method="post">
                    <h1>LOGIN</h1>
                    <label >Usuario:</label>
                    <input type="text" name="User">
                    <label>Contraseña:</label>
                    <input type="password" name="Password">
                    <input type="submit" name="submit" value="Entrar">
                </form>';
            ?>
        </div>
    </div>
</body>
</html>