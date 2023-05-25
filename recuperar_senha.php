<?php
if(!isset($_GET['token'])){
    header("Location: ./");
    exit;
}

include "./include/mysqlconecta.php";

$token = $_GET['token']; 

$SQL = "select * from tanam_usuarios where user_token_recuperar_senha = '$token'"; 
$result = @mysqli_query($conexao,$SQL) or die("Erro, código:001");                                            
$rows = mysqli_fetch_array($result);

$user_id = $rows['user_id'];
$nome = $rows['user_nom'];
$situacao = $rows['user_situacao'];

if(!isset($nome) || $situacao != 'ativo'){
    header("Location: ./");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>ClicaDoc | Recuperar senha</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

        <!-- Sweet Alert -->
        <link href="assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/animate/animate.css" rel="stylesheet" type="text/css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body accountbg">

        <!-- Log In page -->
        <div class="container">
            <div class="row vh-100 d-flex justify-content-center">
                <div class="col-12 align-self-center">
                    <div class="row">
                        <div class="col-lg-5 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3 mt-3">
                                        <a href="./" class="logo logo-admin">
                                            <img src="assets/images/clicadoc.png" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white font-18"></h4>   
                                        
                                    </div>
                                </div>
                                <div class="card-body p-0">                                    
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">                                        
                                            <form class="form-horizontal auth-form" id="form-login">
                                                <input type="hidden" name="acao" value="trocar_senha">
                                                <input type="hidden" name="user_id" value="<?=$user_id?>">
                
                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="password">Digite sua nova senha</label>                                            
                                                    <div class="input-group">                                  
                                                        <input type="password" class="form-control" name="password" id="password">
                                                    </div>                               
                                                </div>
            
                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="conf_password">Confirme sua senha</label>                                            
                                                    <div class="input-group">                                   
                                                        <input type="password" class="form-control" name="conf_password" id="conf_password">
                                                    </div>
                                                </div>
                                                <div class="alert alert-light alert-dismissible fade show border-0 my-3" role="alert" id="lista_requisito">
                                                    <strong>A senha deverá possuir obrigatoriamente as seguintes características:</strong>
                                                    <ul class="mt-2">
                                                        <li id="requisito_maiuscula" style="display:flex;">- Uma letra maiúscula<i style="display:none;" id="check_m" class="dripicons-checkmark"></i></li>
                                                        <li id="requisito_especial" style="display:flex;">- Um caráter especial<i style="display:none;" id="check_e" class="dripicons-checkmark"></i></i></li>
                                                        <li id="requisito_numero" style="display:flex;">- E um número<i style="display:none;" id="check_n" class="dripicons-checkmark"></i></li>
                                                    </ul>                                                
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                    
                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" id="btn_submit">Criar nova senha</button>
                                                    </div><!--end col--> 
                                                </div> <!--end form-group-->   
                                                
                                                <div id="loading" class="d-none flex-column align-items-center justify-content-center mt-4">
                                                    <div class="spinner-grow text-primary" role="status" aria-hidden="true"></div>
                                                    <strong>Aguarde...</strong>
                                                </div>
                                            </form><!--end form-->
                                        </div>                                        
                                    </div>
                                </div><!--end card-body-->
                                <div class="card-body bg-light-alt text-center">
                                    <span class="text-muted d-none d-sm-inline-block">ClicaDoc © <script>
                                        document.write(new Date().getFullYear())
                                    </script></span>                                            
                                </div>
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Log In page -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/feather.min.js"></script>
        <script src="assets/js/simplebar.min.js"></script>

        <!-- Sweet-Alert  -->
        <script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
    </body>

</html>

<script>
    //INSTANCIANDO MODAL
    const msg = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    //AO ENVIAR FORMULÁRIO
    $('#form-login').submit(function(e) {
    e.preventDefault();
    $('#btn_submit').prop('disabled', true);
    $("#loading").removeClass("d-none").addClass("d-flex");

    let password = $('#password').val();
    let conf_password = $('#conf_password').val();

    // VERIFICA SE AS SENHAS SÃO IGUAIS
    if (password !== conf_password) {
        msg.fire({ icon: 'error', title: 'As senhas devem ser iguais.' });
        $('#btn_submit').prop('disabled', false);
        $("#loading").removeClass("d-flex").addClass("d-none");
        return;
    }

    var possuiLetraMaiuscula = /[A-Z]/.test(password);
    var possuiCaractereEspecial = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password);
    var possuiNumero = /[0-9]/.test(password);

    // VERIFICA SE CUMPRE OS REQUISITOS
    if (!possuiLetraMaiuscula || !possuiCaractereEspecial || !possuiNumero) {
        msg.fire({ icon: 'error', title: 'A senha não cumpre os requisitos mínimos' });
        $('#btn_submit').prop('disabled', false);
        $("#loading").removeClass("d-flex").addClass("d-none");
        return;
    }

    // RESTANTE DO SEU CÓDIGO...
    var formData = new FormData(this);
    // ...


        //REQUSIÇÃO
        $.ajax({
            url: 'assets/ajax/alterar_senha.php',
            type: 'POST',
            data:  formData,
            contentType: false,
            cache: false,
            processData:false,  
                       
            success: function(data) {                
                let result = $.parseJSON(data);

                //EM CASO DE SUCESSO
                if(result.success){
                    
                    $('#password').val('') ;                    
                    $('#conf_password').val('') ;                    
                    msg.fire({ icon: 'success', title: 'Senha criada com sucesso, redirecionando.' });
                    location.href="./";   
                    return;                 
                    
                } 

                //EM CASO DE ERRO
                msg.fire({ icon: 'error', title: 'Ocorreu um erro, tente novamente.' });
                $('#btn_submit').prop('disabled', false);
                $("#loading").removeClass("d-flex").addClass("d-none"); 
                            
            },
            error: function () {                
                    
                msg.fire({ icon: 'error', title: 'Ocorreu um erro, tente novamente.' });
                $('#btn_submit').prop('disabled', false);
                $("#loading").removeClass("d-flex").addClass("d-none");             
            }
        });        
    });

    // ATUALIZA A CLASSE CSS DO REQUISITO DE LETRA MAIÚSCULA
    $('#password').on('input', function() {
        var password = $(this).val();
        var possuiLetraMaiuscula = /[A-Z]/.test(password);
        var requisitoMaiuscula = $('#requisito_maiuscula');
        var check_m = $('#check_m');
        var possuiCaractereEspecial = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password);
        var requisitoEspecial = $('#requisito_especial');
        var check_e = $('#check_e');
        var possuiNumero = /[0-9]/.test(password);
        var requisitoNumero = $('#requisito_numero');
        var check_n = $('#check_n');

        if (possuiLetraMaiuscula) {
            requisitoMaiuscula.css('color', 'green');
            check_m.css('display', 'block');

        } else {
            requisitoMaiuscula.css('color', '');
            check_m.css('display', 'none');

        }

        if (possuiCaractereEspecial) {
            requisitoEspecial.css('color', 'green');
            check_e.css('display', 'block');
        } else {
            requisitoEspecial.css('color', '');
            check_e.css('display', 'none');
        }

        if (possuiNumero) {
            requisitoNumero.css('color', 'green');
            check_n.css('display', 'block');
        } else {
            requisitoNumero.css('color', '');
            check_n.css('display', 'none');
        }
    });
</script>