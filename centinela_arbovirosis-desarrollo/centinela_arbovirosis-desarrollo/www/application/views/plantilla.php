<!DOCTYPE html>
<html lang="es" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $titulo . ' - ' . $title ?></title>
    <link rel="icon" href="<?php echo base_url('assets/img/logo.jpg') ?>" type="image/jpg">
 
    <link href="<?php echo base_url('assets/css/select2.min.css') ?>" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>public/css/uislide.css"> -->
    <!-- <link href="<?php echo base_url('assets/js/dataTables/datatables.min.css') ?>" rel="stylesheet" /> -->

    


    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/boxicons.css') . '?=' . rand(); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/core.css') . '?=' . rand(); ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/theme-default.css') . '?=' . rand(); ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css') . '?=' . rand(); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') . '?=' . rand(); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/apex-charts/apex-charts.css') . '?=' . rand(); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/General.css') . '?=' . rand(); ?>" />
    
    <script src="<?php echo base_url('assets/vendor/libs/jquery/jquery.js') . '?=' . rand(); ?>"></script>    
    <script src="<?php echo base_url('assets/js/jquery.metisMenu.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert2.all.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/js/helpers.js') . '?=' . rand(); ?>"></script>
    <script src="<?php echo base_url('assets/js/config.js') . '?=' . rand(); ?>"></script>
    <script src="<?php echo base_url('public/js/General.js') . '?=' . rand(); ?>"></script>    
    <script type="text/javascript" src="<?php echo base_url('assets/js/dataTables/datatables.min.js') ?>"></script>

    <script type="text/javascript">
        var base_url = "<?php print base_url(); ?>";
        var site_url = "<?php print site_url(); ?>";

        var baseURL = "<?php print base_url(); ?>";
        var siteURL = "<?php print site_url(); ?>";
    </script>
</head>
<body>

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">
                        <img src="<?php echo base_url('assets/img/mosquito.png') ?>" alt="logo" style="width: 35px;">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">arbo<i><span style="color: #9394d2;">centi</sp></i></span></span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item <?php echo (in_array($this->uri->segment(1), array('', 'inicio'))) ? 'active' : '' ?>">
                        <a href="<?php echo site_url('inicio') ?>" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-tachometer'></i>
                            <div data-i18n="Analytics">Inicio</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $this->uri->segment(1) == 'Vigilancia' ? 'active open' : '' ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons bx bx-message-square-dots'></i>
                            <div data-i18n="Authentications">Vigilancia</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo $this->uri->segment(2) == 'Fichas' ? 'active' : '' ?>">
                                <a href="<?php echo site_url('Vigilancia/Fichas') ?>" class="menu-link">
                                    <div data-i18n="Basic">Notificación</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $this->uri->segment(2) == 'Negativa' ? 'active' : '' ?>">
                                <a href="<?php echo site_url('Vigilancia/Negativa') ?>" class="menu-link">
                                    <div data-i18n="Basic">Notificación negativa</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item <?php echo $this->uri->segment(1) == 'Configuracion' ? 'active open' : '' ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons bx bx-hive'></i>
                            <div data-i18n="Authentications">Maestros</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo $this->uri->segment(2) == 'Enfermedades' ? 'active' : '' ?>">
                                <a href="<?php echo site_url('Configuracion/Enfermedades') ?>" class="menu-link">
                                    <div data-i18n="Basic">Enfermedades</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $this->uri->segment(2) == 'Serotipos' ? 'active' : '' ?>">
                                <a href="<?php echo site_url('Configuracion/Serotipos') ?>" class="menu-link">
                                    <div data-i18n="Basic">Serotipos</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $this->uri->segment(2) == 'Pruebas' ? 'active' : '' ?>">
                                <a href="<?php echo site_url('Configuracion/Pruebas') ?>" class="menu-link">
                                    <div data-i18n="Basic">Pruebas</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $this->uri->segment(2) == 'Resultados' ? 'active' : '' ?>">
                                <a href="<?php echo site_url('Configuracion/Resultados') ?>" class="menu-link">
                                    <div data-i18n="Basic">Resultados</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item <?php echo $this->uri->segment(1) == 'Manual' ? 'active open' : '' ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons bx bx-book'></i>
                            <div data-i18n="Authentications">Documentación</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo $this->uri->segment(2) == 'Manual' ? 'active' : '' ?>">
                                <a href="auth-login-basic.html" class="menu-link">
                                    <div data-i18n="Basic">Manual de usuario</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item <?php echo $this->uri->segment(2) == 'Reportes' ? 'active open' : '' ?>">
                        <a href="<?php echo site_url('Reportes/Reportes') ?>" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-cloud-download'></i>
                            <div data-i18n="Analytics">Reportes</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $this->uri->segment(2) == 'Descarga' ? 'active open' : '' ?>">
                        <a href="<?php echo site_url('Descargas/Descarga') ?>" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-data'></i>
                            <div data-i18n="Analytics">Descargas</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $this->uri->segment(2) == 'Graficos' ? 'active open' : '' ?>">
                        <a href="<?php echo site_url('Reportes/Graficos') ?>" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-bar-chart-alt' ></i>
                            <div data-i18n="Analytics">Gráficos</div>
                        </a>
                    </li>

                </ul>
            </aside>
            <div class="layout-page">
                <!-- Navbar -->
                <?php 
                    $nC = '';
                    $nNP = '';
                    $misNombres = array_diff(explode(" ",$this->session->userdata("nombres")),array("",0,null));
                    if(count($misNombres)==0){
                        $nC = 'Sin nombre';
                        $nNP = 'SN';
                    }else if(count($misNombres)==1){
                        $nC = $misNombres[0];
                        $nNP = $misNombres[0][0];
                    }else if(count($misNombres)==2||count($misNombres)==3){
                        $nC = $misNombres[0].' '.$misNombres[1];
                        $nNP = $misNombres[0][0].''.$misNombres[1][0];
                    }else if(count($misNombres)==4){
                        $nC = $misNombres[0].' '.$misNombres[2];
                        $nNP = $misNombres[0][0].''.$misNombres[2][0];
                    }else if(count($misNombres)>=5){
                        $nC = $misNombres[0].' '.$misNombres[3];
                        $nNP = $misNombres[0][0].''.$misNombres[2][0];
                    }
                ?>
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class='bx bx-station bx-burst fs-4 lh-0'></i>
                                <strong class="form-control border-0 shadow-none fw-bold">CDC-PERU</strong>
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->                           
                            <li class="nav-item lh-1 me-3">
                            <i class='bx bx-bell bx-tada-hover fs-4 lh-0' ></i>
                            </li>

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online" style="background: #a5a6ff;border-radius: 50%;display: flex;justify-content: center;color: #f4f4f9;vertical-align: middle;line-height: 0;align-items: center;">
                                        <?php echo $nNP ?>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online" style="background: #a5a6ff;border-radius: 50%;display: flex;justify-content: center;color: #f4f4f9;vertical-align: middle;line-height: 0;align-items: center;">
                                                        <?php echo $nNP ?>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block"><?php echo $nC ?></span>
                                                    <small class="text-muted"><?php echo $this->session->userdata("nivelUsuario") ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Mi perfil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Configuración</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class='flex-shrink-0 bx bx-support me-2' ></i>
                                                <span class="flex-grow-1 align-middle">Ayuda</span>
                                                <!-- <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span> -->
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item logout cursor-pointer">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Cerrar sesión</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <?php include $page_name; ?>            
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , hecho con <i class='bx bx-heart'></i> por
                                <span target="_blank" class="footer-link fw-bolder">CDC-PERÚ</span>
                            </div>
                            <div>
                                <a href="" target="_blank" class="footer-link me-4">Más aplicaciones</a>

                                <a href="" target="_blank" class="footer-link me-4">Documentación</a>

                                <a href="" target="_blank" class="footer-link me-4">Ayuda</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>


    <!-- Javascript del programador -->    
    <script src="<?php echo base_url('assets/vendor/libs/popper/popper.js') . '?=' . rand(); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/js/bootstrap.js') . '?=' . rand(); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') . '?=' . rand(); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="<?php echo base_url('public/js/uiSlide.js') . '?=' . rand(); ?>"></script>
    <script src="<?php echo base_url('public/js/jsVariablesSvg.js') . '?=' . rand(); ?>"></script>
    <script src="<?php echo base_url('assets/js/general/autosize.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/js/menu.js') . '?=' . rand(); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/libs/apex-charts/apexcharts.js') . '?=' . rand(); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js') . '?=' . rand(); ?>"></script>
    <script src="<?php echo base_url('assets/js/dashboards-analytics.js') . '?=' . rand(); ?>"></script>
    <script src="<?php echo base_url('assets/js/general/jsGeneral.js') . '?=' . rand(); ?>"></script>

    <?php
    if ($this->session->flashdata('alert-success') != '') {
    ?>
        <div class="alert alert-success alert-dismissable"><?php echo $this->session->flashdata('alert-success'); ?>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
    <?php
    }
    if ($this->session->flashdata('alert-danger') != '') {
    ?>
        <div class="alert alert-danger alert-dismissable"><?php echo $this->session->flashdata('alert-danger'); ?>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
    <?php
    }
    if ($this->session->flashdata('alert-warning') != '') {
    ?>
        <div class="alert alert-warning alert-dismissable"><?php echo $this->session->flashdata('alert-warning'); ?>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
    <?php
    }
    if ($this->session->flashdata('alert-info') != '') {
    ?>
        <div class="alert alert-info alert-dismissable"><?php echo $this->session->flashdata('alert-info'); ?>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
    <?php
    }
    ?>


    <?php
    if ($this->session->flashdata('success') != '') {
        $mensaje = $this->session->flashdata('success');
        echo "<script language=\"javascript\">alertSuccess('" . $mensaje . "');</script>";
    }

    if ($this->session->flashdata('warning') != '') {
        $mensaje = $this->session->flashdata('warning');
        echo "<script language=\"javascript\">alertWarning('" . $mensaje . "');</script>";
    }

    if ($this->session->flashdata('info') != '') {
        $mensaje = $this->session->flashdata('info');
        echo "<script language=\"javascript\">alertInfo('" . $mensaje . "');</script>";
    }

    if ($this->session->flashdata('error') != '') {
        $mensaje = $this->session->flashdata('error');
        echo "<script language=\"javascript\">alertError('" . $mensaje . "');</script>";
    }
    ?>



</body>

</html>