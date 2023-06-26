<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$data = json_decode(file_get_contents('php://input'), true);

// Verifique se a requisição contém dados válidos
if (!empty($data)) {
    // Ação a ser executada quando uma requisição for recebida
    // Você pode acessar os dados da requisição usando $data['event'] e $data['url']
    // Faça o processamento necessário com os dados recebidos

    // Exemplo de ação: Inserir dados em um banco de dados MySQL
    $conexao = mysqli_connect("sql104.epizy.com","epiz_33687998","ndNIXIz5mOYuMI","epiz_33687998_clicadoc");
    if (!$conexao) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }

    $pagamento = 'ok';

    $SQL = "INSERT INTO teste_pagamento (pagamento) VALUES ('$pagamento')";
    if (mysqli_query($conexao, $SQL)) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Ocorreu um problema ao inserir os dados: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}

// Responda com um status de sucesso para a Iugu API
http_response_code(200);
