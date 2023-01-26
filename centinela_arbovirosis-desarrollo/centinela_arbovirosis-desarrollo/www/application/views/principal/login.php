<!DOCTYPE html>
<html>
<html lang="es" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template-free">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<title>Bienvenido a <?php echo $title ?></title>

<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

<link rel="stylesheet" href="./assets/vendor/fonts/boxicons.css" />
<link rel="stylesheet" href="./assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="./assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="./assets/css/demo.css" />
<link rel="stylesheet" href="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

<link rel="stylesheet" href="./assets/vendor/css/pages/page-auth.css" />

<script src="./assets/vendor/js/helpers.js"></script>
<script src="./assets/js/config.js"></script>



<!-- BOOTSTRAP STYLES-->
<!-- <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet" /> -->
<!-- FONTAWESOME STYLES-->
<!-- <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet" /> -->



<!-- CUSTOM STYLES-->
<!-- <link href="<?php echo base_url('assets/css/custom.css') . "?=" . rand(); ?>" rel="stylesheet" /> -->
<!-- GOOGLE FONTS-->
<!-- <link href="<?php echo base_url('assets/css/font-plantilla.css') ?>" rel='stylesheet' type='text/css' /> -->

<link rel="icon" href="<?php echo base_url('assets/img/logo.jpg') ?>" type="image/jpg">

<script type="text/javascript">
    var baseURL = "<?php print base_url(); ?>";
    var siteURL = "<?php print site_url(); ?>";
</script>
</head>

<body>

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <!-- <div class="card-header">
                        </div> -->

                    <div class="card-body">
                        <!-- /Logo -->
                        <!-- <h4 class="mb-2 fs-6">Bienvenido a</h4> -->
                        <div class="text-center mb-4 mt-3">
                            <img src="<?php echo base_url('assets/img/mosquito.png') ?>" alt="logo" style="width: 85px;">
                        </div>
                        <a class="app-brand-link gap-2 mb-4 mt-2 text-center">
                            <span class="app-brand-text w-100 demo text-body fw-bolder fs-3" style="text-transform: uppercase;line-height: 0.8;"><strong>Arbovirus</strong><br><i><span style="color: #9394d2;font-size: 16px;">centinela</sp></i></span>
                        </a>
                        <?php
                        $atributos = array('id' => 'form1', 'name' => 'form1', 'class' => 'login-form', 'autocomplete' => 'off');
                        echo form_open(null, $atributos);
                        ?>
                        <div class="mb-3 input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Usuario" autofocus autocomplete="off" />
                            <?php echo form_error('txtUsuario', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="mb-3 input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-lock-alt'></i></span>
                            <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Contraseña" aria-describedby="password" />
                                <!-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> -->
                        </div>
                            <?php echo form_error('txtPassword', '<div class="text-danger">', '</div>'); ?>                        

                        <div class="mb-3 text-center" style="filter: hue-rotate(226deg);">
                            <?php echo $captcha['image']; ?>
                        </div>
                        <div class="mb-3 input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-dialpad-alt'></i></span>
                            <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Ingresa los dígitos mostrados" autofocus autocomplete="off" />
                            <?php echo form_error('captcha', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="mb-3">
                            <button id="login" name="login" class="btn btn-primary d-grid w-100">Ingresar</button>
                        </div>
                        <?php
                        echo form_close();
                        ?>

                        <p class="text-center">
                            <small>¿Olvidaste tu contraseña?</small>
                            <a href="https://app7.dge.gob.pe/notiWeb/index.php/index/olvido#no-back-button">
                                <small>Entra aquí</small>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="./assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./assets/vendor/libs/popper/popper.js"></script>
    <script src="./assets/vendor/js/bootstrap.js"></script>
    <script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="./assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="./assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- JQUERY SCRIPTS -->
    <!-- <script src="<?php echo base_url('assets/js/jquery-1.10.2.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>     -->
    <!-- BOOTSTRAP SCRIPTS -->
    <!-- <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script> -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert2.all.min.js') ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/login/jsLogin.js') ?>"></script>


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

        echo "<script>alertError('" . $mensaje . "');</script>";
    }
    ?>



</body>

</html>