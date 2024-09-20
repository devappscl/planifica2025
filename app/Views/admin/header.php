<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.min.css" rel="stylesheet">

   
    <style>

        #content {
            margin-top: 56px; /* Ajustar para que no se superponga el contenido con el navbar fijo */
        }

        #sidebar {
            width: 80px;
            height: 100vh;
            position: fixed;
            top: 56px; /* Debajo del navbar fijo */
            left: 0;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
            overflow: hidden;
            z-index: 1; /* Debajo del navbar */
        }

             
        nav.navbar {
            z-index: 2; /* Navbar siempre encima del sidebar */
        }

        #sidebar .list-group-item {
            border: none;
            text-align: center;
            white-space: nowrap;
        }

        #sidebar .list-group-item i {
            font-size: 24px;
        }

        #content {
            margin-left: 80px;
            padding: 20px;
        }

        /* Ocultar el sidebar en móviles y mostrar solo con el botón */
        @media (max-width: 768px) {
            #sidebar {
                transform: translateX(-100%);
            }
            #sidebar.active {
                transform: translateX(0);
            }
            #content {
                margin-left: 0;
            }
        }

       
        


        

    </style>
</head>
<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-light border-end" id="sidebar">
            <div class="list-group list-group-flush">
                <a href="<?= base_url('/admin/home') ?>" class="list-group-item list-group-item-action p-3" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                    <i class="bi bi-house-door"></i><span class="ms-2"></span>
                </a>
                <a href="<?= base_url('/admin/niveles') ?>" class="list-group-item list-group-item-action p-3" data-bs-toggle="tooltip" data-bs-placement="right" title="Niveles">
                    <i class="bi bi-layers"></i><span class="ms-2"></span>
                </a>
                <a href="<?= base_url('/admin/asignaturas') ?>" class="list-group-item list-group-item-action p-3" data-bs-toggle="tooltip" data-bs-placement="right" title="Asignaturas">
                    <i class="bi bi-book"></i><span class="ms-2"></span>
                </a>
                <a href="#" class="list-group-item list-group-item-action p-3" data-bs-toggle="tooltip" data-bs-placement="right" title="Objetivos">
                    <i class="bi bi-target"></i><span class="ms-2"></span>
                </a>
            </div>
        </div>

        <!-- Content -->
        <div id="content" class="w-100">
        <nav class="navbar fixed-top bg-white border-bottom">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <!-- Botón para mostrar el menú en móvil -->
                <button class="navbar-toggler d-md-none" type="button" id="toggleSidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Título a la izquierda -->
                <a class="navbar-brand text-dark ms-2" href="<?= base_url('/admin/home') ?>">
                    Planificala
                </a>

                <!-- Botón de Cerrar sesión a la derecha -->
                <button class="btn btn-danger ms-auto">Cerrar Sesión</button>
            </div>
        </nav>

