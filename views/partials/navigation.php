<?php
// Iniciar a sessão, se ainda não foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="/home">UBS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/home">Home</a>
                </li>

                <!-- Verifica se o usuário está logado -->
                <?php if (isset($_SESSION['role'])): ?>

                    <!-- Opções específicas para Admin -->
                    <?php if ($_SESSION['role'] === 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/admin-dashboard">Admin Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/consultas/create">Criar Consulta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/doutores/create">Criar Doutor</a>
                        </li>
                    
                    <!-- Opções para usuário comum -->
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/consultas">Minhas Consultas</a>
                        </li>
                    <?php endif; ?>

                    <!-- Link de Logout para usuários logados -->
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/logout">Logout</a>
                    </li>

                <!-- Se o usuário não estiver logado -->
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/register">Registrar</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
