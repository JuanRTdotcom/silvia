<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - :: NOTI-<?php echo $this->config->item('nombre_proyecto');?> ::</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet" />

    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <link href="<?php echo base_url('assets/css/font-plantilla.css')?>" rel='stylesheet' type='text/css' />

    <link rel="icon" href="<?php echo base_url('assets/img/logo.jpg')?>" type="image/jpg">    
</head>
<body>
    <?php
    if($this->session->flashdata('exito') != ''){
      ?>
      <div class="alert alert-success alert-dismissable"><?php echo $this->session->flashdata('exito'); ?>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
      <?php
    }
    if($this->session->flashdata('error') != ''){
      ?>
      <div class="alert alert-danger alert-dismissable"><?php echo $this->session->flashdata('error'); ?>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
      <?php
    }
    if($this->session->flashdata('warning') != ''){
      ?>
      <div class="alert alert-warning alert-dismissable"><?php echo $this->session->flashdata('warning'); ?>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
      <?php
    }
    if($this->session->flashdata('info') != ''){
      ?>
      <div class="alert alert-info alert-dismissable"><?php echo $this->session->flashdata('info'); ?>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
      <?php
    }
    ?>

    <div class="row">
        <div id="aplicativo" class="col-md-12">
            <?php
          echo   $this->config->item('nombre_proyecto');
            ?>
        </div>
    </div>     
    
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <img src="<?php echo base_url('assets/img/logo.png')?>" alt="logo" width="370">
                <h2> CDC - Perú : Login</h2>
               
                <h5>( ¿Olvidó su contraseña? )</h5>
                 <br />
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>   Ingrese su correo registrado para recibir su contraseña </strong>  
                    </div>
                    <div class="panel-body">
                        <?php
                        $atributos = array('id'=>'form1', 'name'=>'form1', 'class'=>'login-form');
                        echo form_open(null, $atributos);
                        ?>
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"  ></i></span>
                                <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="Correo electrónico " required="required" />
                            </div>
                            <button id="login" name="login" class="btn btn-danger btn-block">
                              <span>
                                <i class="fa fa-paper-plane-o fa-lg"></i>
                              </span>
                              &nbsp;&nbsp;Enviar
                            </button>
                            <hr />
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    
                                </label>
                                <span class="pull-right">
                                   <a href="<?php echo site_url('login')?>" >Login </a> 
                                </span>
                            </div>
                        <?php
                        echo form_close();
                        ?>  
                        <div class="row">
                            <div class="col-xs-12">
                                <h5><p style="font-size: 12px; text-align: center;">Para comunicarse con el área de <b>Soporte Técnico</b> envíe un correo a: <b>soporte@dge.gob.pe</b> ó haga click en la siguiente dirección <a href="http://soporte.dge.gob.pe" target='_new'><b>https://soporte.dge.gob.pe</b></a></p></h5>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.js')?>"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url('assets/js/jquery.metisMenu.js')?>"></script>

    <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>

    <script src="<?php echo base_url('assets/js/osiris.js')?>"></script>
   
</body>
</html>
