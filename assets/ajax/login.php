<?php
session_start();
include "../../include/mysqlconecta.php";

$hoje = date('Y-m-d');

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($username) && isset($password)){        
        
    $SQL = "select * from tanam_usuarios where user_log = '$username'";    
    $result = @mysqli_query($conexao,$SQL) or die("Erro, código:001");                                            
    $rows = mysqli_fetch_array($result);

    $password = md5($password);
    
    if(!strcmp($password, $rows['user_psw']) && $rows['user_situacao'] == 'ativo'){
             
        $_SESSION["clicadoc_user_id"] = $rows['user_id'];
        $_SESSION["clicadoc_user_situacao"] = $rows['user_situacao'];
        $_SESSION["clicadoc_user_log"] = $rows['user_log'];
        $_SESSION["clicadoc_user_nom"] = $rows['user_nom'];
        $_SESSION["clicadoc_user_email"] = $rows['user_email'];        
        $_SESSION["clicadoc_user_crm"] = $rows['user_crm'];    
            
        $_SESSION['foto_nao_encontrada'] = true;
        
        $foto_recuperada = './assets/images/default_avatar.png'; 
        $_SESSION['clicadoc_user_foto_perfil'] = $foto_recuperada;

        $_SESSION['user_primeiro_acesso'] = false;       

        if(is_null($rows['user_primeiro_acesso'])){
            
            $_SESSION['clicadoc_user_primeiro_acesso'] = true;

            $SQL = "update tanam_usuarios set user_primeiro_acesso = now() where user_log = '$username'";    
            @mysqli_query($conexao,$SQL) or die("Erro, código:002");   

        }

                        
        $linhas_json = array(
            'success'=>true,
            'msg'=>'Login bem-sucedido.',
            'primeiro_acesso'=>$_SESSION['user_primeiro_acesso']
        );  
        
        echo json_encode($linhas_json);
        exit;

    } else {

        $linhas_json = array(
            'success'=>false,
            'msg'=>'Login mal-sucedido.'            
        ); 

        echo json_encode($linhas_json);
        exit; 
    }

} else {    
	
    $linhas_json = array(
        'success'=>false,
        'msg'=>'Login mal-sucedido.'
    ); 
    
    echo json_encode($linhas_json);
    exit; 
}
?>