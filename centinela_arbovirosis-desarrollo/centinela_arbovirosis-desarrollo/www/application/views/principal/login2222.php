<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - :: NOTI-<?php echo $this->config->item('nombre_proyecto'); ?> ::</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet" />



    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('assets/css/custom.css') . "?=" . rand(); ?>" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href="<?php echo base_url('assets/css/font-plantilla.css') ?>" rel='stylesheet' type='text/css' />

    <link rel="icon" href="<?php echo base_url('assets/img/logo.jpg') ?>" type="image/jpg">

    <script type="text/javascript">
        var baseURL = "<?php print base_url(); ?>";
        var siteURL = "<?php print site_url(); ?>";
    </script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        h2 {
            color: #df2a30;
            font-family: 'Raleway', sans-serif;
            font-size: 30px;
            font-weight: 800;
            line-height: 36px;
            text-align: center;

        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin .checkbox {
            font-weight: normal;
        }

        .form-signin .form-control {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .form-signin input[type="password"] {
           
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .account-wall {
            margin-top: 20px;
            padding: 40px 0px 20px 0px;
            background-color: #f7f7f7;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .login-title {
            color: #555;
            font-size: 18px;
            font-weight: 400;
            display: block;
        }

        .profile-img {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        .need-help {
            margin-top: 10px;
        }

        .new-account {
            display: block;
            margin-top: 10px;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            max-width: 100%;
            height: auto;
        }

        .bg-dark {
            background-color: #bf0909 !important;
        }

        .navbar {
            border-radius: 0px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="row">
            <br>
            <img src="<?php echo base_url('assets/img/logo_cdc.jpeg') ?>" alt="logo" width="600px" height="50px" class="center">
            <h2> <?php
                    echo $this->config->item('nombre_proyecto');;
                    ?></h2>
            <div class="col-sm-6 col-md-4 col-md-offset-4">

                <div class="account-wall">
                    <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                    <?php
                        $atributos = array('id'=>'form1', 'name'=>'form1', 'class'=>'form-signin', 'autocomplete'=>'off');
                        echo form_open(null, $atributos);
                        ?>
                        <input type="text" id="txtUsuario" name="txtUsuario" class="form-control" placeholder="Usuario"  autofocus>
                        <?php echo form_error('txtUsuario', '<div class="text-danger">', '</div>'); ?>
                        <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Contraseña" >
                        <?php echo form_error('txtPassword', '<div class="text-danger">', '</div>'); ?>
                        <div class="text-center" style="margin-bottom: 10px;margin-top: 10px;">
                            <?php echo $captcha['image']; ?>
                        </div>
                        <input  type="text" id="captcha" name="captcha" class="form-control" placeholder="Ingrese los dígitos mostrados..." >
                        <?php echo form_error('captcha', '<div style="margin-bottom:10px;" class="text-danger">', '</div>'); ?>
                        <button style="margin-top: 10px;" class="btn btn-lg btn-primary btn-block" type="submit">
                            Iniciar Sesión</button>

                        <a  href="<?php echo site_url('login/olvido')?>" class="pull-right need-help">Olvidé mi contraseña? </a><span class="clearfix"></span>
                        <?php
                        echo form_close();
                        ?>  
                </div>

            </div>
        </div>
    </div>


    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js')?>"></script>    
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert2.all.min.js') ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/login/jsLogin.js') ?>"></script>
	

    <?php
    if($this->session->flashdata('success') != ''){
      $mensaje = $this->session->flashdata('success');
      echo "<script language=\"javascript\">alertSuccess('".$mensaje."');</script>";
    }

    if($this->session->flashdata('warning') != ''){
      $mensaje = $this->session->flashdata('warning');
      echo "<script language=\"javascript\">alertWarning('".$mensaje."');</script>";
    }

    if($this->session->flashdata('info') != ''){
      $mensaje = $this->session->flashdata('info');
      echo "<script language=\"javascript\">alertInfo('".$mensaje."');</script>";
    }

    if($this->session->flashdata('error') != ''){
      $mensaje = $this->session->flashdata('error');
     
      echo "<script>alertError('".$mensaje."');</script>";
    }
    ?> 

</body>

</html>