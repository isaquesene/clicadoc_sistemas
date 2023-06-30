<?php 
include "include/valida_session_usuario.php";
include "include/valida_session_admin.php";
include "include/mysqlconecta.php";

$_SESSION['clicadoc_conduta_cadastrada'] = '';
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
                                        <h4 class="page-title">Fila de atendimento</h4>                                        
                                    </div><!--end col-->                                                                        
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <div class="breadcrumb" style="margin-bottom: 10px;">
                        <a href="#" style="text-decoration: none; color: #000;">Atendimento</a>
                        <span style="color: #888;margin: 0 5px;"> > </span>
                        <span>Todos atendimentos</span>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">    
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-justified"  role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active text-danger" style="border-color: transparent transparent #f5325c;" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">Condutas negadas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="false">Fila de atendimentos</a>
                                        </li>                                                
                                    </ul>
    
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane p-3 active" id="home" role="tabpanel">
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
                                        <div class="tab-pane p-3" id="profile" role="tabpanel">
                                        <table id="tabela_atendimentos" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="max-width:100px;">Status</th>
                                                <th>Nome do paciente</th>
                                                <th>Data da última consulta</th>                                                
                                                <th>CPF</th> 
                                                <th>Pagamento</th>                                           
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                    </table> 
                                        </div>                                                
                                    </div>        
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->

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
        <!-- <script src="assets/pages/jquery.datatable.init.js"></script> -->

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
        url: "assets/ajax/buscar_recusa_total.php",
        type: "GET"        
    }).done(function (result) {        
        
        let data = JSON.parse(result);        
        
        $("#tabela_recusas").DataTable().clear().draw();
        $("#tabela_recusas").DataTable().rows.add(data).draw();
    });
}

//FUNÇÃO PARA REDIRECIONAR PARA ATENDIMENTO
function realizarAtendimento(anmpac_id,anmcon_id=0){
    
    let postData = [];

    postData[0] = {
        anmpac_id,
        anmcon_id
    }

    postAndRedirect('atendimentos.php', postData[0], 'POST');
}

//FUNÇÃO PARA REDIRECIONAR PARA ATENDIMENTO
function revisar(anmpac_id){

let postData = [];

postData[0] = {
    anmpac_id
}

postAndRedirect('revisar_atendimento.php', postData[0], 'POST');
}

//CRIANDO DATATABLE EM BRANCO
$("#tabela_atendimentos").DataTable({
    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json',
    },
    pageLength: 20,
    lengthMenu: [20, 30, 50, 75, 100],
    order: [],
    paging: true,
    searching: true,
    info: true,
    data: [],
    columns: [
        { data: "status" },
        { data: "anmpac_nom" },
        { data: "anmpac_data_cadastro" },
        { data: "anmpac_cpf" },
        { data: "anmpac_pagamento_status" },
        { data: "btns" }
    ]
});

//FUNÇÃO PARA BUSCAR ATENDIMENTOS
function busca_atendimentos(){ 
    $.ajax({
        url: "assets/ajax/buscar_atendimentos_adm.php",
        type: "GET"
    }).done(function (result) {        
        
        var data = JSON.parse(result);        
        
        $("#tabela_atendimentos").DataTable().clear().draw();
        $("#tabela_atendimentos").DataTable().rows.add(data).draw();
    });
}

function verDetalhes(anmpac_id){

let dadosAtendimento = [];

dadosAtendimento[0] = {
    anmpac_id
}

postAndRedirect('historico_paciente.php', dadosAtendimento[0], 'POST');
}

busca_atendimentos(); 

busca_recusas(); 
</script>