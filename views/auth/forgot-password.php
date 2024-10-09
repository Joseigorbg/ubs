<?php ob_start(); ?>
<div class="auth-container">
    <div class="auth-logo text-center">
        <img src="/public/img/logoubs.png" alt="Logo" class="img-fluid" style="max-width: 150px;">
    </div>
    <h2 class="text-center mb-4">Esqueceu sua senha?</h2>
    <form action="/forgot-password" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Enviar link de redefinição</button>
    </form>
    <div class="text-center mt-3">
        <a href="/login">Lembrei minha senha, voltar para login</a>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layouts/auth-app.php'; ?>
