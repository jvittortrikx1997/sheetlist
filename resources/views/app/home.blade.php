<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Moderno - Estilo Spotify</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Estilo para o menu lateral */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #040306;
            padding-top: 15px;
            color: #0c258a;
        }

        .sidebar a {
            padding: 8px 16px;
            text-decoration: none;
            font-size: 18px;
            color: #0c258a;
            display: block;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background-color: #1c1c1c;
        }

        /* Estilo para o cabeçalho do conteúdo principal */
        .main-header {
            background-color: #1c1c1c;
            padding: 15px;
            color: white;
        }

        /* Estilo para o conteúdo principal */
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>

<body>
    @extends('utils.menu')
    <!-- Conteúdo principal -->
    <div class="content">
        <div class="main-header">
            <h1>Bem-vindo ao Dashboard Moderno - Estilo Spotify!</h1>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
