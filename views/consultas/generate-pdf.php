<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Agendadas</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1, h2 { text-align: center; }
    </style>
</head>
<body>

    <h1>Lista de Consultas</h1>
    <h2>Consultas Agendadas</h2>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Paciente</th>
                <th>Data</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td><?= $consulta['id'] ?></td>
                    <td><?= $consulta['nome_paciente'] ?></td>
                    <td><?= date('d/m/Y', strtotime($consulta['data'])) ?></td>
                    <td><?= date('H:i', strtotime($consulta['hora'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
