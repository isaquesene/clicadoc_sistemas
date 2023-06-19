<?php 
include "include/valida_session_usuario.php";
include "include/valida_session_admin.php";
include "include/mysqlconecta.php";


if (!$_POST['anmpac_id']){
    header("Location: ./fila_atendimento.php");
    exit;
} else {

    $anmpac_id = $_POST['anmpac_id'];

    $SQL = "SELECT * FROM tanam_dados_pacientes tdp LEFT JOIN tanam_dados_consulta tdc ON tdp.anmpac_id = tdc.anmcon_id_paciente LEFT JOIN tanam_usuarios tu ON tdc.anmcon_id_medico = tu.user_id WHERE anmpac_id = $anmpac_id";    
    $result = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
    $rows = mysqli_fetch_array($result);

    $anmcon_id = $rows['anmcon_id'];
    
    $anmcon_datacad = $rows['anmcon_datacad'];
    if(!is_null($anmcon_datacad)){
        $anmcon_datacad = (new DateTime($anmcon_datacad))->format('d/m/Y');    
    }

    $SQL = "SELECT * FROM tanam_dados_consulta WHERE anmcon_id_paciente = $anmpac_id";
    $result = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 002");
    $qnt_consultas = mysqli_num_rows($result);
}

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8" />
    <title>ClicaDoc | Atendimento</title>
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
                                                <span class='badge rounded-pill bg-danger text-white'>RECUSADO</span>                                                   
                                            </div>
                                                                                    
                                        </div><!--end col-->                                                            
                                    
                                        
                                        <div class="col-lg-11 align-self-center mb-3 mb-lg-0">
                                            <div class="dastone-profile-main">
                                                <div class="dastone-profile-main-pic">
                                                    <img src="<?=$_SESSION['clicadoc_user_foto_perfil']?>" alt="" height="110" class="rounded-circle">
                                                </div>
                                                <div class="dastone-profile_user-detail">
                                                    <h4 class="dastone-user-name">Nome do paciente: <?=$rows['anmpac_nom'];?></h4>                                                        
                                                    <i class="ti ti-mobile me-2 text-secondary font-16 align-middle"></i> <b> Número de telefone </b> : <?=$rows['anmpac_numcel'];?>                                                    
                                                </div>
                                            </div>                                                
                                        </div><!--end col-->
                                        <div class="col-lg-12 d-flex justify-content-end">
                                            <div class="row">
                                                <p class="mb-1 fw-bold">Consultas realizadas: <?=$qnt_consultas?></p>                                                    
                                            </div><!--end row-->                                               
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end f_profile-->                                                                                
                            </div><!--end card-body-->          
                        </div> <!--end card--> 
                        
                        <form action="conduta_revisada.php" method="post"> 
                            <input type="hidden" name="anmcon_id" value="<?=$anmcon_id?>">                                    
                            <input type="hidden" name="anmpac_id" value="<?=$anmpac_id?>">                                    
                            <input type="hidden" name="anmpac_nom" value="<?=$rows['anmpac_nom']?>">
                            <input type="hidden" name="anmpac_numcel" value="<?=$rows['anmpac_numcel']?>">

                            <div class="card">                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="d-flex align-items-end"  style="
                                                        color: rgba(44, 125, 122, 1);
                                                        
                                                        font-style: normal;
                                                        font-weight: 600;
                                                        font-size: 20px;
                                                        line-height: 29px;
                                                        "
                                            >Ficha Clínica</h4>
                                        </div>
                                        <div class="col-6 ms-auto text-end">
                                            <a onclick="cancelarAtendimento()" class="btn btn-primary" style="border-color: rgba(44, 125, 122, 1); color: rgba(44, 125, 122, 1); background: #fff">CANCELAR</a>
                                            <button class="btn btn-primary" style="background: rgba(44, 125, 122, 1);">GERAR NOVA CONDUTA</button>
                                        </div>
                                    </div>
                                    
                                    <hr style="border: 1px solid rgba(44, 125, 122, 1);border-radius: 5px; place-items: center">
                                                
                                    <div class="mt-3">
                                        <label class="mb-2">Qual MEDICAMENTO você usa e precisa renovar a receita?*</label>
                                        <input type="text" class="form-control" value="<?=$rows['anmpac_med_presc'];?>" disabled/>  
                                    </div>
    
                                    <div class="mt-3">
                                        <label class="mb-2">Para qual problema de saúde, seu médico prescreveu este medicamento?*</label>
                                        <input type="text" class="form-control" value="<?=$rows['anmpac_tratamento'];?>" disabled/>
                                    </div>
    
                                    <div class="mt-3">
                                        <label class="mb-2">Tem alergia a algum medicamento?*</label>
                                        <input type="text" class="form-control" value="<?=$rows['anmpac_alergia'] == 1 ? 'Sim' : 'Não';?>" disabled/>
                                    </div>                                    
                                    <div class="mt-3">
                                        <label class="mb-2">Qual seu nome completo? (Informe corretamente, para ser colocado na sua receita)</label>
                                        <input type="text" class="form-control" value="<?=$rows['anmpac_nom'];?>" disabled/>
                                    </div> 
                                    <div class="mt-3">
                                        <label class="mb-2">Qual seu celular com DDD? (Informe corretamente, pois receberá a sua receita pelo WhatsApp)*</label>
                                        <input type="text" class="form-control" value="<?=$rows['anmpac_numcel'];?>" disabled/>
                                    </div>  
    
                                    <h4 class="card-title mt-4">Termo de Ciência e Consentimento</h4>                                
                                    
                                    <div class="card-body border">
                                        <p class="card-text text-justify">Afirmo que sou maior de idade e que todas as informações fornecidas são verdadeiras, sob as penas da lei.
                                        Autorizo o uso das minhas informações, que ficarão em sigilo e guardadas em prontuário, para fins de atendimento médico..
                                        Fui informado que a Telessaúde tem limitações, por ser uma modalidade de atendimento à distância, sem exame físico e que no caso de sintomas, devo procurar atendimento presencial.
                                        Estou ciente de que a Teletriagem, como nesse caso, é um atendimento momentâneo, que não faz novo diagnóstico, mas avalia os sinais e sintomas de um caso que já tenha diagnóstico prévio. No caso de baixo risco, o médico emite uma conduta, até o paciente retornar em seu médico presencial.
                                        Fui orientado que, assim que possível, devo retornar no meu médico.
                                        Afirmo que não tenho sinal ou sintoma de descontrole da minha doença prévia. No caso de sintoma, fui orientado a procurar atendimento presencial.
                                        Nego qualquer tipo de alergia relacionado aos medicamentos que já uso, que foram prescritos pelo meu médico.
                                        Fui informado que este é um serviço de intermediação tecnológica e que o médico tem plena autonomia para fazer o atendimento de Telessaúde, por meio da Plataforma Clica Doc, desde que haja consentimento do paciente.
                                        Todas as condutas são realizadas e as receitas são enviadas pelo médico, com total autonomia e sem interferência da Plataforma Clica Doc.
                                        A Plataforma não realiza videoconsulta e não interfere na relação médico-paciente.
                                        Aviso legal: A Clica Doc é uma empresa  de Tecnologia de Sistemas e não presta serviços médicos. A Plataforma Clica Doc é um Sistema dê Telessaúde que conecta profissionais de saúde com seus pacientes.
                                        O preço do serviço de tecnologia da Plataforma depende do uso do sistema e do profissional a ser contatado.
                                        Clica Doc Tecnologia 
                                        CNPJ: 43.722.721/0001-18
                                        São José dos Campos-SP
                                        </p>
                                    </div>
                                                                        
                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="radio" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                        Li e concordo com os termos acima.
                                        </label>
                                    </div>                                
                                </div>                                    
                            </div> <!-- end card-body -->
                            <div class="card">                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="d-flex align-items-end"  style="
                                                        color: rgba(44, 125, 122, 1);
                                                        
                                                        font-style: normal;
                                                        font-weight: 600;
                                                        font-size: 20px;
                                                        line-height: 29px;
                                                        "
                                            >Observações da consulta</h4>
                                        </div>                                    
                                    </div>
                                    
                                    <hr style="border: 1px solid rgba(44, 125, 122, 1);border-radius: 5px; place-items: center">
                                                
                                    <div class="mt-3">
                                        <p class="mb-2 fw-bold">Médico: <?=$rows['user_nom']?> - CRM/SP <?=$rows['user_crm']?></p>
                                        <p class="mb-2 fw-bold">Data da consulta: <?=$anmcon_datacad?></p>
    
                                        <div class="mt-3 mb-3">
                                            <label class="mb-2">Observações do Médico</label>
                                            <textarea type="text" rows="5" class="form-control" name="observacoes_medico" disabled><?=$rows['anmcon_observacao']?></textarea>
                                        </div>      
    
                                        <div class="row">
                                            <div class="col-sm-10 ms-auto text-end">
                                                <a onclick="cancelarAtendimento()" class="btn btn-primary" style="border-color: rgba(44, 125, 122, 1); color: rgba(44, 125, 122, 1); background: #fff">CANCELAR</a>
                                                <button class="btn btn-primary" style="background: rgba(44, 125, 122, 1);">GERAR NOVA CONDUTA</button>
                                            </div>
                                        </div> 
                                    </div>                                                               
                                </div>                                    
                            </div> <!-- end card-body -->
                        </form>
                    </div><!--end col-->
                </div><!--end row-->
            
            </div><!-- container -->

            <footer class="footer text-center text-sm-start">
                &copy; <script>
                    document.write(new Date().getFullYear())
                </script> ClicaDoc
            </footer><!--end footer-->
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
    <script src="assets/js/functions.js"></script>
    
</body>

</html>

<script>
    $("#menu_fila_atendimento").addClass("active");  
    
    function cancelarAtendimento(){
        window.location.href = "home_adm.php";
    }
    
</script>