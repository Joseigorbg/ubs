<?php ob_start(); ?>
<div class="auth-container">
    <div class="auth-logo text-center">
        <img src="/public/img/logoubs.png" alt="Logo" class="img-fluid" style="max-width: 150px;">
    </div>
    <h2 class="text-center mb-4">Login</h2>
    <form action="/login" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Entrar</button>
    </form>
    <div class="text-center mt-3">
        <a href="/register">Não tem uma conta? Registrar</a>
    </div>
    <div class="text-center mt-2">
        <a href="/forgot-password">Esqueceu sua senha?</a>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layouts/auth-app.php'; ?>
