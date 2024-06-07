<?php
require 'Conexion.php';

$conexion = new Conexion();

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "SELECT * FROM User WHERE id = :id";
        $stmt = $conexion->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user) {
            $name = $user['name'];
            $lastname = $user['lastname'];
            $second_lastname = $user['second_lastname'];
            $correo = $user['correo'];
            $phone = $user['phone'];
            $sex = $user['sex'];
        } else {
            header("Location: index_user.php");
            exit();
        }
    } catch(PDOException $error) {
        echo "Error: ".$error->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #custom_sex_container {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Usuario</h2>
        <form action="update_user.php" method="post" class="row g-3 needs-validation" novalidate>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="col-md-4">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                <div class="invalid-feedback">
                    Por favor ingrese su nombre.
                </div>
            </div>
            <div class="col-md-4">
                <label for="lastname" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required>
                <div class="invalid-feedback">
                    Por favor ingrese su apellido.
                </div>
            </div>
            <div class="col-md-4">
                <label for="lastname" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="second_lastname" name="second_lastname" value="<?php echo $second_lastname; ?>" required>
                <div class="invalid-feedback">
                    Por favor ingrese su apellido.
                </div>
            </div>
            <div class="col-md-4">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo; ?>" required>
                <div class="invalid-feedback">
                    Por favor ingrese un correo válido.
                </div>
            </div>
            <div class="col-md-4">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="invalid-feedback">
                    Por favor ingrese una contraseña.
                </div>
            </div>
            <div class="col-md-4">
                <label for="phone" class="form-label">Teléfono:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required>
                <div class="invalid-feedback">
                    Por favor ingrese su número de teléfono.
                </div>
            </div>
            <div class="col-md-4">
                <label for="sex" class="form-label">Sexo:</label>
                <select id="sex" name="sex" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="hombre" <?php if ($sex === 'hombre') echo 'selected'; ?>>Hombre</option>
                    <option value="mujer" <?php if ($sex === 'mujer') echo 'selected'; ?>>Mujer</option>
                    <option value="otro" <?php if ($sex === 'otro') echo 'selected'; ?>>Otro</option>
                </select>
                <div class="invalid-feedback">
                    Por favor seleccione su sexo.
                </div>
            </div>
            <div class="col-md-4" id="custom_sex_container">
                <label for="custom_sex" class="form-label">Especifique su sexo:</label>
                <input type="text" class="form-control" id="custom_sex" name="custom_sex">
                <div class="invalid-feedback">
                    Por favor ingrese su sexo si seleccionó "Otro".
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Editar Usuario</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('sex').addEventListener('change', function() {
            var customSexContainer = document.getElementById('custom_sex_container');
            if (this.value === 'otro') {
                customSexContainer.style.display = 'block';
                document.getElementById('custom_sex').required = true;
            } else {
                customSexContainer.style.display = 'none';
                document.getElementById('custom_sex').required = false;
            }
        });
    </script>
</body>
</html>
