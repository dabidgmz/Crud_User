<?php
require 'Conexion.php';
$conexion = new Conexion();
$pdo = $conexion->pdo;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])) {
        echo "Error: El nombre no puede contener números.";
        exit();
    }
    if (strlen($_POST['lastname']) > 50) {
        echo "Error: El apellido debe tener máximo 50 caracteres.";
        exit();
    }
    if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
        echo "Error: El correo electrónico no es válido.";
        exit();
    }
    if (strlen($_POST['password']) < 5) {
        echo "Error: La contraseña debe tener al menos 5 caracteres.";
        exit();
    }
    if (strlen($_POST['phone']) !== 10 || !is_numeric($_POST['phone'])) {
        echo "Error: El número de teléfono debe tener 10 dígitos numéricos.";
        exit();
    }
    if (empty($_POST['sex'])) {
        echo "Error: Debe seleccionar un sexo.";
        exit();
    }

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $second_lastname = isset($_POST['second_lastname']) ? $_POST['second_lastname'] : null;
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone = $_POST['phone'];
    $sex = $_POST['sex'];

    $sql = "INSERT INTO User (name, lastname, second_lastname, correo, password, phone, sex)
            VALUES (:name, :lastname, :second_lastname, :correo, :password, :phone, :sex)";

    try {
        $stmt = $pdo->prepare($sql);

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
}
?>
