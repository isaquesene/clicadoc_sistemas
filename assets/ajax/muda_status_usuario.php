<?php
include "../../include/valida_session_usuario.php";
include "../../include/valida_session_admin.php";
include "../../include/mysqlconecta.php";

$user_id = $_POST['user_id'];
$user_status = $_POST['user_status'];

if(isset($user_id)){  
    
    if($user_status == 1){
        $nova_situacao = 'inativo';
    } else if($user_status == 0){
        $nova_situacao = 'ativo';
    }
        
    $SQL = "update tanam_usuarios set user_situacao='$nova_situacao' where user_id = $user_id"; 

    $result = @mysqli_query($conexao,$SQL) or die("Erro, código:001");                                            
    $rows = mysqli_fetch_array($result);

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