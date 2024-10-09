<?php

class UBS
{
    // Cria uma nova UBS
    public static function create($nome, $endereco)
    {
        $stmt = db()->prepare("INSERT INTO ubs (nome, endereco) VALUES (?, ?)");
        return $stmt->execute([$nome, $endereco]);
    }

    // Encontra todas as UBS
    public static function all()
    {
        $stmt = db()->query("SELECT * FROM ubs");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Exclui uma UBS
    public static function delete($id)
    {
        $stmt = db()->prepare("DELETE FROM ubs WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
