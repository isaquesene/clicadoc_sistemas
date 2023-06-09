<?php	
include "../../include/valida_session_usuario.php";
include "../../include/valida_session_admin.php";
include "../../include/mysqlconecta.php";

$SQL = "SELECT * FROM tanam_usuarios";    

$result_id = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
$linhas_json = array();

while($rows = mysqli_fetch_array($result_id)){

    $user_id = $rows['user_id'];    
    $user_nom = $rows['user_nom'];    
    $user_cpf = $rows['user_cpf'];
    $user_situacao = $rows['user_situacao'];

    if($user_situacao == 'ativo'){
        $status_atual = 1;
    } else {
        $status_atual = 0;
    }
    
    $user_primeiro_acesso = $rows['user_primeiro_acesso'];
    $user_primeiro_acesso = (new DateTime($user_primeiro_acesso))->format('d-m-Y'); 
    
    $btns = "
        <button type='button' onclick='editar($user_id)' class='btn btn-success'><i class='mdi mdi-file-plus me-2'></i>Editar</button>
        <button type='button' onclick='excluir($user_id)' class='btn btn-danger'><i class='mdi mdi-trash-can me-2'></i>Excluir</button>
    "; 

    $status = "
        <div class='form-check form-switch form-switch-warning'>
            <label class='form-check-label' for='switch'>Inativo</label>
            <input class='form-check-input' type='checkbox' id='switch' onclick='mudaStatus($user_id,$status_atual)'>
        </div>
    ";

    if($user_situacao == 'ativo'){
        
        $status = "
            <div class='form-check form-switch form-switch-warning'>
                <label class='form-check-label' for='switch'>Ativo</label>
                <input class='form-check-input' type='checkbox' id='switch' checked='' onclick='mudaStatus($user_id,$status_atual)'>
            </div>
        ";
    }
    
    
    $linha_json = array(
        'user_nom'=>utf8_encode($user_nom),
        'user_cpf'=>$user_cpf,
        'user_primeiro_acesso'=>$user_primeiro_acesso,
        'user_situacao'=>$status,
        'btns'=>$btns
    ); 

    $linhas_json[] = $linha_json; 
}
    
echo json_encode($linhas_json);
?>