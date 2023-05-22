<?php 
include "include/valida_session_usuario.php";
include "include/mysqlconecta.php";
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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">


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
                                        <h4 class="page-title">Fila de atendimento</h4>                                        
                                    </div><!--end col-->                                                                        
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <div class="breadcrumb" style="margin-bottom: 10px;">
                        <a href="primeiro_acesso.php" style="text-decoration: none; color: #000;">Home</a>
                        <span style="color: #888;margin: 0 5px;"> > </span>
                        <a href="fila_atendimento.php" style="text-decoration: none; color: #000;">Fila de atendimento</a>
                        <span style="color: #888;margin: 0 5px;"> > </span>
                        <span>Pacientes em espera</span>
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="CdTitulo" style="
                                    color: #FF7F32;
                                    font-family: 'Poppins', sans-serif;
                                    font-style: normal;
                                    font-weight: 600;
                                    font-size: 20px;
                                    line-height: 29px;">Fila de atendimento</h4>
                                    
                                    <hr style="border: 1px solid #FF7F32;border-radius: 5px;">

                                    <div class="row">
                                        <div class="col-md-2 align-self-center">
                                            <p>Filtros</p>                                            
                                        </div>
                                        <div class="col-md-5"> 
                                            <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Ordenar:</span>
                                            <select class="form-control">
                                                <option value="">Selecione...</option>
                                                <option value="">opção1</option>
                                                <option value="">opção2</option>
                                                <option value="">opção3</option>
                                            </select>
                                            </div>
                                        </div><!-- end col -->
                                                                             
                                        <div class="col-md-5"> 
                                            <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Status:</span>
                                            <select class="form-control">
                                                <option value="">Selecione...</option>
                                                <option value="">opção1</option>
                                                <option value="">opção2</option>
                                                <option value="">opção3</option>
                                            </select>
                                            </div>
                                        </div><!-- end col -->                                                
                                    </div><!-- end row --> 
                                </div><!--end card-header-->
                                
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Nome do paciente</th>
                                            <th>Medicamento</th>
                                            <th>Data</th>
                                            <th>Telefone</th>
                                            <th>Ação</th>
                                        </tr>
                                        </thead>
    
                                        <tbody>                                        
                                        <tr>
                                            <td>Donna Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td>27</td>
                                            <td>2011/01/25</td>
                                            <td>$112,000</td>
                                        </tr>
                                        <tr>
                                            <td>Donna Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td>28</td>
                                            <td>2011/01/25</td>
                                            <td>$112,000</td>
                                        </tr>
                                        <tr>
                                            <td>Donna Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td>29</td>
                                            <td>2011/01/25</td>
                                            <td>$112,000</td>
                                        </tr>
                                        </tbody>
                                    </table>        
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

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
        <script src="assets/plugins/huebee/huebee.pkgd.min.js"></script>
        <script src="assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
        <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
        <script src="assets/pages/jquery.forms-advanced.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        
    </body>

</html>

<script>

$("#menu_fila_atendimento").addClass("active");

$(document).ready(function () {
    $("#datatable").DataTable(),        
        $("#datatable-buttons")
            .DataTable({ lengthChange: !1, buttons: ["copy", "excel", "pdf", "colvis"] })
            .buttons()
            .container()
            .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
})

function busca_atendimentos(){ 
    
    $('#btn_submit').prop('disabled', false);
    $("#loading").removeClass("d-flex").addClass("d-none"); 

    if (dataTable){ dataTable.destroy(); }
    
    dataTable = new simpleDatatables.DataTable(tabela, {
        ajax: {
            url: "assets/ajax/busca_atendimentos.php"
        }
    }); 

    $('#carregando').css("display", "none");
    $('#area_efetivo').show();

    $([document.documentElement, document.body]).animate({
    scrollTop: $("#tabela").offset().top
    }, 1000);

}

</script>