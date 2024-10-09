<?php
session_start();

require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Controllers/ConsultaController.php'; 
require_once __DIR__ . '/../app/Controllers/DoutorController.php';
require_once __DIR__ . '/../app/Controllers/PacienteController.php';

$authController = new AuthController();
$consultaController = new ConsultaController(); // Certifique-se de instanciar isso também
$doutorController = new DoutorController(); // Instancia o DoutorController
$pacienteController = new PacienteController();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Rota para página inicial
if ($uri == '/' || $uri == '/index') {
    require __DIR__ . '/../views/landing.php';
} 
// Rota para login
elseif ($uri == '/login' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $authController->login();
} 
// Rota para registro
elseif ($uri == '/register' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $authController->register();
} 
// Rota para logout
elseif ($uri == '/logout') {
    $authController->logout();
} 
// Página inicial do usuário logado
elseif ($uri == '/home') {
    require __DIR__ . '/../views/home.php';
} 
// Rota para dashboard de administrador
elseif ($uri == '/admin-dashboard') {
    if ($_SESSION['role'] === 'admin') {
        require __DIR__ . '/../views/admin/dashboard.php';
    } else {
        header('Location: /home');
    }
} 
// Página de registro
elseif ($uri == '/register') {
    require __DIR__ . '/../views/auth/register.php';
} 
// Rota para recuperação de senha (envio de e-mail)
elseif ($uri == '/forgot-password' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $authController->forgotPassword();
} 
// Página de formulário para recuperação de senha
elseif ($uri == '/forgot-password') {
    require __DIR__ . '/../views/auth/forgot-password.php';
} 
// Processa redefinição de senha
elseif ($uri == '/reset-password' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $authController->resetPassword();
} 
// Exibe o formulário de redefinição de senha
elseif ($uri == '/reset-password') {
    require __DIR__ . '/../views/auth/reset-password.php';
} 
// Rota para criação de consultas
elseif ($uri == '/consultas/create' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $consultaController->create();
}
// Rota para criação de doutores
elseif ($uri == '/doutores/create' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $doutorController->create(); // Agora o controlador está instanciado
}
elseif ($uri == '/doutores/create' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $doutorController->showCreateForm();
}
elseif ($uri == '/pacientes/create' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $pacienteController->create();
}
elseif ($uri == '/consultas/generate-pdf') {
    $consultaController->generatePDF();
}



// Rota padrão
else {
    require __DIR__ . '/../views/auth/login.php';
}
