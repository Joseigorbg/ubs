<?php

require_once __DIR__ . '/../Models/Consulta.php';
require_once __DIR__ . '/../models/Paciente.php';
require_once __DIR__ . '/../../vendor/autoload.php';
class ConsultaController
{
    // Método para criar uma nova consulta
    public function create()
    {
        $nome_paciente = $_POST['nome_paciente'] ?? null;
        $idade = $_POST['idade'] ?? null;
        $endereco = $_POST['endereco'] ?? null;
        $rg = $_POST['rg'] ?? null;
        $sus = $_POST['sus'] ?? null;
        $data = $_POST['data'] ?? null;
        $hora = $_POST['hora'] ?? null;
        $ubs_id = intval($_POST['ubs_id'] ?? null);
        $doutor_id = intval($_POST['doutor_id'] ?? null);

        // Obtenção do user_id da sessão
        session_start();
        $user_id = $_SESSION['user_id'] ?? null;

        if (!$user_id || !$nome_paciente || !$idade || !$endereco || !$rg || !$sus || !$data || !$hora || !$ubs_id || !$doutor_id) {
            header('Location: /views/consultas/create.php?error=missing_fields');
            exit();
        }

        // Cria a consulta
        $consultaCriada = Consulta::create($nome_paciente, $idade, $endereco, $rg, $sus, $data, $hora, $ubs_id, $doutor_id, $user_id);

        if ($consultaCriada) {
            header('Location: /home?success=consulta_criada');
            exit();
        } else {
            header('Location: /views/consultas/create.php?error=creation_failed');
            exit();
        }
    }

    // Método para deletar uma consulta
    public function delete($id)
    {
        Consulta::delete($id);
        header('Location: /consultas?success=consulta_deletada');
        exit();
    }

    // Método para listar consultas (por usuário logado)
    public function list()
    {
        session_start();
        $user_id = $_SESSION['user_id'] ?? null;
    
        // Verifique se o usuário está logado
        if ($user_id) {
            // Busque as consultas pelo ID do usuário
            $consultas = Consulta::findByUserId($user_id);
            return $consultas;
        } else {
            header('Location: /login');
            exit();
        }
    }
    
    public function showCreateForm()
    {
        session_start();
        $user_id = $_SESSION['user_id'] ?? null;       

        if (!$user_id) {
            header('Location: /login');
            exit();
        }       

        // Obtenha os dados do paciente pelo ID do usuário
        $paciente = Paciente::findByUserId($user_id);       

        if (!$paciente) {
            header('Location: /views/consultas/create.php?error=paciente_nao_encontrado');
            exit();
        }       

        // Passe os dados do paciente para a view
        require __DIR__ . '/../views/consultas/create.php';
    }
    public function generatePDF()
    {
        $user_id = $_SESSION['user_id'] ?? null;
    
        if ($user_id) {
            $consultas = Consulta::findByUserId($user_id);
    
            if (empty($consultas)) {
                echo "Nenhuma consulta encontrada para gerar o PDF.";
                exit();
            }
    
            // Inicia o mPDF
            $mpdf = new \Mpdf\Mpdf();
    
            // Gerar o conteúdo HTML
            ob_start();
            require __DIR__ . '/../../views/consultas/generate-pdf.php'; // Corrigir o caminho
            $html = ob_get_clean();
    
            // Passar o conteúdo HTML para o mPDF
            $mpdf->WriteHTML($html);
    
            // Enviar o arquivo PDF para o navegador
            $mpdf->Output('consultas.pdf', \Mpdf\Output\Destination::INLINE); // INLINE abre no navegador
        } else {
            header('Location: /login');
            exit();
        }
    }    
}
