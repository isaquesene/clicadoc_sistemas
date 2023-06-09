<?php 
include "include/valida_session_usuario.php";
include "include/mysqlconecta.php";

if (!$_POST['anmpac_id'] || $_SESSION['clicadoc_conduta_cadastrada'] == $_POST['anmpac_id']){
    
    header("Location: ./fila_atendimento.php");
    exit;
    
} else {   

    $anmpac_id = $_POST['anmpac_id'];
    $anmcon_id = $_POST['anmcon_id'];
    $acao = $_POST['acao'];
    $anmpac_nom = $_POST['anmpac_nom'];
    $anmpac_numcel = $_POST['anmpac_numcel'];
    
    $gerar_ou_negar = 0;
    $conduta_medico = '';
    $imagem = 'justificativa_recusa.png';

    if($acao == 'gerar'){
        $conduta_medico = $_POST['conduta_medico'];
        $gerar_ou_negar = 1;
        $imagem = 'sucesso.png';
    }
    $observacoes_medico = $_POST['observacoes_medico'];

    if(($conduta_medico == '' && $acao == 'gerar')){

        $SQL = "UPDATE tanam_dados_pacientes SET anmpac_em_atendimento = 0 WHERE anmpac_id = $anmpac_id";
        @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");

        $SQL1 = "DELETE FROM tanam_controle_consulta WHERE cont_id_paciente = $anmpac_id";
        @mysqli_query($conexao,$SQL1) or die("Ocorreu um erro! 001");

        header("Location: ./fila_atendimento.php");
        exit;
    }

    if(($observacoes_medico == '' && $acao == 'negar')){

        $SQL = "UPDATE tanam_dados_pacientes SET anmpac_em_atendimento = 0 WHERE anmpac_id = $anmpac_id";
        @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");

        $SQL1 = "DELETE FROM tanam_controle_consulta WHERE cont_id_paciente = $anmpac_id";
        @mysqli_query($conexao,$SQL1) or die("Ocorreu um erro! 001");
        
        header("Location: ./fila_atendimento.php");
        exit;
    }

    $anmcon_id_medico = $_SESSION['clicadoc_user_id'];

    if($anmcon_id == 0){

        $SQL = "INSERT INTO tanam_dados_consulta (anmcon_conduta,anmcon_conduta_medica,anmcon_observacao,anmcon_id_paciente,anmcon_id_medico) 
                VALUES ($gerar_ou_negar,'$conduta_medico','$observacoes_medico',$anmpac_id,$anmcon_id_medico)";    
    } else {
        $SQL = "UPDATE tanam_dados_consulta SET anmcon_conduta=$gerar_ou_negar,anmcon_conduta_medica='$conduta_medico',
                anmcon_observacao='$observacoes_medico',anmcon_id_paciente=$anmpac_id,anmcon_id_medico=$anmcon_id_medico 
                WHERE anmcon_id=$anmcon_id";
    }
    
    @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
    
    $SQL3 = "UPDATE tanam_dados_pacientes SET anmpac_em_atendimento = 0 WHERE anmpac_id = $anmpac_id";
    @mysqli_query($conexao,$SQL3) or die("Ocorreu um erro! 001");

    $SQL4 = "DELETE FROM tanam_controle_consulta WHERE cont_id_paciente = $anmpac_id";
    @mysqli_query($conexao,$SQL4) or die("Ocorreu um erro! 001");

    $_SESSION['clicadoc_conduta_cadastrada'] = $anmpac_id;    
}
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8" />
    <title>ClicaDoc | Médico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

    <!-- Plugins css -->
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/huebee/huebee.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="">
        <!-- Left Sidenav -->        
        <div class="left-sidenav">           
            <?php include "left_menu.php";?>
        </div>
        <!-- end left-sidenav-->        

        <div class="page-wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">            
                <!-- Navbar -->
                <?php include "navbar.php";?>                
                <!-- end navbar-->
            </div>
            <!-- Top Bar End -->

            <!-- Page Content-->
            <div class="page-content" style="background-color: #F2F3F3;">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">Atendimentos</h4>                                        
                                    </div><!--end col-->                                                                        
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dastone-profile">
                                        <div class="row">
                                            <div class="col-lg-12 d-flex justify-content-between">
                                                
                                                <h4 class="page-title" style="margin-top:-3px">Paciente</h4>
                                                    
                                                <div class="h-25">
                                                    <span class='badge rounded-pill bg-success text-dark'>CONCLUÍDO</span>                                                   
                                                </div>
                                                                                        
                                            </div><!--end col-->  
                                            
                                            <div class="col-lg-11 align-self-center mb-3 mb-lg-0">
                                                <div class="dastone-profile-main">
                                                    <div class="dastone-profile-main-pic">
                                                        <img src="<?=$_SESSION['clicadoc_user_foto_perfil']?>" alt="" height="110" class="rounded-circle">
                                                    </div>
                                                    <div class="dastone-profile_user-detail">
                                                        <h4 class="dastone-user-name">Nome do paciente: <?=$anmpac_nom;?></h4>                                                        
                                                        <i class="ti ti-mobile me-2 text-secondary font-16 align-middle"></i> <b> Número de telefone </b> : <?=$anmpac_numcel;?>                                                    
                                                    </div>
                                                </div>                                                
                                            </div><!--end col-->
                                            
                                        </div><!--end row-->                                                                                                                   
                                    </div>                                                                             
                                </div><!--end card-body-->          
                            </div> <!--end card-->    
                        </div><!--end col-->
                    </div><!--end row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    </div class="row">
                                        <img src="assets/images/<?=$imagem?>" class="img-fluid mx-auto d-flex" alt="..."> 
                                        <div class="card-body">
                                            <div class="card-body">
                                                <p class="card-text" style="text-align: center;">A prescrição médica do paciente foi enviada com sucesso.
                                                    Estamos comprometidos em fornecer o melhor  <br>  atendimento médico possível, 
                                                    e sabemos que isso inclui a entrega segura e rápida de prescrições médicas.
                                                </p> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div><!-- container -->

                <?php include "footer.php";?>  
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metismenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/feather.min.js"></script>
        <script src="assets/js/simplebar.min.js"></script>
        <script src="assets/js/moment.js"></script>
        <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

        <!-- Required datatable js -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap5.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap5.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="assets/pages/jquery.datatable.init.js"></script>

        <!-- Plugins js -->
      
        <script src="assets/plugins/select2/select2.min.js"></script>
        
        <script src="assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
        <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
        

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        
    </body>

</html>

<script>
    $("#menu_fila_atendimento").addClass("active");
</script>