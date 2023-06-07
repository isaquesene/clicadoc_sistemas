<?php 
include "include/valida_session_usuario.php";
include "include/mysqlconecta.php";
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
                                            <h4 class="CdTitulo" style="
                                                
                                                
                                                font-style: normal;
                                                font-weight: 600;
                                                font-size: 20px;
                                                line-height: 29px;
                                                margin-bottom: 20px;">Paciente
                                            </h4>                                                             
                                        
                                            
                                            <div class="col-lg-11 align-self-center mb-3 mb-lg-0">
                                                <div class="dastone-profile-main">
                                                    <div class="dastone-profile-main-pic">
                                                        <img src="assets/images/users/user-4.jpg" alt="" height="110" class="rounded-circle">
                                                    </div>
                                                    <div class="dastone-profile_user-detail">
                                                        <h4 class="dastone-user-name">Nome do paciente: Isaque Sene</h4>                                                        
                                                        <i class="ti ti-mobile me-2 text-secondary font-16 align-middle"></i> <b> Número de telefone </b> : +91 23456 78910                                                       
                                                    </div>
                                                </div>                                                
                                            </div><!--end col-->
                                            <div class="col-lg-11 d-flex justify-content-end">
                                                <div class="row">
                                                        <p class="mb-lg-3 fw-semibold"></p>                                                    </div><!--end col-->
                                                </div><!--end row-->                                               
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end f_profile-->                                                                                
                                </div><!--end card-body-->          
                            </div> <!--end card-->    
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                
                                <div class="card-body">
                                    <div class="row">
                                        <h4 class="d-flex align-items-end"  style="
                                                    color: rgba(44, 125, 122, 1);
                                                    
                                                    font-style: normal;
                                                    font-weight: 600;
                                                    font-size: 20px;
                                                    line-height: 29px;
                                                    "
                                        >Recusa de conduta</h4>
                                    </div>
                                    <hr style="border: 1px solid rgba(44, 125, 122, 1);border-radius: 5px; place-items: center">
                                </div>
                                <div class="card-body"> 
                                    <div class="mt-3">
                                        <label class="mb-2">Observações do Médico</label>
                                        <textarea type="text" class="form-control" maxlength="25" name="alloptions" id="alloptions" placeholder=""></textarea>
                                    </div> 
                                </div> <!-- end card -->                                         
                                    <div class="card-body">                                       
                                        <div class="row">
                                            <div class="col-sm-10 ms-auto text-end">
                                                <button type="submit" class="btn btn-primary" style="border-color: rgba(44, 125, 122, 1); color: rgba(44, 125, 122, 1); background: #fff">Cancelar</button>
                                                <button type="submit" class="btn btn-primary" style="background: rgba(44, 125, 122, 1);">Salvar alterações</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    

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
        
    </body>

</html>

<script>
    $("#menu_fila_atendimento").addClass("active");
</script>