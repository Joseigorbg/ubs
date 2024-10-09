<?php ob_start(); ?>
<div class="auth-container">
    <div class="auth-logo text-center">
        <img src="/public/img/logoubs.png" alt="Logo" class="img-fluid" style="max-width: 150px;">
    </div>
    <h2 class="text-center mb-4">Redefinir Senha</h2>
    <form action="/reset-password" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
        <div class="mb-3">
            <label for="password" class="form-label">Nova Senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua nova senha" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Redefinir Senha</button>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layouts/auth-app.php'; ?>
