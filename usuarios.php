<?php 
include "include/valida_session_usuario.php";
include "include/valida_session_admin.php";
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

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

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
                        <a href="usuarios.php" style="color: #888;margin: 0 5px;">Usuários cadastrados</a>
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row text-center">
                                    <label style="display: flex; align-items: center;" class="mb-2">Filtro</label>
                                        <div class="col-sm-2" style="display: flex; align-items: center; border: 1px #D6D6D6 solid; border-radius: 5px;">
                                            <i class="fas fa-filter" style="margin-left: 5px; color: #FF7F32"></i>                                          
                                            <input type="text" class="form-control" placeholder="Buscar por nome/CPF" style="border: none"/>  
                                        </div>
                                        <div class="col-sm-10 text-end mt-2">
                                            <a class="btn btn-warning" href="novo_usuario.php" style="color: #fff; background: #FF7F32;"><i class="dripicons-plus" style="place-items: center"></i> Novo usuário</a>
                                        </div> 
                                    </div>                                            
                                </div><!--end card-header-->
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
         
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <table id="tabela_usuarios" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Nome do usuário</th>
                                                <th>CPF</th>                                            
                                                <th>Data de cadastro</th>
                                                <th>Perfil Usuário</th>
                                                <th>Status do usuário</th>
                                                <th>Opções</th>
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
        
        <!-- Sweet-Alert  -->
        <script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>  

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script src="assets/js/functions.js"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        
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

$("#menu_fila_atendimento").addClass("active");

//CRIANDO DATATABLE EM BRANCO
$("#tabela_usuarios").DataTable({
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
        { data: "user_nom" },
        { data: "user_cpf" },
        { data: "user_primeiro_acesso" },
        { data: "user_perfil" },
        { data: "user_situacao" },
        { data: "btns" }
    ]
});

//FUNÇÃO PARA BUSCAR ATENDIMENTOS
function busca_usuarios(){ 
    $.ajax({
        url: "assets/ajax/buscar_usuarios.php",
        type: "GET"        
    }).done(function (result) {        
        
        var data = JSON.parse(result);        
        
        $("#tabela_usuarios").DataTable().clear().draw();
        $("#tabela_usuarios").DataTable().rows.add(data).draw();
    });
}

function mudaStatus(user_id,user_status){

    const formData = new FormData()
    formData.append('user_id', user_id)
    formData.append('user_status', user_status)
       
    $.ajax({
        url: 'assets/ajax/muda_status_usuario.php',
        type: 'POST',
        data:  formData,
        contentType: false,
        cache: false,
        processData:false,  
                    
        success: function(data) {                
            let result = $.parseJSON(data);

            if(result.success){
                
                msg.fire({ icon: 'success', title: 'Atualização realizada.' }); 
                busca_usuarios(); 
                return
            } 

            msg.fire({ icon: 'error', title: 'Ocorreu um erro.' });           
                        
        },
        error: function () {                
                
            msg.fire({ icon: 'error', title: 'Ocorreu um erro.' });            
        }
    });   
}

//FUNÇÃO PARA REDIRECIONAR PARA ATENDIMENTO
function editar(user_id){
    
    let postData = [];

    postData[0] = {
        user_id
    }

    postAndRedirect('editar_usuario.php', postData[0], 'POST');
}

//DELETAR
function excluir(user_id) {

    let deletar = confirm("Tem certeza que deseja excluir o usuário?")

    if (deletar) {
        $.ajax({
            url: "assets/ajax/atualiza_usuario.php",
            type: "POST",
           // data: jQuery.param({ acao: 'deleta', user_id }),
            data: { acao_usuario: 'deleta', user_id },
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: function(data){

                var retorno_sucesso = $(data).filter("#sucesso").val();

                if(retorno_sucesso === '1'){                    
                    Toastify({
                        text: 'Remoção realizada com sucesso.',
                        duration: 3000,
                        close:true,
                        gravity:"top",
                        position: "center",
                        backgroundColor: "#4fbe87",
                    }).showToast(); 
                    location.reload();
                } else {
                    Toastify({
                        text: 'Ocorreu um erro, tente novamente.',
                        duration: 3000,
                        close:true,
                        gravity:"top",
                        position: "center",
                        backgroundColor: "#f3616d",
                    }).showToast(); 

                }                   
            }
        });
    }
}


busca_usuarios(); 
</script>
