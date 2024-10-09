<?php ob_start(); ?>
<div class="auth-container">
    <div class="auth-logo text-center">
        <img src="/public/img/logoubs.png" alt="Logo" class="img-fluid" style="max-width: 150px;">
    </div>
    <h2 class="text-center mb-4">Registrar</h2>
    <form action="/register" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
        </div>

        <!-- Campos para dados do paciente -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome completo" required>
        </div>
        <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" class="form-control" id="idade" name="idade" placeholder="Digite sua idade" required>
        </div>
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite seu endereço" required>
        </div>
        <div class="mb-3">
            <label for="rg" class="form-label">RG</label>
            <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite seu RG" required>
        </div>
        <div class="mb-3">
            <label for="sus" class="form-label">Cartão do SUS</label>
            <input type="text" class="form-control" id="sus" name="sus" placeholder="Digite o número do cartão do SUS" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Registrar</button>
    </form>
    <div class="text-center mt-3">
        <a href="/login">Já tem uma conta? Entrar</a>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layouts/auth-app.php'; ?>
