<?php	
include "../../include/valida_session_usuario.php";
include "../../include/valida_session_admin.php";
include "../../include/mysqlconecta.php";

$user_id = $_SESSION["clicadoc_user_id"];

$SQL = "SELECT tdp.*, tdc.anmcon_datacad, tdc.anmcon_id, tu.user_nom FROM tanam_dados_pacientes tdp LEFT JOIN tanam_dados_consulta tdc ON tdp.anmpac_id = tdc.anmcon_id_paciente LEFT JOIN tanam_usuarios tu ON tu.user_id = tdc.anmcon_id_medico WHERE tdp.anmpac_pagamento_status IN ('realizado', 'pendente') GROUP BY tdp.anmpac_cpf";

$result_id = @mysqli_query($conexao, $SQL) or die("Ocorreu um erro! 001");
$linhas_json = array();

while ($rows = mysqli_fetch_array($result_id)) {
    $anmpac_id = $rows['anmpac_id'];    
    $anmpac_nom = $rows['anmpac_nom'];
    $anmpac_cpf = $rows['anmpac_cpf'];
    $anmcon_datacad = $rows['anmcon_datacad'];
    $user_nom = $rows['user_nom'];  
    $anmpac_pagamento_status = $rows['anmpac_pagamento_status'];

    //$status = '';

    if (empty($anmcon_datacad)) {
        $anmcon_datacad = "<span class='badge rounded-pill bg-warning'>Aguardando consulta</span>";
    } else {
        $anmcon_datacad = $rows['anmcon_datacad'];
    }

    $status_pay = '';

    if ($anmpac_pagamento_status == 'realizado') {
        $status_pay = "<span class='badge rounded-pill bg-success'>Realizado</span>";
    } elseif ($anmpac_pagamento_status == 'pendente') {
        $status_pay = "<span class='badge rounded-pill bg-warning'>Pendente</span>";
    }
    
    $btns = "<button type='button' class='btn btn-success' onclick='verDetalhes($anmpac_id)'><i class='mdi mdi-file-plus me-2'></i>Ver detalhes</button>";    
    
    $linha_json = array(
        'status' => $status,
        'anmpac_nom' => $anmpac_nom,
        'anmcon_datacad' => $anmcon_datacad,
        'anmpac_cpf' => $anmpac_cpf,
        'user_nom' => utf8_encode($user_nom),
        'anmpac_pagamento_status' => $status_pay,
        'btns' => $btns
    ); 

    $linhas_json[] = $linha_json; 
}
    
echo json_encode($linhas_json);
?>
