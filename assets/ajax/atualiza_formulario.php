<?php	
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

if(isset($_POST['submit'])){
    $anmpac_med_presc = $_POST['aanmpac_med_presc'];
    $anmpac_tratamento = $_POST['anmpac_tratamento'];
    $anmpac_alergia = $_POST['anmpac_alergia'];
    $anmpac_nom = $_POST['anmpac_nom'];
    $anmpac_numcel = $_POST['anmpac_numcel'];
    
    $SQL = "insert into tanam_dados_pacientes(anmpac_med_presc, anmpac_tratamento, anmpac_alergia, anmpac_nom, anmpac_numcel) values 
    ('$anmpac_med_presc','$anmpac_tratamento','$anmpac_alergia','$anmpac_nom','$anmpac_numcel')";    
    @mysqli_query($conexao,$SQL) or die("Ocorreu um problema! Código: 001");  

}

