<?php 
include "../../include/valida_session_usuario.php";
include "../../include/valida_session_admin.php";
include "../../include/mysqlconecta.php";

$anmcon_id = $_POST['anmcon_id'];
$acao_recusa = $_POST['acao_recusa'];

    $SQL = "SELECT * FROM tanam_dados_consulta WHERE anmcon_id = $anmcon_id";    

    $result = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
    $linhas_json = array();

    $rows = mysqli_fetch_array($result);

if($acao_recusa == 'seleciona_recusa'){
    ?>
    <div class="mt-3">
        <div class="mt-3 mb-3">
            <label class="mb-2">Observações do Médico</label>
            <textarea type="text" rows="5" class="form-control" name="observacoes_medico" disabled><?=$rows['anmcon_observacao']?></textarea>
        </div>                                     
    </div> 
    <?
}