<?php

require_once __DIR__ . '/../Models/Doutor.php';
require_once __DIR__ . '/../Models/Especialidade.php';

class DoutorController
{
    // Método para exibir o formulário de criação de doutores
    public function showCreateForm()
    {
        // Busca todas as especialidades
        $especialidades = Especialidade::all();
        
        // Renderiza a view de criação e passa as especialidades
        require __DIR__ . '/../views/doutores/create.php';
    }

    // Método para criar um novo doutor
    public function create()
    {
        $nome = $_POST['nome'];
        $especialidade_nome = $_POST['especialidade_nome'];

        if (!$nome || !$especialidade_nome) {
            header('Location: /doutores/create');
            exit();
        }

        Doutor::create($nome, $especialidade_nome);

        header('Location: /home');
        exit();
    }
}
