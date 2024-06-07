<?php
require 'Conexion.php';
$conexion = new Conexion();
$pdo = $conexion->pdo; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $second_lastname = isset($_POST['second_lastname']) ? $_POST['second_lastname'] : null;
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone = $_POST['phone'];
    $sex = $_POST['sex'];
    $sql = "UPDATE User SET name = :name, lastname = :lastname, second_lastname = :second_lastname,
            correo = :correo, password = :password, phone = :phone, sex = :sex WHERE id = :id";

    try {
        // Preparar la consulta
        $stmt = $pdo->prepare($sql);

        // Vincular los parámetros
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':second_lastname', $second_lastname);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':sex', $sex);

        $stmt->execute();

        header("Location: index_user.php");
        exit();
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
} else {
    header("Location: index_user.php");
    exit();
}
?>
