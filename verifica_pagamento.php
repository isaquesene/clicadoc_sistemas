<?php
/* // Definir o destino do log de erros
ini_set('error_log', '/tmp/errors.log');

// Definir o formato do log de erros
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL);

// Habilitar exibição de erros no navegador (apenas para fins de desenvolvimento)
ini_set('display_errors', 1); */

include "include/mysqlconecta.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

//$data = json_decode(file_get_contents('php://input'), true);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do webhook

    /* $dados = $_POST;
    $valor2 = print_r($dados, true);
    syslog(LOG_INFO, $valor2); */
    
    $pagamento_fatura = $_POST['data']['id'];
    $pagamento_status = $_POST['data']['status'];

    // Verifica se os dados do webhook foram convertidos corretamente em um array
    if (!empty($pagamento_fatura)) {
        // Recupera os dados do webhook

        if($pagamento_status == 'paid'){ $pagamento_status = 'realizado'; }

        if (!$conexao) {
            die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
        }
        
        $SQL = "UPDATE tanam_dados_pacientes SET anmpac_pagamento_status = '$pagamento_status', anmpac_pagamento_data = now() WHERE anmpac_pagamento_fatura = '$pagamento_fatura'";
        
        if (mysqli_query($conexao, $SQL)) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Ocorreu um problema ao inserir os dados: " . mysqli_error($conexao);
        }

        mysqli_close($conexao);
    }    
}

// Responda com um status de sucesso para a Iugu API
http_response_code(200);

