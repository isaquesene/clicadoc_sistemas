 <!-- LOGO -->
 <div class="brand" style="border-bottom: 1px solid #e6edf7;box-shadow: 0px 4px 12px rgba(103, 109, 109, 0.1);">
    <a href="#" class="logo">
        <span>
            <img src="assets/images/clicadoc.png" alt="logo-small" class="logo-sm">
        </span>
        <span>
            <img src="assets/images/clicadoc.png" alt="logo-large" class="logo-lg logo-light">
            <!-- <img src="assets/images/clicadoc.png" alt="logo-large" class="logo-lg logo-dark"> -->
        </span>
    </a>
</div>
<!--end logo-->
<div class="menu-content h-100" data-simplebar>
    <ul class="metismenu left-sidenav-menu">               
        
        <?php
        if($_SESSION["clicadoc_user_perfil"] == 1){
        ?>
            <li>
                <a href="home_adm.php" id="menu_home"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Home</span></a>                        
            </li>
            
            <li>
                <a href="fila_atendimento_adm.php" id="menu_fila_atendimento"><i class="fas fa-heartbeat"></i><span>Atendimentos</span></a>
            </li>
            
            <li>
                <a href="pacientes.php" id="menu_meus_pacientes"><i data-feather="user" class="align-self-center menu-icon"></i><span>Pacientes</span><span class="menu-arrow"></span></a>
            </li> 
            
            <li>
                <a href="dashboard_adm.php" id="menu_indicadores"><i data-feather="bar-chart" class="align-self-center menu-icon"></i><span>Indicadores</span><span class="menu-arrow"></span></a>
            </li> 
            <li>
                <a href="#" id="#"><i data-feather="users" class="align-self-center menu-icon"></i><span>Usuários</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="novo_usuario.php">Novo Usuário</a></li>
                    <li class="nav-item"><a class="nav-link" href="usuarios.php">Todos os Usuários</a></li> 
                </ul>
            </li>
            <?php
        } else {
        ?>
            <li>
                <a href="home.php" id="menu_home"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Home</span></a>                        
            </li>
    
            <li>
                <a href="fila_atendimento.php" id="menu_fila_atendimento"><i class="fas fa-heartbeat"></i><span>Atendimentos</span></a>
            </li>
    
            <li>
                <a href="meus_pacientes.php" id="menu_meus_pacientes"><i data-feather="user" class="align-self-center menu-icon"></i><span>Meus Pacientes</span><span class="menu-arrow"></span></a>
            </li> 
    
            <li>
                <a href="dashboard.php" id="menu_indicadores"><i data-feather="bar-chart" class="align-self-center menu-icon"></i><span>Indicadores</span><span class="menu-arrow"></span></a>
            </li> 
        
        <?php
        }
        ?>

    </ul>
</div>