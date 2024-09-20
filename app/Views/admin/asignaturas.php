<div class="container-full">
    <h1>Gestión de Asignaturas</h1>
    <p>Aquí puedes agregar, editar o eliminar asignaturas educativas.</p>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAgregarAsignatura">
            <i class="bi bi-plus"></i> Agregar Asignatura
        </button>

        <!-- Tabla de Asignaturas -->
        <table id="asignaturaTable" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de la Asignatura</th>
                    <th>Nivel</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="asignaturaTableBody">
                <!-- Aquí se llenarán las asignaturas desde el AJAX -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Agregar Asignatura -->
<div class="modal fade" id="modalAgregarAsignatura" tabindex="-1" aria-labelledby="modalAgregarAsignaturaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarAsignaturaLabel">Agregar Asignatura</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAgregarAsignatura">
                    <div class="mb-3">
                        <label for="nombreAsignatura" class="form-label">Nombre de la Asignatura</label>
                        <input type="text" class="form-control" id="nombreAsignatura" required>
                    </div>
                    <div class="mb-3">
                        <label for="nivelAsignatura" class="form-label">Nivel</label>
                        <select id="nivelAsignatura" class="form-control" required>
                            <!-- Aquí se cargarán los niveles educativos vía AJAX -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Asignatura -->
<div class="modal fade" id="modalEditarAsignatura" tabindex="-1" aria-labelledby="modalEditarAsignaturaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarAsignaturaLabel">Editar Asignatura</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarAsignatura">
                    <input type="hidden" id="editarAsignaturaId">
                    <div class="mb-3">
                        <label for="editarNombreAsignatura" class="form-label">Nombre de la Asignatura</label>
                        <input type="text" class="form-control" id="editarNombreAsignatura" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarNivelAsignatura" class="form-label">Nivel</label>
                        <select id="editarNivelAsignatura" class="form-control" required>
                            <!-- Aquí se cargarán los niveles educativos vía AJAX -->
                        </select>
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
        let tabla = $('#asignaturaTable').DataTable({
            responsive: true,
            searching: true,
            paging: true,
            info: false,
            pageLength: 10,  // Establecer 15 elementos por página
            autoWidth: false,
            language: {
                url: '<?= base_url("/assets/js/es-CL.json") ?>'  // Ruta local del archivo JSON
            }
        });

        // Cargar asignaturas al iniciar la página
        cargarAsignaturas();
        cargarNiveles();  // Para el select de niveles

        // Agregar asignatura
        $('#formAgregarAsignatura').submit(function(e) {
            e.preventDefault();
            let nombreAsignatura = $('#nombreAsignatura').val();
            let nivelAsignatura = $('#nivelAsignatura').val();

            $.ajax({
                url: '/api/asignaturas',
                method: 'POST',
                data: { nombre: nombreAsignatura, nivel_id: nivelAsignatura },
                success: function(response) {
                    $('#modalAgregarAsignatura').modal('hide');
                    cargarAsignaturas();
                    Swal.fire('Éxito', 'Asignatura agregada correctamente', 'success');
                },
                error: function(xhr) {
                    Swal.fire('Error', 'No se pudo agregar la asignatura', 'error');
                }
            });
        });

        // Editar asignatura
        $('#formEditarAsignatura').submit(function(e) {
            e.preventDefault();
            let id = $('#editarAsignaturaId').val(); // Asegúrate de obtener el ID aquí
            let nombreAsignatura = $('#editarNombreAsignatura').val();
            let nivelAsignatura = $('#editarNivelAsignatura').val();

            $.ajax({
                url: `/api/asignaturas/${id}`,  // Usamos el ID en la URL para actualizar la asignatura correcta
                method: 'PUT',
                data: { nombre: nombreAsignatura, nivel_id: nivelAsignatura }, // Datos que se envían en el cuerpo de la solicitud
                success: function(response) {
                    $('#modalEditarAsignatura').modal('hide');
                    cargarAsignaturas(); // Recargamos la tabla de asignaturas
                    Swal.fire('Éxito', 'Asignatura actualizada correctamente', 'success');
                },
                error: function(xhr) {
                    Swal.fire('Error', 'No se pudo actualizar la asignatura', 'error');
                }
            });
        });

        // Cargar asignaturas desde la API
        function cargarAsignaturas() {
            $.ajax({
                url: '/api/asignaturas',
                method: 'GET',
                success: function(asignaturas) {
                    tabla.clear();

                    // Cargar los nombres de los niveles para mostrarlos en la tabla
                    cargarNiveles(function(niveles) {
                        asignaturas.forEach(function(asignatura) {
                            let nivel = niveles.find(nivel => nivel.id == asignatura.id_niveleducativo);
                            let nombreNivel = nivel ? nivel.nombre : 'Desconocido';

                            tabla.row.add([
                                asignatura.id,
                                asignatura.nombre,
                                nombreNivel,
                                `<button class="btn btn-sm btn-warning" onclick="editarAsignatura(${asignatura.id}, '${asignatura.nombre}', ${asignatura.id_niveleducativo})">Editar</button>
                                <button class="btn btn-sm btn-danger" onclick="eliminarAsignatura(${asignatura.id})">Eliminar</button>`
                            ]).draw();
                        });
                    });
                }
            });
        }

        // Función para cargar niveles
        function cargarNiveles(callback) {
            $.ajax({
                url: '/api/niveles',
                method: 'GET',
                success: function(niveles) {
                    // Llenar select en el modal de agregar
                    $('#nivelAsignatura').empty();  // Vaciar el select antes de llenarlo
                    $('#editarNivelAsignatura').empty();  // Vaciar el select del modal editar también
                    niveles.forEach(function(nivel) {
                        $('#nivelAsignatura').append(`<option value="${nivel.id}">${nivel.nombre}</option>`);
                        $('#editarNivelAsignatura').append(`<option value="${nivel.id}">${nivel.nombre}</option>`);
                    });
                    if (callback) callback(niveles);
                }
            });
        }
        

        // Eliminar asignatura
        window.eliminarAsignatura = function(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarla'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/asignaturas/${id}`,
                        method: 'DELETE',
                        success: function() {
                            cargarAsignaturas();
                            Swal.fire('Eliminado', 'La asignatura ha sido eliminada', 'success');
                        },
                        error: function() {
                            Swal.fire('Error', 'No se pudo eliminar la asignatura', 'error');
                        }
                    });
                }
            });
        }

        // Cargar datos en el modal de edición
        window.editarAsignatura = function(id, nombre, nivel_id) {
            $('#editarAsignaturaId').val(id); // Aquí se asigna el ID de la asignatura
            $('#editarNombreAsignatura').val(nombre); // Aquí el nombre de la asignatura
            $('#editarNivelAsignatura').val(nivel_id); // Aquí el nivel educativo
            $('#modalEditarAsignatura').modal('show'); // Mostrar el modal de edición
        }
    });
</script>
