<?php	
include "../../include/valida_session_usuario.php";
include "../../include/valida_session_admin.php";
include "../../include/mysqlconecta.php";

$anmpac_id = $_GET['anmpac_id'];

$SQL = "SELECT tdc.*,tdp.* FROM tanam_dados_consulta tdc LEFT JOIN tanam_dados_pacientes tdp ON tdp.anmpac_id = tdc.anmcon_id_paciente WHERE tdc.anmcon_id_paciente = $anmpac_id"; 

$result_id = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
$linhas_json = array();

while($rows = mysqli_fetch_array($result_id)){

    $anmpac_id = $rows['anmpac_id'];    
    $anmpac_nom = $rows['anmpac_nom'];
    $anmpac_cpf = $rows['anmpac_cpf'];
    $anmcon_datacad = $rows['anmcon_datacad'];
    $anmcon_datacad = (new DateTime($anmcon_datacad))->format('d-m-Y H:i'); 
    
    $btns = "<button type='button' class='btn btn-success' onclick='verDetalhes($anmpac_id)'><i class='mdi mdi-search me-2'></i>Ver detalhes</button>";    
    
    $linha_json = array(
        'anmpac_nom'=>$anmpac_nom,
        'anmcon_datacad'=>$anmcon_datacad,
        'anmpac_cpf'=>$anmpac_cpf,
        'btns'=>$btns
    ); 

    $linhas_json[] = $linha_json; 
}
    
echo json_encode($linhas_json);
?>