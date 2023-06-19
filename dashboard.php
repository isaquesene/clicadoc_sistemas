<?php 
include "include/valida_session_usuario.php";
include "include/mysqlconecta.php";

$user_id = $_SESSION["clicadoc_user_id"];

$sql_total_consultas_realizadas = "SELECT COUNT(*) AS total_consultas_realizadas FROM tanam_dados_consulta WHERE anmcon_id_medico = $user_id AND anmcon_conduta = 1";    
$result_total_consultas_realizadas = @mysqli_query($conexao,$sql_total_consultas_realizadas) or die("Ocorreu um erro! 001");
$rows_total_consultas_realizadas = mysqli_fetch_array($result_total_consultas_realizadas);

$total_consultas_realizadas = $rows_total_consultas_realizadas['total_consultas_realizadas'];

$sql_total_atendimentos = "SELECT COUNT(*) AS total_atendimentos FROM tanam_dados_consulta WHERE anmcon_id_medico = $user_id";    
$result_total_atendimentos = @mysqli_query($conexao,$sql_total_atendimentos) or die("Ocorreu um erro! 001");
$rows_total_atendimentos = mysqli_fetch_array($result_total_atendimentos);

$total_atendimentos = $rows_total_atendimentos['total_atendimentos'];

//TOTAL DE PACIENTES
$sql_total_pacientes = "SELECT COUNT(*) AS total_pacientes FROM tanam_dados_pacientes WHERE anmpac_pagamento_status = 'realizado'";    
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
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">Indicadores</h4>                                        
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

                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Atendimentos</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto"> 
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   <span id="filtroAtual">Este Ano</span><i class="las la-angle-down ms-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" id="filtro_grafico">
                                                    <a class="dropdown-item" href="#" id="todayBtn">Hoje</a>
                                                    <a class="dropdown-item" href="#" id="weekBtn">Última semana</a>
                                                    <a class="dropdown-item" href="#" id="monthBtn">Último mês</a>
                                                    <a class="dropdown-item" href="#" id="yearBtn">Este ano</a>
                                                </div>
                                            </div>               
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="chart-demo">
                                        <div id="apex_column1" class="apex-charts"></div>
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

        <script src="assets/plugins/apex-charts/apexcharts.min.js"></script>
        <script src="assets/plugins/apex-charts/irregular-data-series.js"></script>
        <script src="assets/plugins/apex-charts/ohlc.js"></script>
        <!-- <script src="assets/pages/jquery.apexcharts.init.js"></script> -->

        <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
        <script src="assets/pages/jquery.analytics_dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        
    </body>

</html>

<script>
    $("#menu_indicadores").addClass("active");

    options = {
        chart: { height: 396, type: "bar", toolbar: { show: true } },
        plotOptions: { bar: { horizontal: !1 } },
        dataLabels: { enabled: !1 },
        stroke: { show: !0, width: 2, colors: ["transparent"] },
        colors: ["rgba(42, 118, 244, .18)", "#2a76f4", "rgba(251, 182, 36, .6)"],
        series: [],
        xaxis: {},
        legend: { offsetY: 6 },        
        fill: { opacity: 1 },
        grid: { row: { colors: ["transparent", "transparent"], opacity: 0.5 }, borderColor: "#f1f3fa" },
        tooltip: {
            y: {
                formatter: function (e) {
                    return e;
                },
            },
        },
    };
    (chart = new ApexCharts(document.querySelector("#apex_column1"), options)).render();

    var user_id = <?php echo $user_id;?>;

    function fetchData(period) {

        let categories;

        const url = 'assets/ajax/atualiza_grafico_dashboard.php?user_id=' + encodeURIComponent(user_id) + '&period=' + period

        if (period === "week") {                    
            categories = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"];
        } else if (period === "month") {                    
            categories = ["Semana 1", "Semana 2", "Semana 3", "Semana 4"];
        } else if (period === "year") {                    
            categories = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
        } else if (period === "today"){
            categories = ["Hoje"];
        }

        //REQUISIÇÃO AJAX
        fetch(url)
            .then(response => response.json())
            .then(data => {
                const total_atendimentos = data.total_atendimentos;
                const total_atendimentos_array = Object.values(total_atendimentos);
                //ATUALIZANDO GRÁFICO CONFORME RESPOSTA DA REQUISIÇÃO
                chart.updateOptions({
                    series: [{ name: "Atendimentos", data: total_atendimentos_array }], 
                    xaxis: { categories },               
                    
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }
    
    const todayBtn = document.getElementById("todayBtn");
    const weekBtn = document.getElementById("weekBtn");
    const monthBtn = document.getElementById("monthBtn");
    const yearBtn = document.getElementById("yearBtn");

    todayBtn.addEventListener("click", function() {        
        $("#filtroAtual" ).html('Hoje');
        fetchData("today");
    });

    weekBtn.addEventListener("click", function() {  
        $("#filtroAtual" ).html('Última semana');
        fetchData("week");
    });
    
    monthBtn.addEventListener("click", function() {
        $("#filtroAtual" ).html('Último mês');
        fetchData("month");
    });
    
    yearBtn.addEventListener("click", function() {
        $("#filtroAtual" ).html('Este ano');
        fetchData("year");
    });

    fetchData('year');

</script>