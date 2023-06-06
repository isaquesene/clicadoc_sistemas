<?php	
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$acao = $_POST['acao'];

$anmpac_med_presc = $_POST['anmpac_med_presc'];
$anmpac_tratamento = $_POST['anmpac_tratamento'];
$anmpac_alergia = $_POST['anmpac_alergia'];
$anmpac_nom = $_POST['anmpac_nom'];
$anmpac_numcel = $_POST['anmpac_numcel'];
$anmpac_pagamento_status = $_POST['anmpac_pagamento_status'];
$anmpac_cpf = $_POST['anmpac_cpf'];

$success = false;

if ($acao == "cadastrar"){
    
    $SQL = "insert into tanam_dados_pacientes(anmpac_med_presc, anmpac_tratamento, anmpac_alergia, anmpac_nom,anmpac_cpf, anmpac_numcel, anmpac_pagamento_status) values 
    ('$anmpac_med_presc','$anmpac_tratamento','$anmpac_alergia','$anmpac_nom','$anmpac_cpf','$anmpac_numcel','$anmpac_pagamento_status')";    
    @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 001");  

    $success = true;  
}

