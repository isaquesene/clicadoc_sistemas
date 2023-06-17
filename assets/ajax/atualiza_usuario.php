<?php
include "../../include/valida_session_usuario.php";
include "../../include/valida_session_admin.php";
include "../../include/mysqlconecta.php";

$acao = $_POST['acao_usuario'];

$user_nom = $_POST['user_nom'];
$user_cpf = $_POST['user_cpf'];
$user_email = $_POST['user_email'];
$user_log = $_POST['user_log'];
$user_psw = $_POST['user_psw'];
$user_psw = md5($user_psw);
$user_perfil = $_POST['user_perfil'];
$user_situacao = $_POST['user_situacao'];
$user_crm = $_POST['user_crm'];



if ($acao == "cadastrar"){
    
    $SQL = "insert into tanam_usuarios(user_nom, user_cpf, user_email, user_log, user_psw, user_perfil, user_situacao, user_crm) values 
    ('$user_nom','$user_cpf','$user_email','$user_log','$user_psw','$user_perfil','$user_situacao', '$user_crm')";    

    if (mysqli_query($conexao, $SQL)) {
        // Cadastro realizado com sucesso, redirecionar para usuarios.php
        header("Access-Control-Allow-Origin: usuarios.php");
    } else {
        // Ocorreu um erro ao cadastrar
        die("Ocorreu um problema! Código: 001");
    }
}else if($acao == "editar"){
    $user_id = $_POST['user_id'];

    $SQL = "UPDATE tanam_usuarios SET user_nom = '$user_nom', user_cpf = '$user_cpf', user_email = '$user_email', user_log = '$user_log', user_psw = '$user_psw', user_perfil = '$user_perfil', user_situacao = '$user_situacao', user_crm = '$user_crm' WHERE user_id = '$user_id'";

    if (mysqli_query($conexao, $SQL)) {
        // Cadastro realizado com sucesso, redirecionar para usuarios.php
        header("Access-Control-Allow-Origin: usuarios.php");
    } else {
        // Ocorreu um erro ao cadastrar
        die("Ocorreu um problema! Código: 002");
    }
}else if($acao == "deleta"){
    $user_id = $_POST['user_id'];

    $SQL = "DELETE FROM tanam_usuarios WHERE user_id = $user_id";

    @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 001");

    echo "<input type='hidden' name='sucesso' id='sucesso' value='1'>";   

} else {
    echo "<input type='hidden' name='sucesso' id='sucesso' value='0'>";    

}
