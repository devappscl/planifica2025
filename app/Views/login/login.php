<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <!-- Mostrar mensajes de error si existen -->
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <form id="loginForm">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#loginForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/users/login',  // URL de la API
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.token) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login exitoso',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            if (response.nivel == 7) {
                                window.location.href = '/admin/home';  // Redirigir al admin si es nivel 7
                            } else {
                                window.location.href = '/user/home';  // Redirigir al home de usuario
                            }
                        });
                    }
                },
                error: function(xhr) {
                    var response = xhr.responseJSON || {};
                    var message = response.messages ? response.messages.error : 'Ha ocurrido un error. Intenta nuevamente.';
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: message
                    });
                }
            });
        });

    </script>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
