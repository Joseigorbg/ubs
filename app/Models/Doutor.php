<?php

class Doutor
{
    public static function create($nome, $especialidade_nome)
    {
        $stmt = db()->prepare("INSERT INTO doutores (nome, especialidade_nome) VALUES (?, ?)");
        return $stmt->execute([$nome, $especialidade_nome]);
    }

    public static function findByEspecialidade($especialidade_nome)
    {
        $stmt = db()->prepare("SELECT * FROM doutores WHERE especialidade_nome = ?");
        $stmt->execute([$especialidade_nome]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($id)
    {
        $stmt = db()->prepare("DELETE FROM doutores WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
