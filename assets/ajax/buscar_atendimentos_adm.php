<?php	
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$SQL = "SELECT tdp.*, COALESCE(tdc.anmcon_conduta, 'inexistente') AS anmcon_conduta, tdc.anmcon_revisado, tdc.anmcon_id FROM tanam_dados_pacientes tdp LEFT JOIN tanam_dados_consulta tdc ON tdp.anmpac_id = tdc.anmcon_id_paciente WHERE tdp.anmpac_pagamento_status IN ('realizado', 'pendente')";

$result_id = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
$linhas_json = array();
while($rows = mysqli_fetch_array($result_id)){

    $anmcon_revisado = $rows['anmcon_revisado'];
    $anmcon_id = $rows['anmcon_id'];
    
    $anmpac_id = $rows['anmpac_id'];
    $anmpac_em_atendimento = $rows['anmpac_em_atendimento'];
    $anmpac_pagamento_status = $rows['anmpac_pagamento_status'];
    $anmpac_nom = $rows['anmpac_nom'];
    $anmpac_cpf = $rows['anmpac_cpf'];
    $anmpac_data_cadastro = $rows['anmpac_data_cadastro'];

    $anmcon_conduta = $rows['anmcon_conduta'];    

    if($anmcon_conduta == 'inexistente'){
        
        $status = "<span class='badge rounded-pill bg-warning'>EM ESPERA</span>";

        if($anmcon_revisado == 1){
            $btns = "<button type='button' onclick='realizarAtendimento($anmpac_id,$anmcon_id)' class='btn btn-success'><i class='mdi mdi-file-plus me-2'></i>Atender</button>";            
        } else {            
            $btns = "<button type='button' onclick='realizarAtendimento($anmpac_id)' class='btn btn-success'><i class='mdi mdi-file-plus me-2'></i>Atender</button>";
        }
        
        if($anmpac_em_atendimento == 1){

            $SQL2 = "SELECT * FROM tanam_controle_consulta WHERE cont_id_paciente = $anmpac_id ORDER BY cont_data_inicio_atendimento DESC LIMIT 0,1";
            $result2 = @mysqli_query($conexao,$SQL2) or die("Ocorreu um erro! 001");
            $rows2 = mysqli_fetch_array($result2);

            $data_inicio_atendimento = $rows2['cont_data_inicio_atendimento'];

            // Data fim no momento da execução
            $dataFim = date('Y-m-d H:i:s');

            // Converter as datas para objetos DateTime
            $inicio = new DateTime($data_inicio_atendimento);
            $fim = new DateTime($dataFim);

            // Calcular a diferença em minutos
            $diferenca = $inicio->diff($fim);
            $minutos = ($diferenca->days * 24 * 60) + ($diferenca->h * 60) + $diferenca->i;

            // Se o tempo de atendimento for superior a 15min, liberar para a fila
            if($minutos > 15){

                $SQL3 = "UPDATE tanam_dados_pacientes SET anmpac_em_atendimento = 0 WHERE anmpac_id = $anmpac_id";
                @mysqli_query($conexao,$SQL3) or die("Ocorreu um erro! 001");

                $SQL4 = "DELETE FROM tanam_controle_consulta WHERE cont_id_paciente = $anmpac_id";
                @mysqli_query($conexao,$SQL4) or die("Ocorreu um erro! 001");

            } else {

                $status = "<span class='badge rounded-pill bg-success'>ATENDIMENTO ($minutos min)</span>";
                $btns = "<button type='button' class='btn btn-success' disabled><i class='mdi mdi-file-plus me-2'></i>Atender</button>";
                
            }
            
        }

        $status_pay = '';

        if ($anmpac_pagamento_status == 'realizado') {
            $status_pay = "<span class='badge rounded-pill bg-success'>Realizado</span>";
        } elseif ($anmpac_pagamento_status == 'pendente') {
            $status_pay = "<span class='badge rounded-pill bg-warning'>Pendente</span>";
        }
        
        $linha_json = array(
            'status'=>$status,
            'anmpac_id'=>$anmpac_id,
            'anmpac_data_cadastro'=>$anmpac_data_cadastro,
            'anmpac_nom'=>$anmpac_nom,
            'anmpac_cpf'=>$anmpac_cpf,
            'anmpac_pagamento_status' => $status_pay,
            'btns'=>$btns
        ); 
    
        $linhas_json[] = $linha_json; 
    }
    
}
    
echo json_encode($linhas_json);
?>