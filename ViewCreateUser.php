<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
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
        <h2>Crear Usuario</h2>
        <form action="create_user.php" method="post" class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <div class="invalid-feedback">
                    Por favor ingrese su nombre.
                </div>
            </div>
            <div class="col-md-4">
                <label for="lastname" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
                <div class="invalid-feedback">
                    Por favor ingrese su apellido.
                </div>
            </div>
            <div class="col-md-4">
                <label for="lastname" class="form-label">Segundo Apellido:</label>
                <input type="text" class="form-control" id="second_lastname" name="second_lastname" required>
                <div class="invalid-feedback">
                    Por favor ingrese su  segundo apellido.
                </div>
            </div>
            <div class="col-md-4">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
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
                <input type="text" class="form-control" id="phone" name="phone" required>
                <div class="invalid-feedback">
                    Por favor ingrese su número de teléfono.
                </div>
            </div>
            <div class="col-md-4">
                <label for="sex" class="form-label">Sexo:</label>
                <select id="sex" name="sex" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="hombre">Hombre</option>
                    <option value="mujer">Mujer</option>
                    <option value="otro">Otro</option>
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
                <button type="submit" class="btn btn-primary">Crear Usuario</button>
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
