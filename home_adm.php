<?php 
include "include/valida_session_usuario.php";
include "include/valida_session_admin.php";
include "include/mysqlconecta.php";

$user_id = $_SESSION["clicadoc_user_id"];

$sql_total_consultas_realizadas = "SELECT COUNT(*) AS total_consultas_realizadas FROM tanam_dados_consulta WHERE anmcon_conduta = 1";    
$result_total_consultas_realizadas = @mysqli_query($conexao,$sql_total_consultas_realizadas) or die("Ocorreu um erro! 001");
$rows_total_consultas_realizadas = mysqli_fetch_array($result_total_consultas_realizadas);

$total_consultas_realizadas = $rows_total_consultas_realizadas['total_consultas_realizadas'];

$sql_total_atendimentos = "SELECT COUNT(*) AS total_atendimentos FROM tanam_dados_consulta";    
$result_total_atendimentos = @mysqli_query($conexao,$sql_total_atendimentos) or die("Ocorreu um erro! 001");
$rows_total_atendimentos = mysqli_fetch_array($result_total_atendimentos);

$total_atendimentos = $rows_total_atendimentos['total_atendimentos'];

$sql_total_pacientes = "SELECT COUNT(DISTINCT tdp.anmpac_cpf) AS total_pacientes FROM tanam_dados_pacientes tdp LEFT JOIN tanam_dados_consulta tdc ON tdp.anmpac_id = tdc.anmcon_id_paciente";    
$result_total_pacientes = @mysqli_query($conexao,$sql_total_pacientes) or die("Ocorreu um erro! 001");
$rows_total_pacientes = mysqli_fetch_array($result_total_pacientes);

$total_pacientes = $rows_total_pacientes['total_pacientes'];
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>ClicaDoc | Administração</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

        <!-- jvectormap -->
        <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

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
                                        <h4 class="page-title">Desempenho</h4>                                        
                                    </div><!--end col-->                                    
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card report-card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-auto align-self-center">
                                                    <div class="report-main">
                                                        <!--<i data-feather="users" class="align-self-center text-muted icon-sm"></i>-->
                                                        <img src="assets/images/consulta.png" class="w-45 p-0" alt="...">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-0 text-truncate text-muted text-right"></span>Consultas Realizadas</p>
                                                    <h3 class="m-0"><?=$total_consultas_realizadas?></h3>
                                                </div>
                                            </div>
                                        </div><!--end card-body--> 
                                    </div><!--end card--> 
                                </div> <!--end col--> 
                                <div class="col-md-6 col-lg-4">
                                    <div class="card report-card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">                                                
                                            <div class="col-auto align-self-center">
                                                    <div class="report-main">
                                                        <!--<i data-feather="users" class="align-self-center text-muted icon-sm"></i>-->
                                                        <img src="assets/images/atendimento.png" class="w-45 p-2" alt="...">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-0 text-truncate text-muted text-right"></span>Total de atendimentos</p>
                                                    <h3 class="m-0"><?=$total_atendimentos?></h3>
                                                </div>
                                            </div>
                                        </div><!--end card-body--> 
                                    </div><!--end card--> 
                                </div> <!--end col--> 
                                <div class="col-md-6 col-lg-4">
                                    <div class="card report-card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">                                                
                                            <div class="col-auto align-self-center">
                                                    <div class="report-main">
                                                        <!--<i data-feather="users" class="align-self-center text-muted icon-sm"></i>-->
                                                        <img src="assets/images/pacientes.png" class="w-45 p-0" alt="...">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-0 text-truncate text-muted text-right"></span>Pacientes</p>
                                                    <h3 class="m-0"><?=$total_pacientes?></h3>
                                                </div>
                                            </div>
                                        </div><!--end card-body--> 
                                    </div><!--end card--> 
                                </div> <!--end col--> 
                                                             
                            </div><!--end row-->
                        </div><!--end col-->                       
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">Revisar condutas</h4>                                        
                                    </div><!--end col-->                                    
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!--Table Recusa-->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <table id="tabela_recusas" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="max-width:100px;">Status</th>
                                                <th>Nome do paciente</th>
                                                <th>Medicamento</th>
                                                <th>Data</th>                                                
                                                <th>CPF</th>                                            
                                                <th style="min-width:100px;"></th>                                            
                                            </tr>
                                        </thead>
                                    </table>        
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <!--Table-->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">Últimos atendimentos</h4>                                        
                                    </div><!--end col-->                                    
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!--Table Recusa-->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <table id="tabela_ultimos_atendimentos" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Nome do paciente</th>
                                                <th>Data da consulta</th>                                                
                                                <th>Nome do médico</th>                                            
                                                <th style="min-width:130px;">Ações</th>                                            
                                            </tr>
                                        </thead>
                                    </table>        
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <!--Table-->

                    <!--modal REVISAR consultas RECUSADO -->
                    <!--<div class="col-12" style="display:none" class="" id="area_revisar"></div>-->

                    <button type="button" id="area" data-bs-toggle="modal" data-bs-target="#area_abrir" hidden></button>

                    <div class="modal fade"  id="area_abrir">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h6 class="modal-title m-0 text-white">Revisar Recusa</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div><!--end modal-header-->
                                <div class="modal-body">
                                    <div class="row">
                                        <div id="area_revisar">

                                        </div>
                                    </div><!--end row-->                                                     
                                </div><!--end modal-body-->
                                <div class="modal-footer">                                                    
                                    <button type="button" class="btn btn-soft-danger btn-sm" data-bs-dismiss="modal">Close</button>
                                </div><!--end modal-footer-->
                            </div><!--end modal-content-->
                        </div><!--end modal-dialog-->
                    </div><!--end modal-->
                    
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

        <!-- jQuery  -->
        <script src="assets/js/metismenu.min.js"></script>

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

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        
    </body>

</html>

<script>
    $("#menu_home").addClass("active");

    //CRIANDO DATATABLE EM BRANCO
    $("#tabela_ultimos_atendimentos").DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json',
        },
        pageLength: 12,
        lengthMenu: [],
        order: [],
        paging: false,
        searching: false,
        info: false,
        data: [],
        columns: [
            { data: "anmpac_nom" },
            { data: "anmcon_datacad" },
            { data: "user_nom" },
            { data: "btns" }
        ]
    });

    //FUNÇÃO PARA BUSCAR ATENDIMENTOS
    function busca_ultimos_atendimentos(){ 
        $.ajax({
            url: "assets/ajax/buscar_ultimos_atendimentos.php",
            type: "GET"        
        }).done(function (result) {        
            
            let data = JSON.parse(result);        
            
            $("#tabela_ultimos_atendimentos").DataTable().clear().draw();
            $("#tabela_ultimos_atendimentos").DataTable().rows.add(data).draw();
        });
    }

    //CRIANDO DATATABLE EM BRANCO
    $("#tabela_recusas").DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json',
        },
        pageLength: 5,
        lengthMenu: [],
        order: [],
        paging: false,
        searching: false,
        info: false,
        data: [],
        columns: [
            { data: "status" },
            { data: "anmpac_nom" },
            { data: "anmpac_med_presc" },
            { data: "anmcon_datacad" },
            { data: "anmpac_cpf" },
            { data: "btns" }
        ]
    });

    //FUNÇÃO PARA BUSCAR ATENDIMENTOS
    function busca_recusas(){ 
        $.ajax({
            url: "assets/ajax/buscar_recusa.php",
            type: "GET"        
        }).done(function (result) {        
            
            let data = JSON.parse(result);        
            
            $("#tabela_recusas").DataTable().clear().draw();
            $("#tabela_recusas").DataTable().rows.add(data).draw();
        });
    }

    //FUNÇÃO PARA REDIRECIONAR PARA ATENDIMENTO
    function realizarAtendimento(anmpac_id){
        
        let postData = [];

        postData[0] = {
            anmpac_id
        }

        postAndRedirect('atendimentos.php', postData[0], 'POST');
    }

    function verDetalhes(anmcon_id){

        let dadosAtendimento = [];

        dadosAtendimento[0] = {
            anmcon_id
        }

        postAndRedirect('detalhes_atendimento_adm.php', dadosAtendimento[0], 'POST');

    }

    //ABRIR MODAL
    function revisar(anmpac_id) {
  
    $.ajax({
        url: "assets/ajax/seleciona_recusa.php",
        type: "POST",
        data: { acao_recusa: 'seleciona_recusa', anmpac_id },
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function(data){

            $('#area_revisar').html(data);
            $('#area_revisar').show();
            $('#area').click()
                            
        },
        error: function () {
            Toastify({
                text: 'Ocorreu um erro, tente novamente.',
                duration: 3000,
                close:true,
                gravity:"top",
                position: "center",
                backgroundColor: "#f3616d",
            }).showToast(); 
        }
    });
    
}

    busca_ultimos_atendimentos();
    busca_recusas();
</script>