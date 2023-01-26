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
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo APP_URL_PUBLIC_ASSETS ?>"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Silvia | Genesis</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo APP_URL_PUBLIC_IMAGE ?>genesis.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- Page CSS -->
    <?php echo view('Estructura/Estilos_view') ?>
  </head>
<body>
  <!-- <div class="bg_backdrop">
    <img src="<?php echo APP_URL_PUBLIC_VIDEO ?>cargando.gif" alt="Cargando...">
  </div>  -->
<style>
  body {
    background-color: #F5F7FF !important;
}
.bg_backdrop{
  width: 100%;
    height: 100%;
    position: fixed;
    background: #ffffff7a;
    display: flex;
    z-index: 999999;
    justify-content: center;
    align-items: center;
}
</style>

<script>
  let APP_URL = "<?php echo APP_URL ?>"
  let APP_URL_PUBLIC_IMAGE = "<?php echo APP_URL_PUBLIC_IMAGE ?>"
  let APP_URL_PUBLIC = "<?php echo APP_URL_PUBLIC ?>"
</script>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="<?php echo APP_URL ?>" class="app-brand-link">
            <img src="<?php echo APP_URL_PUBLIC_IMAGE ?>logo.png" width="35" alt="">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Genesis</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item <?php echo uri_string() == '/' ? 'active' : '' ?>">
            <a href="<?php echo APP_URL ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-tachometer"></i>
              <div data-i18n="Analytics">Inicio</div>
            </a>
          </li>

          <!-- Layouts -->
          <li class="menu-item <?php echo uri_string() == 'ventas/nueva' ? 'active open' : '' ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle ">
              <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
              <div data-i18n="Layouts">Ventas</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item <?php echo uri_string() == 'ventas/nueva' ? 'active open' : '' ?>">
                <a href="<?php echo APP_URL ?>ventas/nueva" class="menu-link ">
                  <div data-i18n="Without menu">Mis ventas</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="layouts-without-navbar.html" class="menu-link">
                  <div data-i18n="Without navbar">Reporte</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-package"></i>
              <div data-i18n="Layouts">Gastos</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="layouts-without-menu.html" class="menu-link">
                  <div data-i18n="Without menu">Nuevo</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="layouts-without-navbar.html" class="menu-link">
                  <div data-i18n="Without navbar">Reporte</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item <?php echo uri_string() == 'clientes' ? 'active' : '' ?>">
            <a href="<?php echo APP_URL ?>clientes" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
              <div data-i18n="Analytics">Mis Clientes</div>
            </a>
          </li>
          <li class="menu-item <?php echo uri_string() == 'servicios' ? 'active' : '' ?>">
            <a href="<?php echo APP_URL ?>servicios" class="menu-link">
            <i class="menu-icon tf-icons bx bx-cut"></i>
              <div data-i18n="Analytics">Mis Servicios</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar"
        >
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
              <i class="bx bx-buildings fs-4 lh-0"></i>
              <span class="form-control border-0 shadow-none fw-bold">Silvia's Spa</span>  
              <!-- <i class="bx bx-search fs-4 lh-0"></i>
                <input
                  type="text"
                  class="form-control border-0 shadow-none"
                  placeholder="Search..."
                  aria-label="Search..."
                /> -->
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <!-- <li class="nav-item lh-1 me-3">
                <a
                  class="github-button"
                  href="https://github.com/themeselection/sneat-html-admin-template-free"
                  data-icon="octicon-star"
                  data-size="large"
                  data-show-count="true"
                  aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                  >Star</a
                >
              </li> -->

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="<?php echo APP_URL_PUBLIC_IMAGE ?>juan.jpg" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="<?php echo APP_URL_PUBLIC_IMAGE ?>juan.jpg" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">John Doe</span>
                          <small class="text-muted">Admin</small>
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
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                        <span class="flex-grow-1 align-middle">Billing</span>
                        <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?php echo APP_URL ?>cerrarSesion">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Salir</span>
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