<?php

class Especialidade
{
    public static function all()
    {
        $stmt = db()->prepare("SELECT * FROM especialidades");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
