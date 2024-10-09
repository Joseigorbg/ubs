<?php

require_once __DIR__ . '/../../config/database.php';


class Consulta
{
    // Cria uma nova consulta associada ao usuário
    public static function create($nome_paciente, $idade, $endereco, $rg, $sus, $data, $hora, $ubs_id, $doutor_id, $user_id)
    {
        $stmt = db()->prepare("INSERT INTO consultas (nome_paciente, idade, endereco, rg, sus, data, hora, ubs_id, doutor_id, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$nome_paciente, $idade, $endereco, $rg, $sus, $data, $hora, $ubs_id, $doutor_id, $user_id]);
    }

    // Encontra consultas por usuário
    public static function findByUserId($user_id)
    {
        $stmt = db()->prepare("SELECT * FROM consultas WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($id)
    {
        $stmt = db()->prepare("DELETE FROM consultas WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
