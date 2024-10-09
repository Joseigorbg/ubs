<?php ob_start(); ?>
<div class="container mt-5">
    <h2>Lista de Doutores</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doutores as $doutor): ?>
                <tr>
                    <td><?= $doutor['id'] ?></td>
                    <td><?= $doutor['nome'] ?></td>
                    <td><?= $doutor['especialidade'] ?></td>
                    <td>
                        <form action="/doutores/delete/<?= $doutor['id'] ?>" method="POST">
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/doutores/create" class="btn btn-primary">Criar Novo Doutor</a>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/layouts/app.php'; ?>
