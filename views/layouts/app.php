<!-- views/layouts/app.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect Ubs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="/public/img/logoubs.ico" type="image/x-icon">
</head>
<body>
    <?php include __DIR__ . '/../partials/navigation.php'; ?>

    <!-- Wrapper para o conteúdo e rodapé -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <main class="auth-box bg-light p-5 rounded shadow">
            <?php echo $content; ?>
        </main>
    </div>
    <?php include __DIR__ . '/../partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
