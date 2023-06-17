<?php 
include "include/valida_session_usuario.php";
include "include/valida_session_admin.php";
include "include/mysqlconecta.php";


if (!$_POST['user_id']){
    header("Location: ./usuarios.php");
    exit;
} else {

    $user_id = $_POST['user_id'];

    $SQL = "SELECT * FROM tanam_usuarios WHERE user_id = $user_id";    

    $result = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
    $linhas_json = array();

    $rows = mysqli_fetch_array($result);
}
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
                                        <h4 class="page-title">Usuários</h4>                                        
                                    </div><!--end col-->                                                                        
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <div class="breadcrumb" style="margin-bottom: 10px;">
                        <a href="#" style="text-decoration: none; color: #000;">Usuários</a>
                        <span style="color: #888;margin: 0 5px;"> > </span>
                        <a href="usuarios.php" style="text-decoration: none; color: #000;">Usuários cadastrados</a>
                        <span style="color: #888;margin: 0 5px;"> > </span>
                        <span>Cadastrar novo usuário</span>
                    </div>
                    <!-- end page title end breadcrumb -->
                    <!--formulario add_usuarios-->
                    <div class="card">                                
                        <div class="card-body">
                            <div class="row">

                                <div class="col-6">

                                    <h4 class="d-flex align-items-end"  style="
                                                color: rgba(44, 125, 122, 1);
                                                
                                                font-style: normal;
                                                font-weight: 600;
                                                font-size: 30px;
                                                line-height: 29px;
                                                "
                                    >Editar usuário</h4><br>

                                    <h4 class="d-flex align-items-end"  style="
                                                color: rgba(44, 125, 122, 1);
                                                
                                                font-style: normal;
                                                font-weight: 600;
                                                font-size: 20px;
                                                line-height: 29px;
                                                "
                                    >Identificação</h4>
                                </div>
                            
                            
                            <hr style="border: 1px solid rgba(44, 125, 122, 1);border-radius: 5px; place-items: center">
                                        
                            <form class="form-horizontal well" id="formulario_usuario" method="post">

                            <div class="row">

                            <input type="hidden" name="user_id" id="acao_usuario" value="<?=$rows['user_id']?>">
                           

                            <div class="row mb-3">
                                <a onclick="goBack()" style="cursor:pointer;font-weight: 700;font-size: 16px;color: #2C7D7A;"><i class="mdi mdi-arrow-left"></i> Voltar</a>
                            </div>

                                <div class="mt-3 col-sm-12">
                                    <label class="mb-2">Nome do usuário</label>
                                    <input type="text" class="form-control" placeholder="Nome completo" id="user_nom" name="user_nom" value="<?=$rows['user_nom'];?>"/>  
                                </div>
    
                                <div class="mt-3 col-sm-6">
                                    <label class="mb-2">CPF</label>
                                    <input type="text" class="form-control" placeholder="___.___.___-__" id="user_cpf" name="user_cpf" value="<?=$rows['user_cpf'];?>"/>
                                </div>
    
                                <div class="mt-3 col-sm-6">
                                    <label class="mb-2">Seu e-mail</label>
                                    <input type="email" class="form-control" placeholder="@exemplo.com" id="user_email" name="user_email" value="<?=$rows['user_email'];?>"/>
                                </div>      
    
                                <div class="mt-3 col-sm-6">
                                    <label class="mb-2">Login</label>
                                    <input type="text" class="form-control" placeholder="Digite o login do usuário" id="user_log" name="user_log" value="<?=$rows['user_log'];?>"/>
                                </div>
    
                                <div class="mt-3 col-sm-6">
                                    <label class="mb-2">Senha</label>
                                    <input type="password" class="form-control" placeholder="Digite uma senha" id="user_psw" name="user_psw" value="<?=$rows['user_psw'];?>"/>
                                </div>     
                                
                                <div class="mt-3 col-sm-6">
                                    <label class="mb-2">CRM</label>
                                    <input type="text" class="form-control" placeholder="CRM" id="user_crm" name="user_crm" value="<?=$rows['user_crm'];?>"/>
                                </div>
    
                                <div class="mt-3 col-sm-6"> 
                                    <label class="mb-2">Perfil de usuário</label>
                                    <select class="form-control" id="user_perfil" name="user_perfil">
                                    <?php if ($rows['user_perfil'] == 0): ?>
                                        <option value="0" selected>Médico</option>
                                        <option value="1">Administrador</option>
                                    <?php else: ?>
                                        <option value="1" selected>Administrador</option>
                                        <option value="0">Médico</option>
                                    <?php endif; ?>
                                    </select>
                                </div>
    
                                <div class="mt-3 col-sm-6"> 
                                    <label class="mb-2">Status</label>
                                    <select class="form-control" id="user_situacao" name="user_situacao">
                                        <option value="<?=$rows['user_situacao'];?>"><?=$rows['user_situacao'];?></option>
                                        <option value="ativo">Ativo</option>
                                        <option value="inativo">Inativo</option>
                                    </select>
                                </div>
    
                                <div class="row mt-3">
                                    <div class="col-sm-10 ms-auto text-end">
                                        <a class="btn btn-primary" style="border-color: rgba(44, 125, 122, 1); color: rgba(44, 125, 122, 1); background: #fff" onclick="goBack()">Cancelar</a>
                                        <input type="submit" class="btn btn-primary" style="background: rgba(44, 125, 122, 1);" value="Salvar alterações"/>
                                    </div>
                                </div>
                            </div>

                            </form>
                            </div>
                        </div>                                    
                    </div> <!-- end card-body -->

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

        <!--CADASTRO VIA AJAX-->
    <script>
       $(document).ready(function(){
        $("#formulario_usuario").submit(function(e){
            e.preventDefault();
            
            // Verifica se é uma ação de edição
            var user_id = $("#acao_usuario").val();
            if (user_id !== '') {
            $.ajax({
                type: "POST",
                url: "assets/ajax/atualiza_usuario.php",
                data: {
                acao_usuario: 'editar',
                user_id: user_id,
                user_nom: $("#user_nom").val(),
                user_cpf: $("#user_cpf").val(),
                user_email: $("#user_email").val(),
                user_log: $("#user_log").val(),
                user_psw: $("#user_psw").val(),
                user_perfil: $("#user_perfil").val(),
                user_situacao: $("#user_situacao").val(),
                user_crm: $("#user_crm").val(),
                },
                success: function(response){
                window.location.href = "usuarios.php";
                }
            });
            }
        });
    });

    //VOLTAR A PÁGINA
    function goBack() {
        history.back();
    }

    </script>
        
    </body>

</html>