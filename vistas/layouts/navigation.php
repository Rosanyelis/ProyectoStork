<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center"
    data-nav="brand-center">
    <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="#">
                    <h2 class="brand-text mb-0">Gestión Plants</h2>
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="javascript:void(0);">
                        <i class="ficon" data-feather="menu"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">John Doe</span>
                        <span class="user-status">Admin</span>
                    </div>
                    <span class="avatar">
                        <img class="round" src="../../public/app-assets//images/portrait/small/avatar-s-11.jpg"
                            alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0);">
                        <i class="mr-50" data-feather="power"></i> Cerrar Sesion
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border"
        role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="#">
                        <h2 class="brand-text mb-0">Gestión Plants</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
                    <a class=" nav-link d-flex align-items-center" href="../dashboard/dashboard.php">
                        <i data-feather='home'></i>
                        <span data-i18n="Dashboards">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a class=" nav-link d-flex align-items-center" href="#">
                        <i data-feather='grid'></i>
                        <span data-i18n="Administración">Administración</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li data-menu="">
                            <a class="dropdown-item d-flex align-items-center" href="../bodega/bodega.php" 
                                data-toggle="dropdown" data-i18n="Bodega">
                                <i data-feather='archive'></i><span data-i18n="Bodega">Bodega </span>
                            </a>
                        </li>
                        <li data-menu="">
                            <a class="dropdown-item d-flex align-items-center" href="../facturas/facturas.php" data-toggle="dropdown"
                                data-i18n="Adquisiciones">
                                <i data-feather='gift'></i><span data-i18n="Adquisiciones">Adquisiciones </span>
                            </a>
                        </li>
                        <li data-menu="">
                            <a class="dropdown-item d-flex align-items-center" href="../campos/campos.php" data-toggle="dropdown"
                                data-i18n="Mi Campo">
                                <i data-feather='layers'></i><span data-i18n="Mi Campo">Mi Campo </span>
                            </a>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu">
                            <a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#"
                                data-toggle="dropdown" data-i18n="Personal">
                                <i data-feather='users'></i><span data-i18n="Personal">Personal </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li data-menu="">
                                    <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="dropdown"
                                        data-i18n="Contratistas">
                                        <i data-feather="circle"></i>
                                        <span data-i18n="Contratistas">Contratistas</span>
                                    </a>
                                </li>
                                <li data-menu="">
                                    <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="dropdown"
                                        data-i18n="Colaboradores">
                                        <i data-feather="circle"></i>
                                        <span data-i18n="Colaboradores">Colaboradores</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a class=" nav-link d-flex align-items-center" href="#">
                    <i data-feather='sliders'></i>
                        <span data-i18n="Control de Procesos">Control de Procesos</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li data-menu="">
                            <a class="dropdown-item d-flex align-items-center" href="" data-toggle="dropdown"
                                data-i18n="Orden de Trabajo">
                                <i data-feather='briefcase'></i><span data-i18n="Orden de Trabajo">Orden de Trabajo </span>
                            </a>
                        </li>
                        <li data-menu="">
                            <a class="dropdown-item d-flex align-items-center" href="" data-toggle="dropdown"
                                data-i18n="Presupuesto">
                                <i data-feather='dollar-sign'></i><span data-i18n="Presupuesto">Presupuesto </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a class=" nav-link d-flex align-items-center" href="#">
                        <i data-feather='user'></i>
                        <span data-i18n="Recursos Humanos">Recursos Humanos</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li data-menu="">
                            <a class="dropdown-item d-flex align-items-center" href="" data-toggle="dropdown"
                                data-i18n="Remuneraciones">
                                <i data-feather="circle"></i><span data-i18n="Remuneraciones">Remuneraciones</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a class=" nav-link d-flex align-items-center" href="#">
                        <i data-feather='tool'></i>
                        <span data-i18n="Utilitario">Utilitario</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li data-menu="">
                            <a class="dropdown-item d-flex align-items-center" href="" data-toggle="dropdown"
                                data-i18n="Configuración General">
                                <i data-feather='settings'></i><span data-i18n="Configuración General">Configuración General</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->