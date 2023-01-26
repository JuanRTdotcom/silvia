<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="es"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo APP_URL_PUBLIC_ASSETS?>"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Iniciar sesiòn | Genesis</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo APP_URL_PUBLIC_IMAGE ?>genesis.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo APP_URL_PUBLIC_ASSETS?>vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo APP_URL_PUBLIC_ASSETS?>vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo APP_URL_PUBLIC_ASSETS?>vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo APP_URL_PUBLIC_ASSETS?>css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo APP_URL_PUBLIC_ASSETS?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo APP_URL_PUBLIC_ASSETS?>vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="<?php echo APP_URL_PUBLIC_ASSETS?>vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo APP_URL_PUBLIC_ASSETS?>js/config.js"></script>
  </head>

  <body>
    <!-- Content -->
    <input type="hidden" name="" id="APP_URL" value="<?php echo APP_URL?>">
    <script>
        var APP_URL = document.getElementById('APP_URL').value
    </script>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                <img src="<?php echo APP_URL_PUBLIC_IMAGE . 'logo.png' ?>" class="mt-2" width="40" alt="">
                  <span class="app-brand-text demo text-body fw-bolder">genesis</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Bienvenido! 👋</h4>
              <p class="mb-4">Por favor ingresa tu cuenta para acceder a todas las opciones</p>

              <form id="login" class="mb-3" >
                <div class="mb-3">
                  <label for="user" class="form-label">Usuario</label>
                  <input
                    type="text"
                    class="form-control"
                    id="user"
                    name="email-username"
                    placeholder="Ingresa tu usuario"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="pass">Contraseña</label>
                    <!-- <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a> -->
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="pass"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Recordar ingreso </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100 registrar" type="submit">Ingresar</button>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo APP_URL_PUBLIC_ASSETS?>vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo APP_URL_PUBLIC_ASSETS?>vendor/libs/popper/popper.js"></script>
    <script src="<?php echo APP_URL_PUBLIC_ASSETS?>vendor/js/bootstrap.js"></script>
    <script src="<?php echo APP_URL_PUBLIC_ASSETS?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?php echo APP_URL_PUBLIC_ASSETS?>vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?php echo APP_URL_PUBLIC_ASSETS?>js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="<?php echo APP_URL_PUBLIC_JS . 'login/login.js?' . rand() ?>"></script>
  </body>
</html>
