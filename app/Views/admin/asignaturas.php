<div class="container-full">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Gestión de Asignaturas</h1>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAgregarAsignatura">
            <i class="bi bi-plus"></i> Agregar Asignatura
        </button>
    </div>
    <p>Aquí puedes agregar, editar o eliminar asignaturas educativas.</p>
</div>

<!-- Tabla de Asignaturas -->
<div class="row mt-4">
    <div class="col-md-12">
        <table id="asignaturaTable" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de la Asignatura</th>
                    <th>Nivel</th>
                    <th>Color</th>
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
                        <select id="nivelAsignatura" class="form-control" required></select>
                    </div>
                    <div class="mb-3">
                        <label for="colorAsignatura" class="form-label">Color de la Asignatura</label>
                        <input type="color" class="form-control" id="colorAsignatura" value="#000000" required>
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
                        <select id="editarNivelAsignatura" class="form-control" required></select>
                    </div>
                    <div class="mb-3">
                        <label for="editarColorAsignatura" class="form-label">Color de la Asignatura</label>
                        <input type="color" class="form-control" id="editarColorAsignatura" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Gestionar OAs -->
<div class="modal fade" id="oasModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gestionar Objetivos de Aprendizaje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="oasTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Tipo Objetivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se llenarán los OAs desde AJAX -->
                    </tbody>
                </table>
                <!-- Botón flotante para agregar un nuevo OA -->
                <button type="button" class="btn btn-primary btn-float" onclick="abrirModalCrearOA()">
                    <i class="bi bi-plus"></i> Agregar OA
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Agregar CSS para que el botón sea flotante -->
<style>
    .btn-float {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }
</style>

<!-- Modal para Crear/Editar un Nuevo OA -->
<div class="modal fade" id="newOaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Objetivo de Aprendizaje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Campo oculto para el ID del OA -->
                <input type="hidden" id="oaId">
                <!-- Campo oculto para el ID de la asignatura -->
                <input type="hidden" id="asignaturaId">

                <!-- Campo para Nombre del OA -->
                <div class="form-group mt-2">
                    <label for="oaNombre">Nombre del OA</label>
                    <input type="text" class="form-control" id="oaNombre" placeholder="Ingrese el nombre del OA" required>
                </div>

                <!-- Campo para Descripción del OA con TinyMCE -->
                <div class="form-group mt-2">
                    <label for="oaDescripcion">Descripción</label>
                    <textarea id="oaDescripcion"></textarea>
                </div>

                <!-- Campo para Tipo de OA -->
                <div class="form-group mt-2">
                    <label for="oaTipo">Tipo de OA</label>
                    <select class="form-control" id="oaTipo"></select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarOa()">Guardar OA</button>
            </div>
        </div>
    </div>
</div>


<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.1.6/js/dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js"></script>

<script>
   $(document).ready(function() {

    // Inicialización de la tabla DataTable
    let tabla = $('#asignaturaTable').DataTable({
        responsive: true,
        searching: true,
        paging: true,
        info: false,
        pageLength: 10,
        autoWidth: false,
        language: { url: '<?= base_url("/assets/js/es-CL.json") ?>' }
    });

    // Inicialización de TinyMCE
    tinymce.init({
        selector: '#oaDescripcion',
        plugins: 'lists',
        toolbar: 'bold | numlist bullist',
        menubar: false,
        height: 300,
        branding: false
    });

    // Función para cargar asignaturas desde la API
    function cargarAsignaturas() {
        $.ajax({
            url: '/api/asignaturas',
            method: 'GET',
            success: function(asignaturas) {
                tabla.clear();
                cargarNiveles(function(niveles) {
                    asignaturas.forEach(function(asignatura) {
                        let nivel = niveles.find(n => n.id == asignatura.id_niveleducativo);
                        let nombreNivel = nivel ? nivel.nombre : 'Desconocido';
                        tabla.row.add([
                            asignatura.id,
                            asignatura.nombre,
                            nombreNivel,
                            `<span style="background-color: ${asignatura.color}; padding: 3px 10px; color: #fff; border-radius: 5px;">${asignatura.color}</span>`,
                            `<div class="btn-group">
                                <button class="btn btn-sm btn-warning" onclick="editarAsignatura(${asignatura.id}, '${asignatura.nombre}', ${asignatura.id_niveleducativo}, '${asignatura.color}')">
                                    <i class="bi bi-pencil"></i> Editar
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="eliminarAsignatura(${asignatura.id})">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                                <button class="btn btn-sm btn-primary" onclick="mostrarOAsModal(${asignatura.id})">
                                    <i class="bi bi-list-check"></i> Gestionar OAs
                                </button>
                            </div>`
                        ]).draw();
                    });
                });
            }
        });
    }

    // Cargar niveles
    function cargarNiveles(callback) {
        $.ajax({
            url: '/api/niveles',
            method: 'GET',
            success: function(niveles) {
                $('#nivelAsignatura, #editarNivelAsignatura').empty();
                niveles.forEach(function(nivel) {
                    $('#nivelAsignatura').append(`<option value="${nivel.id}">${nivel.nombre}</option>`);
                    $('#editarNivelAsignatura').append(`<option value="${nivel.id}">${nivel.nombre}</option>`);
                });
                if (callback) callback(niveles);
            }
        });
    }

    // Agregar asignatura
    $('#formAgregarAsignatura').submit(function(e) {
        e.preventDefault();
        let nombreAsignatura = $('#nombreAsignatura').val();
        let nivelAsignatura = $('#nivelAsignatura').val();
        let colorAsignatura = $('#colorAsignatura').val();

        $.ajax({
            url: '/api/asignaturas',
            method: 'POST',
            data: { nombre: nombreAsignatura, nivel_id: nivelAsignatura, color: colorAsignatura },
            success: function() {
                $('#modalAgregarAsignatura').modal('hide');
                cargarAsignaturas();
                $('#modalAgregarAsignatura').on('hidden.bs.modal', function () {
                    Swal.fire('Éxito', 'Asignatura agregada correctamente', 'success');
                });
            },
            error: function() {
                Swal.fire('Error', 'No se pudo agregar la asignatura', 'error');
            }
        });
    });

    // Editar asignatura
    $('#formEditarAsignatura').submit(function(e) {
        e.preventDefault();
        let id = $('#editarAsignaturaId').val();
        let nombreAsignatura = $('#editarNombreAsignatura').val();
        let nivelAsignatura = $('#editarNivelAsignatura').val();
        let colorAsignatura = $('#editarColorAsignatura').val();

        let data = JSON.stringify({
            nombre: nombreAsignatura,
            id_niveleducativo: nivelAsignatura,
            color: colorAsignatura
        });

        $.ajax({
            url: `/api/asignaturas/${id}`,
            method: 'PUT',
            data: data,
            contentType: 'application/json',
            success: function() {
                $('#modalEditarAsignatura').modal('hide');
                cargarAsignaturas();
                $('#modalEditarAsignatura').on('hidden.bs.modal', function () {
                    Swal.fire('Éxito', 'Asignatura actualizada correctamente', 'success');
                });
            },
            error: function() {
                Swal.fire('Error', 'No se pudo actualizar la asignatura', 'error');
            }
        });
    });

    // Editar asignatura
    window.editarAsignatura = function(id, nombre, nivel_id, color) {
        $('#editarAsignaturaId').val(id);
        $('#editarNombreAsignatura').val(nombre);
        $('#editarNivelAsignatura').val(nivel_id);
        $('#editarColorAsignatura').val(color);
        $('#modalEditarAsignatura').modal('show');
    };

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
    };

    // Cargar tipos de OA
    function cargarTiposDeOA(callback) {
        $.ajax({
            url: '/api/tiposoa',
            method: 'GET',
            success: function(tipos) {
                $('#oaTipo').empty();
                tipos.forEach(function(tipo) {
                    $('#oaTipo').append(`<option value="${tipo.id}">${tipo.nombre}</option>`);
                });
                if (callback) callback(tipos); // Se pasa la lista de tipos al callback
            },
            error: function() {
                Swal.fire('Error', 'No se pudieron cargar los tipos de OA.', 'error');
            }
        });
    }

    // Abrir modal para crear nuevo OA
    window.abrirModalCrearOA = function() {
        $('#oaId').val('');
        $('#oaNombre').val('');
        tinymce.get('oaDescripcion').setContent('');
        $('#oaTipo').val('');
        cargarTiposDeOA();
        $('#newOaModal').modal('show');
    };

    // Función para mostrar el modal y cargar los OAs de una asignatura
    window.mostrarOAsModal = function(asignaturaId) {
        $('#asignaturaId').val(asignaturaId);
        $('#oasModal').modal('show');
        let tbody = $('#oasTable tbody');
        tbody.empty();

        // Cargar los OAs desde la API
        $.ajax({
            url: `/api/oas/${asignaturaId}`,
            method: 'GET',
            success: function(oas) {
                // Obtener los tipos de OA antes de renderizar la tabla
                cargarTiposDeOA(function(tipos) {
                    oas.forEach(function(oa) {
                        let tipoNombre = tipos.find(tipo => tipo.id == oa.id_oa_tipo)?.nombre || 'Desconocido';  // Obtener el nombre del tipo de OA
                        tbody.append(`
                            <tr>
                                <td>${oa.id}</td>
                                <td>${oa.nombrecorto}</td>
                                <td>${oa.descripcion}</td>
                                <td>${tipoNombre}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-warning" onclick="editarOA(${oa.id})">Editar</button>
                                        <button class="btn btn-sm btn-danger" onclick="eliminarOA(${oa.id})">Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                        `);
                    });
                });
            },
            error: function() {
                Swal.fire('Error', 'No se pudieron cargar los OAs.', 'error');
            }
        });
    };

    // Función para guardar un OA (crear o editar)
    window.guardarOa = function() {
        let oaId = $('#oaId').val();
        let nombre = $('#oaNombre').val().trim();
        let descripcion = tinymce.get('oaDescripcion').getContent();
        let tipo = $('#oaTipo').val();
        let idAsignatura = $('#asignaturaId').val();

        if (!nombre || !descripcion || !tipo || !idAsignatura) {
            Swal.fire('Advertencia', 'Por favor, complete todos los campos.', 'warning');
            return;
        }

        let oaData = {
            nombrecorto: nombre,
            descripcion: descripcion,
            id_oa_tipo: tipo,
            id_asignatura: idAsignatura
        };

        $.ajax({
            url: oaId ? `/api/oas/${oaId}` : '/api/oas',
            method: oaId ? 'PUT' : 'POST',
            data: JSON.stringify(oaData),
            contentType: 'application/json',
            success: function() {
                $('#newOaModal').modal('hide');
                mostrarOAsModal(idAsignatura);
                Swal.fire('Éxito', 'OA guardado correctamente', 'success');
            },
            error: function(xhr) {
                let errorMessage = 'No se pudo guardar el OA.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                Swal.fire('Error', errorMessage, 'error');
            }
        });
    };

   // Editar OA
window.editarOA = function(id) {
    $.ajax({
        url: `/api/oas/detail/${id}`,  // Asegúrate de que esta URL sea correcta
        method: 'GET',
        success: function(oa) {
            // Dado que la respuesta es un objeto, accede a los datos directamente
            if (oa) {
                // Asignar los valores de OA al modal
                $('#oaId').val(oa.id);
                $('#oaNombre').val(oa.nombrecorto);
                $('#oaTipo').val(oa.id_oa_tipo); // Asegúrate de que este select tenga las opciones cargadas previamente

                // Verificar si la descripción existe, de lo contrario usar una cadena vacía
                let descripcion = oa.descripcion || '';

                // Asegúrate de que TinyMCE esté listo antes de establecer el contenido
                if (tinymce.get('oaDescripcion')) {
                    tinymce.get('oaDescripcion').setContent(descripcion);
                } else {
                    // Inicializar TinyMCE si no está ya inicializado
                    tinymce.init({
                        selector: '#oaDescripcion',
                        plugins: 'lists',
                        toolbar: 'bold | numlist bullist',
                        menubar: false,
                        height: 300,
                        branding: false,
                        setup: function(editor) {
                            editor.on('init', function() {
                                editor.setContent(descripcion); // Establecer el contenido después de la inicialización
                            });
                        }
                    });
                }

                // Mostrar el modal después de cargar los datos
                $('#newOaModal').modal('show');
            } else {
                Swal.fire('Error', 'No se pudo cargar los datos del OA para editar.', 'error');
            }
        },
        error: function() {
            Swal.fire('Error', 'No se pudo cargar el OA para editar.', 'error');
        }
    });
};


    // Eliminar OA
    window.eliminarOA = function(id) {
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
                    url: `/api/oas/${id}`,
                    method: 'DELETE',
                    success: function() {
                        mostrarOAsModal($('#asignaturaId').val());
                        Swal.fire('Eliminado', 'El OA ha sido eliminado.', 'success');
                    },
                    error: function() {
                        Swal.fire('Error', 'No se pudo eliminar el OA.', 'error');
                    }
                });
            }
        });
    };

    cargarAsignaturas();
    cargarNiveles();
});
</script>

