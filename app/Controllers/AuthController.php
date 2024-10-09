<?php

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Paciente.php';
class AuthController
{
    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = User::findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role']; // Salva o papel do usuário na sessão
            header('Location: /home');
        } else {
            header('Location: /invalid-credentials');
        }
    }

    public function register()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = 'user'; // O papel por padrão é 'user'
    
        // Verifica se o email já está registrado
        if (User::findByEmail($email)) {
            header('Location: /user-already-exists');
            return;
        }
    
        // Criação do usuário
        $userId = User::create($email, $password, $role);
    
        // Coleta dados do paciente (agora obrigatório para todos os usuários)
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $dataNascimento = $_POST['data_nascimento'];
        $endereco = $_POST['endereco'];
        $rg = $_POST['rg'];
        $sus = $_POST['sus'];
    
        // Cria o registro do paciente associado ao usuário
        Paciente::create($userId, $nome, $idade, $dataNascimento, $endereco, $rg, $sus);
    
        header('Location: /login');
    }
    

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /'); // Redireciona para a raiz do site
    }
    

    public function forgotPassword()
    {
        $email = $_POST['email'];
        $user = User::findByEmail($email);
    
        if ($user) {
            // Geração do token
            $token = bin2hex(random_bytes(50)); // Gera um token seguro
            User::createPasswordResetToken($email, $token);
    
            // Link de redefinição de senha
            $resetLink = "http://yourdomain.com/reset-password?token=" . $token;
    
            // Envio do e-mail com o link de redefinição
            mail($email, "Redefinição de senha", "Clique no link para redefinir sua senha: " . $resetLink);
    
            header('Location: /password-reset-sent');
        } else {
            header('Location: /email-not-found');
        }
    }
    public function resetPassword()
{
    $token = $_POST['token'];
    $password = $_POST['password'];

    $tokenData = User::findToken($token);

    if ($tokenData) {
        $email = $tokenData['email'];

        // Atualiza a senha
        User::updatePassword($email, $password);

        // Exclui o token usado
        User::deleteToken($token);

        header('Location: /login');
    } else {
        header('Location: /invalid-token');
    }
}

}
