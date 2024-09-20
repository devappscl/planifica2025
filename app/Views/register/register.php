<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Registro de Usuario</h4>
                    </div>
                    <div class="card-body">
                        <form id="registerForm">
                            <div class="form-group">
                                <label for="nombres">Nombres:</label>
                                <input type="text" id="nombres" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="papellido">Primer Apellido:</label>
                                <input type="text" id="papellido" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="sapellido">Segundo Apellido:</label>
                                <input type="text" id="sapellido" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" id="password" class="form-control" required minlength="8">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $('#registerForm').on('submit', function (e) {
                e.preventDefault();

                var formData = {
                    email: $('#email').val(),
                    password: $('#password').val(),
                    nombres: $('#nombres').val(),
                    papellido: $('#papellido').val(),
                    sapellido: $('#sapellido').val()
                };

                $.ajax({
                    url: '<?= base_url("/api/users/register") ?>',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                    success: function (response) {
                        if (response.message === 'User registered successfully') {
                            Swal.fire({
                                title: 'Registro Exitoso',
                                text: 'Por favor revisa tu email para confirmar tu cuenta.',
                                icon: 'success',
                                confirmButtonText: 'Aceptar'
                            }).then(() => {
                                window.location.href = '<?= base_url("/web/login") ?>';
                            });
                        } else {
                            Swal.fire({
                                title: 'Error en el Registro',
                                text: JSON.stringify(response),
                                icon: 'error',
                                confirmButtonText: 'Aceptar'
                            });
                        }
                    },
                    error: function (error) {
                        Swal.fire({
                            title: 'Error',
                            text: 'Ocurrió un error en el registro',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
