<?php	
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

if(isset($_POST['submit'])){
    $anmpac_pagamento_status = $_POST['anmpac_pagamento_status'];
    $anmpac_nom = $_POST['anmpac_nom'];
    $anmpac_cpf = $_POST['anmpac_cpf'];
    $anmpac_data_cadastro = $_POST['anmpac_data_cadastro'];
    
    $SQL = "insert into tanam_dados_pacientes(anmpac_pagamento_status, anmpac_nom, anmpac_cpf, anmpac_data_cadastro) values 
    ('$anmpac_pagamento_status','$anmpac_nom','$anmpac_cpf','$anmpac_data_cadastro')";    
    @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 001");  

}

