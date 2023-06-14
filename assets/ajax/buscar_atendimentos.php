<?php	
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$SQL = "SELECT tdp.*, COALESCE(tdc.anmcon_conduta, 'inexistente') AS anmcon_conduta, tdc.anmcon_revisado, tdc.anmcon_id FROM tanam_dados_pacientes tdp LEFT JOIN tanam_dados_consulta tdc ON tdp.anmpac_id = tdc.anmcon_id_paciente WHERE tdp.anmpac_pagamento_status = 'realizado'";    

$result_id = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
$linhas_json = array();

while($rows = mysqli_fetch_array($result_id)){

    $anmcon_revisado = $rows['anmcon_revisado'];
    $anmcon_id = $rows['anmcon_id'];

    $anmpac_id = $rows['anmpac_id'];
    $anmpac_pagamento_status = $rows['anmpac_pagamento_status'];
    $anmpac_nom = $rows['anmpac_nom'];
    $anmpac_cpf = $rows['anmpac_cpf'];
    $anmpac_data_cadastro = $rows['anmpac_data_cadastro'];

    $anmcon_conduta = $rows['anmcon_conduta'];    

    if($anmcon_conduta == 'inexistente'){
        
        $status = "<span class='badge rounded-pill bg-warning'>Aguardando atendimento</span>";

        if($anmcon_revisado == 1){
            $btns = "<button type='button' onclick='realizarAtendimento($anmpac_id,$anmcon_id)' class='btn btn-success'><i class='mdi mdi-file-plus me-2'></i>Atender</button>";            
        } else {            
            $btns = "<button type='button' onclick='realizarAtendimento($anmpac_id)' class='btn btn-success'><i class='mdi mdi-file-plus me-2'></i>Atender</button>";
        }
        
        $linha_json = array(
            'status'=>$status,
            'anmpac_id'=>$anmpac_id,
            'anmpac_data_cadastro'=>$anmpac_data_cadastro,
            'anmpac_nom'=>$anmpac_nom,
            'anmpac_cpf'=>$anmpac_cpf,
            'btns'=>$btns
        ); 
    
        $linhas_json[] = $linha_json; 
    }
    
}
    
echo json_encode($linhas_json);
?>