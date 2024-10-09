<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

// Regenera o ID da sessão para evitar fixação de sessão
session_regenerate_id();

ob_start(); 
?>

<div class="container mt-5">
    <h2>Criar Nova Consulta</h2>
    <form action="/consultas/create" method="POST">
        <div class="mb-3">
            <label for="nome_paciente" class="form-label">Nome do Paciente</label>
            <input type="text" name="nome_paciente" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" name="idade" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="rg" class="form-label">RG</label>
            <input type="text" name="rg" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="sus" class="form-label">Número do SUS</label>
            <input type="text" name="sus" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data da Consulta</label>
            <input type="date" name="data" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="hora" class="form-label">Hora da Consulta</label>
            <input type="time" name="hora" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="ubs_id" class="form-label">UBS</label>
            <select name="ubs_id" class="form-control" required>
                <option value="1">UBS Marabaixo</option>
                <option value="2">UBS Central</option>
                <!-- Adicione outras opções de UBS -->
            </select>
        </div>          

        <div class="mb-3">
            <label for="doutor_id" class="form-label">Doutor</label>
            <select name="doutor_id" class="form-control" required>
                <option value="1">Dr. Furlan</option>
                <option value="2">Dr. Silva</option>
                <!-- Adicione outras opções de doutores -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Criar Consulta</button>
    </form>
</div>

<?php 
$content = ob_get_clean(); 
include __DIR__ . '/../layouts/app.php'; 
?>
