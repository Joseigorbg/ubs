<?php ob_start(); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4">Bem-vindo ao Home</h1>
            <p class="lead">Este é o conteúdo para usuários comuns. Navegue pelas opções abaixo para realizar consultas e gerar relatórios PDF.</p>
        </div>
    </div>

    <!-- Seção de ações principais -->
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Agendar Consulta</h5>
                    <p class="card-text">Clique aqui para agendar uma nova consulta.</p>
                    <a href="/views/consultas/create.php" class="btn btn-success">Agendar Consulta</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Suas Consultas</h5>
                    <p class="card-text">Veja suas consultas agendadas.</p>
                    <a href="/views/consultas/list.php" class="btn btn-primary">Ver Consultas</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Seção de geração de PDFs -->
    <div class="row mt-5">
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <div class="col-md-6 mt-4 mt-md-0">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Cadastrar Doutor</h5>
                    <p class="card-text">Clique aqui para cadastrar um novo doutor.</p>
                    <a href="/views/doutores/create.php" class="btn btn-success">Cadastrar Doutor</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/layouts/app.php'; ?>
