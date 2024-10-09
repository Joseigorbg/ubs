<?php ob_start(); ?>
<div class="container mt-5">
    <h2>Criar Novo Doutor</h2>
    <form action="/doutores/create" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="especialidade_nome" class="form-label">Especialidade</label>
            <input type="text" name="especialidade_nome" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layouts/app.php'; ?>
