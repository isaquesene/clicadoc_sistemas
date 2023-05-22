<?php
include "../../include/mysqlconecta.php";

$password = $_POST['password'];
$user_id = $_POST['user_id'];

if(isset($password) && isset($user_id)){ 
    
    $password = md5($password);

    $SQL = "update tanam_usuarios set user_psw = '$password',user_data_recuperar_senha = now(), user_token_recuperar_senha = NULL where user_id = $user_id";    
    @mysqli_query($conexao,$SQL) or die("Erro, código:001");   

                        
    $linhas_json = array(
        'success'=>true,
        'msg'=>'Senha alterada.',
        'primeiro_acesso'=>$_SESSION['user_primeiro_acesso']
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