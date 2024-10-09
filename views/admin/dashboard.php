<?php ob_start(); ?>

<div class="container mt-5">
    <h1>Painel de Controle do Administrador</h1>

    <h2>Lista de Pacientes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require_once __DIR__ . '/../../app/Controllers/PacienteController.php'; // Inclua o controlador corretamente
            $pacienteController = new PacienteController();
            $pacientes = $pacienteController->list(); // Obtendo a lista de pacientes
            foreach ($pacientes as $paciente): ?>
                <tr>
                    <td><?= $paciente['id'] ?></td>
                    <td><?= $paciente['nome'] ?></td>
                    <td><?= $paciente['data_nascimento'] ?></td>
                    <td>
                        <form action="/pacientes/delete/<?= $paciente['id'] ?>" method="POST">
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layouts/app.php'; ?>  <!-- Corrija o caminho aqui -->
