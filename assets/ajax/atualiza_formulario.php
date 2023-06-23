<?php	
include "../../include/mysqlconecta.php";

$hoje = date('Y-m-d');

$acao = $_POST['acao'];

$anmpac_med_presc = $_POST['anmpac_med_presc'];
$anmpac_tratamento = $_POST['anmpac_tratamento'];
$anmpac_alergia = $_POST['anmpac_alergia'];
$anmpac_nom = $_POST['anmpac_nom'];
$anmpac_numcel = $_POST['anmpac_numcel'];
$anmpac_pagamento_status = $_POST['anmpac_pagamento_status'];
$anmpac_cpf = $_POST['anmpac_cpf'];
$anmpac_mail = $_POST['$anmpac_mail'];


if ($acao == "cadastrar"){
    
    $SQL = "insert into tanam_dados_pacientes(anmpac_med_presc, anmpac_tratamento, anmpac_alergia, anmpac_nom,anmpac_cpf, anmpac_numcel, anmpac_pagamento_status, anmpac_mail) values 
    ('$anmpac_med_presc','$anmpac_tratamento','$anmpac_alergia','$anmpac_nom','$anmpac_cpf','$anmpac_numcel','$anmpac_pagamento_status','$anmpac_mail')";    
    @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 001");  

    echo "<input type='hidden' name='sucesso' id='sucesso' value='1'>"; 
} else {
    echo "<input type='hidden' name='sucesso' id='sucesso' value='0'>"; 
}

