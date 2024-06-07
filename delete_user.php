<?php
require 'Conexion.php';

$conexion = new Conexion();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM User WHERE id = :id";

    try {
        $stmt = $conexion->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: index_user.php");
        exit();
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
