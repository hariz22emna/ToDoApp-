<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>To-Do App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #f5f7fa, #c3cfe2);
            min-height: 100vh;
        }

        .header {
            background-color: #1e2a38;
            color: white;
            padding: 30px;
            border-bottom: 5px solid #dc3545;
            border-radius: 0 0 30px 30px;
        }

        .task-card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 15px;
        }

        h1, h2 {
            font-family: 'Segoe UI', sans-serif;
        }
    </style>
</head>
<body>

    @auth
        @include('layouts.navigation') <!-- Ce fichier est généré automatiquement par Breeze -->
    @endauth

    <!-- En-tête -->
    <div class="header text-center mb-4">
        <h1>To-Do App</h1>
        <p>Gérez vos tâches avec style</p>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
