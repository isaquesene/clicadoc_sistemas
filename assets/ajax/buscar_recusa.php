<?php	
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$user_id = $_SESSION["clicadoc_user_id"];

$SQL = "SELECT tdp.*, tdc.anmcon_datacad FROM tanam_dados_pacientes tdp LEFT JOIN tanam_dados_consulta tdc ON tdp.anmpac_id = tdc.anmcon_id_paciente WHERE tdc.anmcon_id_medico = $user_id AND tdc.anmcon_conduta = 0";    

$result_id = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
$linhas_json = array();

while($rows = mysqli_fetch_array($result_id)){

    $anmpac_id = $rows['anmpac_id'];    
    $anmpac_nom = $rows['anmpac_nom'];
    $anmpac_cpf = $rows['anmpac_cpf'];
    $anmcon_datacad = $rows['anmcon_datacad'];
    
    $status = "<a class='bg-warning text-dark'>RECUSADO";    
    
    $linha_json = array(
        'status'=>$status,
        'anmpac_nom'=>$anmpac_nom,
        'anmcon_datacad'=>$anmcon_datacad,
        'anmpac_cpf'=>$anmpac_cpf
    ); 

    $linhas_json[] = $linha_json; 
}
    
echo json_encode($linhas_json);
?>