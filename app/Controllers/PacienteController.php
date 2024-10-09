<?php

require_once __DIR__ . '/../Models/Paciente.php';

class PacienteController
{
    public function create()
    {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $data_nascimento = $_POST['data_nascimento'];
        $endereco = $_POST['endereco'];
        $rg = $_POST['rg'];
        $sus = $_POST['sus'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        Paciente::create($nome, $idade, $data_nascimento, $endereco, $rg, $sus, $login, $senha);
        header('Location: /home');
        exit(); // Importante para parar a execução após redirecionar
    }

    public function delete($id)
    {
        Paciente::delete($id);
        header('Location: /home');
        exit(); // Importante para parar a execução após redirecionar
    }

    public function list(): array
    {
        return Paciente::all(); // Supondo que a classe Paciente tenha um método estático all() que retorna todos os pacientes
    }
}
