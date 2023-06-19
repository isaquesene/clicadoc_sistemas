<?php 
include "include/valida_session_usuario.php";
include "include/mysqlconecta.php";

if (!$_POST['anmpac_id']){
    header("Location: ./fila_atendimento.php");
    exit;
} else {

    $anmpac_id = $_POST['anmpac_id'];
    $anmcon_id = $_POST['anmcon_id'];

    $acao = $_POST['acao'];

    $SQL = "UPDATE tanam_dados_pacientes SET anmpac_em_atendimento = 1 WHERE anmpac_id = $anmpac_id";
    @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");

    $SQL = "INSERT INTO tanam_controle_consulta (cont_id_paciente,cont_data_inicio_atendimento) VALUES ($anmpac_id,now())";
    @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");

    $SQL = "SELECT * FROM tanam_dados_pacientes WHERE anmpac_id = $anmpac_id";
    $result = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
    $rows = mysqli_fetch_array($result);
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
                                </div>                                                                      
                            </div>                                                              
                        </div><!--end page-title-box-->
                    </div>
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
                                                   
                                            <div class="h-25">
                                                <span class='badge rounded-pill bg-warning text-dark'>EM ATENDIMENTO</span>                                                   
                                            </div>
                                                                                      
                                        </div>
                                        
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
                                        </div>
                                        <div class="col-lg-12 d-flex justify-content-end">
                                            <div class="row font-16">                                                
                                                <div>Tempo restante: <span id="contador"></span></div>                                                 
                                            </div>                                              
                                        </div>                                      
                                    </div>                                                                                                                  
                                </div>
                            </div>        
                        </div> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="conduta_enviada.php" method="post">

                                    <input type="hidden" name="anmpac_id" value="<?=$anmpac_id?>">
                                    <input type="hidden" name="anmcon_id" value="<?=$anmcon_id?>">
                                    <input type="hidden" name="acao" value="<?=$acao?>">
                                    <input type="hidden" name="anmpac_nom" value="<?=$rows['anmpac_nom']?>">
                                    <input type="hidden" name="anmpac_numcel" value="<?=$rows['anmpac_numcel']?>">

                                    <div class="row mb-3">
                                        <a onclick="voltarParaFicha()" style="cursor:pointer;font-weight: 700;font-size: 16px;color: #2C7D7A;"><i class="mdi mdi-arrow-left"></i> Voltar para ficha</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="d-flex align-items-end"  style="
                                                        color: rgba(44, 125, 122, 1);                                                    
                                                        font-style: normal;
                                                        font-weight: 600;
                                                        font-size: 20px;
                                                        line-height: 29px;
                                                        "
                                            ><?=$acao == 'gerar' ? 'Gerar Conduta' : 'Recusa de Conduta' ?></h4>
                                        </div>
                                        <div class="col-6 ms-auto text-end">
                                            <a onclick="cancelar()" class="btn btn-primary" style="border-color: rgba(44, 125, 122, 1); color: rgba(44, 125, 122, 1); background: #fff">Cancelar</a>
                                            <button type="submit" class="btn btn-primary" style="background: rgba(44, 125, 122, 1);">Salvar alterações</button>
                                        </div>
                                    </div>
                                    <hr style="border: 1px solid rgba(44, 125, 122, 1);border-radius: 5px; place-items: center">
                                    
                                    <?php if($acao == 'gerar'){ ?>
                                        <div class="mt-1">
                                            <label class="mb-2">Prescrições do Médico</label>
                                            <textarea type="text" rows="5" class="form-control" name="conduta_medico" required></textarea>
                                        </div> 
                                    <?php } ?>

                                    <div class="mt-3 mb-3">
                                        <label class="mb-2">Observações do Médico</label>
                                        <textarea type="text" rows="5" class="form-control" name="observacoes_medico"></textarea>
                                    </div> 
                                                                    
                                    <div class="row">
                                        <div class="col-sm-10 ms-auto text-end">
                                            <a onclick="cancelar()" class="btn btn-primary" style="border-color: rgba(44, 125, 122, 1); color: rgba(44, 125, 122, 1); background: #fff">Cancelar</a>
                                            <button type="submit" class="btn btn-primary" style="background: rgba(44, 125, 122, 1);">Salvar alterações</button>
                                        </div>
                                    </div>                                    
                                </form>
                            </div>
                        </div> <!-- end card-body -->
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

    var anmpac_id = <?php echo $anmpac_id;?>;
    var anmcon_id = <?php echo $anmcon_id;?>;

    function voltarParaFicha(){

        cancelar_atendimento(anmpac_id,anmcon_id);

        let dadosConduta = [];

        dadosConduta[0] = {
            anmpac_id,
            anmcon_id     
        }

        postAndRedirect('atendimentos.php', dadosConduta[0], 'POST');
    }

    function cancelar(){
        cancelar_atendimento(anmpac_id,anmcon_id);
        window.location.href = "fila_atendimento.php";
    }

    function cancelar_atendimento(anmpac_id,anmcon_id){
        
        $.ajax({
            url: 'assets/ajax/cancelar_atendimento.php',
            type: 'POST',
            data:  { anmpac_id,anmcon_id },
                        
            success: function(data) {  
                console.log('sucesso')                
            },
            error: function () {                
                console.log('ocorreu um erro')                    
            }
        });   
    }

    function startCountdown(minutes) {
        var seconds = minutes * 60;
        var countdownElement = document.getElementById("contador");

        var countdownInterval = setInterval(function() {
        var minutesDisplay = Math.floor(seconds / 60);
        var secondsDisplay = seconds % 60;

        if (secondsDisplay < 10) {
            secondsDisplay = "0" + secondsDisplay;
        }

        countdownElement.innerHTML = minutesDisplay + ":" + secondsDisplay;

        if (seconds <= 0) {
            clearInterval(countdownInterval);
            countdownElement.innerHTML = "Contagem regressiva concluída!";
            cancelar();
        }

        seconds--;
        }, 1000);
    }

    // Chamar a função para iniciar o contador regressivo de 15 minutos
    startCountdown(15);

</script>