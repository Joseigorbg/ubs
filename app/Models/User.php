<?php

class User
{
    // Encontra o usuário pelo email
    public static function findByEmail($email)
    {
        $stmt = db()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cria um novo usuário no banco de dados
    public static function create($email, $password, $role = 'user')
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash da senha
        $stmt = db()->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
        return $stmt->execute([$email, $hashedPassword, $role]);
    }

    // Cria um token de redefinição de senha
    public static function createPasswordResetToken($email, $token)
    {
        $stmt = db()->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
        return $stmt->execute([$email, $token]);
    }

    // Encontra um token de redefinição de senha
    public static function findToken($token)
    {
        $stmt = db()->prepare("SELECT * FROM password_resets WHERE token = ?");
        $stmt->execute([$token]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualiza a senha do usuário
    public static function updatePassword($email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = db()->prepare("UPDATE users SET password = ? WHERE email = ?");
        return $stmt->execute([$hashedPassword, $email]);
    }

    // Exclui o token de redefinição de senha usado
    public static function deleteToken($token)
    {
        $stmt = db()->prepare("DELETE FROM password_resets WHERE token = ?");
        return $stmt->execute([$token]);
    }
}
