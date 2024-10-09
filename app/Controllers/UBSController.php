<?php

require_once __DIR__ . '/../Models/UBS.php';

class UBSController
{
    public function create()
    {
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];

        UBS::create($nome, $endereco);
        header('Location: /ubs');
    }

    public function delete($id)
    {
        UBS::delete($id);
        header('Location: /ubs');
    }

    public function list()
    {
        $ubs = UBS::all();
        // Renderizar a view com as UBS
    }
}
