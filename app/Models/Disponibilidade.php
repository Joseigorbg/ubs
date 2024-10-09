<?php

class Disponibilidade
{
    // Cria uma nova disponibilidade
    public static function create($ubs_id, $doutor_id, $quantidade_vagas, $data, $hora)
    {
        $stmt = db()->prepare("INSERT INTO disponibilidades (ubs_id, doutor_id, quantidade_vagas, data, hora) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$ubs_id, $doutor_id, $quantidade_vagas, $data, $hora]);
    }

    // Encontra disponibilidades por doutor e data
    public static function findByDoutorAndData($doutor_id, $data)
    {
        $stmt = db()->prepare("SELECT * FROM disponibilidades WHERE doutor_id = ? AND data = ?");
        $stmt->execute([$doutor_id, $data]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Exclui uma disponibilidade
    public static function delete($id)
    {
        $stmt = db()->prepare("DELETE FROM disponibilidades WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
