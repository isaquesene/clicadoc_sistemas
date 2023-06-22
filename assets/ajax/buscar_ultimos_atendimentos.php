<?php	
include "../../include/valida_session_usuario.php";
include "../../include/valida_session_admin.php";
include "../../include/mysqlconecta.php";

$SQL = "SELECT tdc.anmcon_datacad,tdc.anmcon_id,tdp.anmpac_nom, tu.user_nom FROM tanam_dados_consulta tdc LEFT JOIN tanam_dados_pacientes tdp ON tdp.anmpac_id = tdc.anmcon_id_paciente LEFT JOIN tanam_usuarios tu ON tu.user_id = tdc.anmcon_id_medico ORDER by tdc.anmcon_id DESC LIMIT 0,10";  

$result_id = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
$linhas_json = array();

while($rows = mysqli_fetch_array($result_id)){

    $anmpac_id = $rows['anmpac_id'];
    $anmpac_nom = $rows['anmpac_nom'];
    $user_nom = $rows['user_nom'];    
    
    $anmcon_datacad = $rows['anmcon_datacad'];
    $anmcon_datacad = (new DateTime($anmcon_datacad))->format('d-m-Y'); 
    
    $btns = "<button type='button' onclick='verDetalhes($anmpac_id)' class='btn btn-success'><i class='mdi mdi-file-plus me-2'></i>Ver detalhes</button>";
    
    $linha_json = array(
        'anmpac_nom'=>$anmpac_nom,
        'anmcon_datacad'=>$anmcon_datacad,
        'user_nom'=>utf8_encode($user_nom),
        'btns'=>$btns
    ); 

    $linhas_json[] = $linha_json; 
}

echo json_encode($linhas_json);

?>