
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>ClicaDoc | Esqueci minha senha</title>
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
                                                <input type="hidden" name="acao" value="recuperar_senha">
                
                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="username">Email</label>
                                                    <div class="input-group">                                                                                         
                                                        <input type="email" class="form-control"  name="email" id="email" placeholder="Digite o seu email" required />
                                                    </div>                                    
                                                </div><!--end form-group-->

                                                <div class="form-group row my-3">                                                    
                                                    <div class="col-sm-6">
                                                        <a href="./" class="text-muted font-13"><i class="dripicons-lock"></i> Lembrei minha senha</a>                                    
                                                    </div><!--end col--> 
                                                </div><!--end form-group--> 
                    
                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" id="btn_submit">Recuperar senha</button>
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

    $('#form-login').submit(function(e) {
        
        e.preventDefault();
        $('#btn_submit').prop('disabled', true);
        $("#loading").removeClass("d-none").addClass("d-flex");        

        var formData = new FormData(this);

        $.ajax({
            url: 'assets/enviar_email.php',
            type: 'POST',
            data:  formData,
            contentType: false,
            cache: false,
            processData:false,  
                       
            success: function(data) {                
                let result = $.parseJSON(data);

                if(result.success){
                    
                    msg.fire({ icon: 'success', title: 'Email enviado com sucesso.' });  
                    $('#email').val('') ;
                    
                    $('#btn_submit').prop('disabled', false);
                    $("#loading").removeClass("d-flex").addClass("d-none"); 

                    return;                 
                    
                } 

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
</script>