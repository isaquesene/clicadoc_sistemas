<?php	
include "../../include/valida_session_usuario.php";
include "../../include/valida_session_admin.php";
include "../../include/mysqlconecta.php";

$SQL2 = "SELECT tdp.*, tdc.anmcon_datacad FROM tanam_dados_pacientes tdp LEFT JOIN tanam_dados_consulta tdc ON tdp.anmpac_id = tdc.anmcon_id_paciente WHERE tdc.anmcon_conduta = 0 ORDER BY tdc.anmcon_id DESC";    
$result_id_recusa = @mysqli_query($conexao,$SQL2) or die("Ocorreu um erro! 001");

$linhas_json = array();

while($rows = mysqli_fetch_array($result_id_recusa)){

    $anmpac_id = $rows['anmpac_id'];    
    $anmpac_nom = $rows['anmpac_nom'];
    $anmpac_cpf = $rows['anmpac_cpf'];
    $anmpac_med_presc = $rows['anmpac_med_presc'];

    $anmcon_datacad = $rows['anmcon_datacad'];
    $anmcon_datacad = (new DateTime($anmcon_datacad))->format('d-m-Y'); 
    
    $status = "<span class='badge rounded-pill bg-danger'>RECUSADO</span>";
    $btns = "<button type='button' onclick='revisar($anmpac_id)' class='btn btn-success'><i class='mdi mdi-file-plus me-2'></i>Revisar</button>";   
    
    $linha_json = array(
        'status'=>$status,
        'anmpac_nom'=>utf8_encode($anmpac_nom),
        'anmpac_med_presc'=>$anmpac_med_presc,
        'anmcon_datacad'=>$anmcon_datacad,
        'anmpac_cpf'=>$anmpac_cpf,
        'btns'=>$btns
    ); 

    $linhas_json[] = $linha_json; 
}

    
echo json_encode($linhas_json);
?>