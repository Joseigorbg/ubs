<?php ob_start(); ?>
<div class="container mt-5">
    <h2>Lista de Consultas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Paciente</th>
                <th>Doutor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td><?= $consulta['id'] ?></td>
                    <td><?= $consulta['data'] ?></td>
                    <td><?= $consulta['paciente'] ?></td>
                    <td><?= $consulta['doutor'] ?></td>
                    <td>
                        <form action="/consultas/delete/<?= $consulta['id'] ?>" method="POST">
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/consultas/create" class="btn btn-primary">Criar Nova Consulta</a>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/layouts/app.php'; ?>
