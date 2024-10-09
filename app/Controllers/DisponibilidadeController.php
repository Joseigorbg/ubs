<?php

require_once __DIR__ . '/../Models/Disponibilidade.php';

class DisponibilidadeController
{
    public function create()
    {
        $ubs_id = $_POST['ubs_id'];
        $doutor_id = $_POST['doutor_id'];
        $quantidade_vagas = $_POST['quantidade_vagas'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];

        Disponibilidade::create($ubs_id, $doutor_id, $quantidade_vagas, $data, $hora);
        header('Location: /disponibilidades');
    }

    public function delete($id)
    {
        Disponibilidade::delete($id);
        header('Location: /disponibilidades');
    }

    public function list()
    {
        $disponibilidades = Disponibilidade::findByDoutorAndData($_GET['doutor_id'], $_GET['data']);
        // Renderizar a view com as disponibilidades
    }
}
