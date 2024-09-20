<div class="container-full">
    <!-- Contenedor del título y botón -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Gestión de Niveles Educativos</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarNivel">
            <i class="bi bi-plus-lg"></i> Agregar Nivel
        </button>
    </div>
    <p>Aquí puedes agregar, editar o eliminar niveles educativos.</p>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        
        </a>
        <!-- Tabla de Niveles -->
        <table id="nivelTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Nivel</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="nivelTableBody">
                <!-- Aquí se llenarán los niveles desde el AJAX -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Agregar Nivel -->
<div class="modal fade" id="modalAgregarNivel" tabindex="-1" aria-labelledby="modalAgregarNivelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarNivelLabel">Agregar Nivel Educativo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAgregarNivel">
                    <div class="mb-3">
                        <label for="nombreNivel" class="form-label">Nombre del Nivel</label>
                        <input type="text" class="form-control" id="nombreNivel" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Nivel -->
<div class="modal fade" id="modalEditarNivel" tabindex="-1" aria-labelledby="modalEditarNivelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarNivelLabel">Editar Nivel Educativo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarNivel">
                    <input type="hidden" id="editarNivelId">
                    <div class="mb-3">
                        <label for="editarNombreNivel" class="form-label">Nombre del Nivel</label>
                        <input type="text" class="form-control" id="editarNombreNivel" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.1.6/js/dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Inicializar DataTable
        let tabla = $('#nivelTable').DataTable({
            responsive: true,
            searching: true,  // Activar búsqueda
            paging: true,
            info: false,
            pageLength: 10,  // Establecer 15 elementos por página
            autoWidth: false,  // Ajuste automático de columnas
            language: {
                url: '<?= base_url("/assets/js/es-CL.json") ?>'  // Ruta local del archivo JSON
            }
        });

        // Cargar niveles al iniciar la página
        cargarNiveles();

        // Agregar nivel
        $('#formAgregarNivel').submit(function(e) {
            e.preventDefault();
            let nombreNivel = $('#nombreNivel').val();

            $.ajax({
                url: '/api/niveles',  // Cambiar por la ruta de tu API
                method: 'POST',
                data: { nombre: nombreNivel },
                success: function(response) {
                    $('#modalAgregarNivel').modal('hide');
                    cargarNiveles();
                    Swal.fire('Éxito', 'Nivel agregado correctamente', 'success');
                },
                error: function(xhr) {
                    Swal.fire('Error', 'No se pudo agregar el nivel', 'error');
                }
            });
        });

        // Editar nivel
        $('#formEditarNivel').submit(function(e) {
            e.preventDefault();
            let id = $('#editarNivelId').val();
            let nombreNivel = $('#editarNombreNivel').val();

            $.ajax({
                url: `/api/niveles/${id}`,  // Cambiar por la ruta de tu API
                method: 'PUT',
                data: { nombre: nombreNivel },
                success: function(response) {
                    $('#modalEditarNivel').modal('hide');
                    cargarNiveles();
                    Swal.fire('Éxito', 'Nivel actualizado correctamente', 'success');
                },
                error: function(xhr) {
                    Swal.fire('Error', 'No se pudo actualizar el nivel', 'error');
                }
            });
        });

        // Cargar niveles desde la API
        function cargarNiveles() {
            $.ajax({
                url: '/api/niveles',
                method: 'GET',
                success: function(response) {
                    let niveles = response;
                    tabla.clear();  // Limpiar la tabla antes de recargar

                    niveles.forEach(function(nivel) {
                        tabla.row.add([
                            nivel.id,
                            nivel.nombre,
                            `<div class="btn-group">
                                <button class="btn btn-sm btn-warning" onclick="editarNivel(${nivel.id}, '${nivel.nombre}')">Editar</button>
                                <button class="btn btn-sm btn-danger" onclick="eliminarNivel(${nivel.id})">Eliminar</button>
                            </div>`
                        ]).draw();
                    });
                }
            });
        }

        // Eliminar nivel
        window.eliminarNivel = function(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/niveles/${id}`,  // Cambiar por la ruta de tu API
                        method: 'DELETE',
                        success: function() {
                            cargarNiveles();
                            Swal.fire('Eliminado', 'El nivel ha sido eliminado', 'success');
                        },
                        error: function() {
                            Swal.fire('Error', 'No se pudo eliminar el nivel', 'error');
                        }
                    });
                }
            });
        }

        // Cargar datos en el modal de edición
        window.editarNivel = function(id, nombre) {
            $('#editarNivelId').val(id);
            $('#editarNombreNivel').val(nombre);
            $('#modalEditarNivel').modal('show');
        }
    });
</script>
