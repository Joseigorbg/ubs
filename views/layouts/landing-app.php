<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro de UBS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/styles.css" rel="stylesheet">
</head>
<body>

    <!-- Main Content (Landing Page) -->
    <main>
        <?php
        if (isset($content)) {
            // Inclui o conteúdo da página definida pela variável $content
            include __DIR__ . '/../' . $content;
        }
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
