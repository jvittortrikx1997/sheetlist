<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard com Menu Lateral</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilo personalizado para o menu lateral */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 15px;
        }

        .sidebar a {
            padding: 8px 8px 8px 16px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #444;
        }

        /* Estilo para o conteúdo principal */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Estilo para esconder o menu lateral em telas menores */
        @media screen and (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Menu lateral -->
    <div class="sidebar">
        <a href="#">Página 1</a>
        <a href="#">Página 2</a>
        <a href="#">Página 3</a>
        <a href="#">Página 4</a>
    </div>

    <!-- Conteúdo principal -->
    <div class="content">
        <h1>Bem-vindo ao Dashboard!</h1>
        <div class="row mt-5">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Card 1</h5>
                    </div>
                    <div class="card-body">
                        Card Info
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary">Ok</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Card 2</h5>
                    </div>
                    <div class="card-body">
                        Card Info
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-secondary">Teste</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Card 3</h5>
                    </div>
                    <div class="card-body">
                        Card Info
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-info">Info</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>