<?php
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$anmpac_id = $_POST['anmpac_id'];

if(isset($anmpac_id)){  
        
    $SQL = "UPDATE tanam_dados_pacientes SET anmpac_em_atendimento = 0 WHERE anmpac_id = $anmpac_id";
    @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");

    $SQL1 = "DELETE FROM tanam_controle_consulta WHERE cont_id_paciente = $anmpac_id";
    @mysqli_query($conexao,$SQL1) or die("Ocorreu um erro! 001");

    $linhas_json = array(
        'success'=>true,
        'msg'=>'Sucesso.'
    );  

    echo json_encode($linhas_json);
    exit;     

} else {    
	
    $linhas_json = array(
        'success'=>false,
        'msg'=>'Ocorreu um erro.'
    ); 
    
    echo json_encode($linhas_json);
    exit; 
}
?>