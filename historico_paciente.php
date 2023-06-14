<?php 
include "include/valida_session_usuario.php";
include "include/valida_session_admin.php";
include "include/mysqlconecta.php";

$anmpac_id = $_POST['anmpac_id'];

if($anmpac_id == '' || $anmpac_id == 0 || is_null($anmpac_id)){
    header("Location: pacientes.php");
    exit;
}

$anmpac_id = $_POST['anmpac_id'];

$SQL = "SELECT * FROM tanam_dados_pacientes WHERE anmpac_id = $anmpac_id";
$result = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
$rows = mysqli_fetch_array($result);

$SQL = "SELECT * FROM tanam_dados_consulta WHERE anmcon_id_paciente = $anmpac_id";
$result = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 002");
$qnt_consultas = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>ClicaDoc | Paciente</title>
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
                                        <h4 class="page-title">Pacientes</h4>                                        
                                    </div><!--end col-->                                                                        
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <div class="breadcrumb" style="margin-bottom: 10px;">                        
                        <a style="text-decoration: none; color: #000;">Pacientes</a>  
                        <span style="color: #888;margin: 0 5px;"> > </span>
                        <span>Histórico de pacientes</span>
                        <span style="color: #888;margin: 0 5px;"> > </span>
                        <span>Consultas do paciente</span>                      
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dastone-profile">
                                        <div class="row">
                                            <div class="col-lg-12 d-flex justify-content-between">
                                                
                                                <h4 class="page-title" style="margin-top:-3px">Paciente</h4>                                                  
                                                                                        
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
                                    </div>
                                </div><!--end card-body-->          
                            </div> <!--end card-->    
                        </div><!--end col-->
                    </div><!--end row-->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <table id="tabela_meus_pacientes" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Nome do paciente</th>
                                                <th>Data da última consulta</th>                                                
                                                <th>CPF</th>                                            
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
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

var anmpac_id = <?php echo $anmpac_id;?>;

//CRIANDO DATATABLE EM BRANCO
$("#tabela_meus_pacientes").DataTable({
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
        { data: "anmpac_nom" },
        { data: "anmcon_datacad" },
        { data: "anmpac_cpf" },
        { data: "btns" }
    ]
});

//FUNÇÃO PARA BUSCAR ATENDIMENTOS
function busca_consultas() { 
    $.ajax({
        url: "assets/ajax/buscar_consultas_pacientes.php",
        type: "GET",
        data: {
            anmpac_id
        }
    }).done(function(result) {        
        var data = JSON.parse(result);        
        
        $("#tabela_meus_pacientes").DataTable().clear().draw();
        $("#tabela_meus_pacientes").DataTable().rows.add(data).draw();
    });
}

function verDetalhes(anmpac_id){

    let dadosAtendimento = [];

    dadosAtendimento[0] = {
        anmpac_id
    }

    postAndRedirect('detalhes_atendimento_adm.php', dadosAtendimento[0], 'POST');
}

busca_consultas(); 
</script>