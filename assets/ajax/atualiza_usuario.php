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
$user_perfil = $_POST['user_perfil'];
$user_situacao = $_POST['user_situacao'];

if ($acao == "cadastrar"){
    
    $SQL = "insert into tanam_usuarios(user_nom, user_cpf, user_email, user_log, user_psw, user_perfil, user_situacao) values 
    ('$user_nom','$user_cpf','$user_email','$user_log','$user_psw','$user_perfil','$user_situacao')";    

    if (mysqli_query($conexao, $SQL)) {
        // Cadastro realizado com sucesso, redirecionar para usuarios.php
        header("Access-Control-Allow-Origin: usuarios.php");
        exit;
    } else {
        // Ocorreu um erro ao cadastrar
        die("Ocorreu um problema! Código: 001");
    }
}
