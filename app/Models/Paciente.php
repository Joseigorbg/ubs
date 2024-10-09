<?php

class Paciente
{
    // Cria um novo paciente
    public static function create($userId, $nome, $idade, $dataNascimento, $endereco, $rg, $sus)
    {
        $stmt = db()->prepare("INSERT INTO pacientes (user_id, nome, idade, data_nascimento, endereco, rg, sus) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$userId, $nome, $idade, $dataNascimento, $endereco, $rg, $sus]);
    }

    // Encontra paciente pelo login
    public static function findByLogin($login)
    {
        $stmt = db()->prepare("SELECT * FROM pacientes WHERE login = ?");
        $stmt->execute([$login]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Exclui um paciente
    public static function delete($id)
    {
        $stmt = db()->prepare("DELETE FROM pacientes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Lista todos os pacientes
    public static function all(): array
    {
        $stmt = db()->query("SELECT * FROM pacientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function findByUserId($user_id)
    {
        // Supondo que você tenha um banco de dados configurado
        $stmt = db()->prepare('SELECT * FROM pacientes WHERE user_id = ?');
        $stmt->execute([$user_id]);

        return $stmt->fetch(); // Retorna o paciente encontrado
    }
}
