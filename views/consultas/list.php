<?php ob_start(); ?>

<div class="container mt-5">
    <h1>Lista de Consultas</h1>
    <h2>Consultas Agendadas</h2>

    <a href="/consultas/generate-pdf" class="btn btn-primary mb-3">Gerar PDF</a> <!-- Botão para gerar o PDF -->
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Paciente</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require_once __DIR__ . '/../../app/Controllers/ConsultaController.php'; 
            $consultaController = new ConsultaController();
            $consultas = $consultaController->list();

            if (empty($consultas)): ?>
                <tr>
                    <td colspan="5" class="text-center">Nenhuma consulta agendada.</td>
                </tr>
            <?php else:
                foreach ($consultas as $consulta): ?>
                    <tr>
                        <td><?= $consulta['id'] ?></td>
                        <td><?= $consulta['nome_paciente'] ?></td>
                        <td><?= date('d/m/Y', strtotime($consulta['data'])) ?></td>
                        <td><?= date('H:i', strtotime($consulta['hora'])) ?></td>
                        <td>
                            <form action="/consultas/delete/<?= $consulta['id'] ?>" method="POST">
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; 
            endif; ?>
        </tbody>
    </table>
</div>


<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layouts/app.php'; ?>  <!-- Corrija o caminho aqui -->
