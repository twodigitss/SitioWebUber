<?php
try {
    // Enable error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Get the 'nombres' parameter from the query string
    $nombre = isset($_GET['nombres']) ? $_GET['nombres'] : '';

    // Database connection parameters
    $host = "localhost:3307";
    $database = "nutriologia";
    $tabla = "datos";

    // Create a new PDO instance
    $conexion = new PDO("mysql:host=$host;dbname=$database", 'root', 'root');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement with a placeholder for the 'nombres' value
    $sql = "DELETE FROM $tabla WHERE nombre = :nombre";
    $stmt = $conexion->prepare($sql);

    // Bind the 'nombres' value to the placeholder
    $stmt->bindParam(':nombre', $nombre);

    // Execute the prepared statement
    $stmt->execute();

    // Redirect to the dashboard page
    header('Location: http://localhost/SitioWebUber/dashboard.php');
    exit(); // Ensure the script stops after redirection
} catch (PDOException $e) {
    // Handle any errors
    echo "Error: " . $e->getMessage();
}
?>
