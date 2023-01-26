<link rel="stylesheet" href="<?php echo base_url() ?>public/css/Vigilancia/Fichas.css">
<style>
    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #e3e7ea !important;
        border-radius: 4px;
        background: #ffffff;
        height: 34.6px;
    }

    .form-control[disabled],
    .form-control[readonly],
    fieldset[disabled] .form-control {
        background-color: #ffffff;
        opacity: 1;
    }
</style>

<h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Reporte de </span>vigilancia<br>
    <!-- <small class="fw-light fs-6 text-muted">Agrega nuevos registros sobre fichas de vigilancia negativas</small> -->
</h4>

<div class="nav-align-top mb-4">
    <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link me-2 active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">
                <i class='bx bx-layer me-1'></i>
                Fichas
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link me-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">
                <i class='bx bxs-flask me-1'></i> Laboratorio
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="navs-pills-top-home" role="tabpanel">
            <form action="" id="buscar_mis_fichas">
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="dni" class="form-label">Dni</label>
                        <input type="text" class="form-control" placeholder="Ingresa Dni" id="dni" name="dni" autocomplete="off">
                    </div>
                    <div class="col-md-8 mb-3 d-flex align-items-end" style="flex-wrap: wrap;">
                        <button type="submit" class="btn btn-primary me-2 mb-1" id="btn_buscarFicha">
                            <div class="loader d-none">
                                <div class="spinner-border spinner-border-sm text-white" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div class="contenido">
                                <i class='bx bx-search'></i>
                                Buscar
                            </div>
                        </button>
                        <button type="button" class="btn btn-outline-primary me-2 mb-1" id="btn_limpiarFichaFiltros">
                            <div class="loader d-none">
                                <div class="spinner-border spinner-border-sm text-white" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div class="contenido">
                                Limpiar
                            </div>
                        </button>
                        <button type="button" class="btn btn-outline-primary me-2 mb-1" id="btn_FichaExportar">
                            <div class="loader d-none">
                                <div class="spinner-border spinner-border-sm text-white" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div class="contenido">
                                Exportar
                            </div>
                        </button>
                        <a type="button" class="btn btn-link text-primary me-2 mb-2" id="advance" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Búsqueda avanzada
                        </a>
                    </div>
                    <div class="row m-0 p-0 collapse" id="collapseExample">
                        <div class="mb-3 col-md-6">
                            <label for="dni" class="form-label"></label>
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0  me-3 d-flex justify-content-center align-items-center">
                                    <i class='bx bx-bell-minus bx-tada fs-2'></i>
                                </div>
                                <div class="flex-grow-1 row">
                                    <div class="col-9 mb-sm-0 mb-2">
                                        <h6 class="mb-0">Solo negativas</h6>
                                        <small class="text-muted">Activa para ver solo fichas negativas</small>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input float-end cursor-pointer" type="checkbox" id="negativa" role="switch">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="mis_diresas" class="form-label">Diresa</label>
                            <select name="mis_diresas" id="mis_diresas" class="form-select">
                                <option selected value="">Todo diresas</option>
                                <?php foreach ($diresas as $p) { ?>
                                    <option value="<?php echo $p->codigo ?>"><?php echo $p->nombre ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="mis_establecimientos" class="form-label">Establecimiento</label>
                            <select name="mis_establecimientos" id="mis_establecimientos" class="form-select">
                                <option selected value="">Todo establecimiento</option>
                                <?php foreach ($establecimientos as $p) { ?>
                                    <option value="<?php echo $p->cod_est ?>"><?php echo $p->raz_soc ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="fecha_notificacion" class="form-label">Fecha de notificación</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas" id="fecha_notificacion">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="fecha_inicio_enfermedad" class="form-label">Fecha inicio de enfermedad</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas" id="fecha_inicio_enfermedad">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="fecha_muestra" class="form-label">Fecha de muestra</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas" id="fecha_muestra">
                        </div>
                    </div>


                    <div class="col-md-12 mt-3">
                        <table id="tbl_fichas" class="table hover responsive table-bordered" style="width:100%">
                            <thead>
                                <tr class="cv_f">
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="_mi_cuerpo_tabla">
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>

        </div>
        <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
            <form id="buscar_mis_laboratorios">
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="dni" class="form-label">Nro Muestra</label>
                        <input type="text" class="form-control" placeholder="Ingresa N° de muestra" id="nro_muestra" name="nro_muestra" autocomplete="off">
                    </div>
                    <div class="col-md-8 mb-3 d-flex align-items-end" style="flex-wrap: wrap;">
                        <button type="submit" class="btn btn-primary me-2 mb-1" id="btn_buscarLaboratorio">
                            <div class="loader d-none">
                                <div class="spinner-border spinner-border-sm text-white" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div class="contenido">
                                <i class='bx bx-search'></i>
                                Buscar
                            </div>
                        </button>
                        <button type="button" class="btn btn-outline-primary me-2 mb-1" id="btn_limpiarLaboratorioFiltros">
                            <div class="loader d-none">
                                <div class="spinner-border spinner-border-sm text-white" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div class="contenido">
                                Limpiar
                            </div>
                        </button>
                        <button type="button" class="btn btn-outline-primary me-2 mb-1" id="btn_exportarLaboratorio">
                            <div class="loader d-none">
                                <div class="spinner-border spinner-border-sm text-white" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div class="contenido">
                                Exportar
                            </div>
                        </button>
                        <a type="button" class="btn btn-link text-primary me-2 mb-2" id="advance" data-bs-toggle="collapse" href="#collapseLab" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Búsqueda avanzada
                        </a>
                    </div>
                    <div class="row m-0 p-0 collapse" id="collapseLab">
                        <div class="mb-3 col-md-6">
                            <label for="dni" class="form-label"></label>
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0  me-3 d-flex justify-content-center align-items-center">
                                    <i class='bx bx-detail bx-tada fs-2'></i>
                                </div>
                                <div class="flex-grow-1 row">
                                    <div class="col-9 mb-sm-0 mb-2">
                                        <h6 class="mb-0">Fichas</h6>
                                        <small class="text-muted">Activa para ver a la ficha que pertenece</small>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input float-end cursor-pointer" type="checkbox" id="conFichas" role="switch">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="mis_enfermedades" class="form-label">Enfermedad</label>
                            <select name="mis_enfermedades" id="mis_enfermedades" class="form-select">
                                <option selected value="">Todo Enfermedades</option>
                                <?php foreach ($enfermedades as $p) { ?>
                                    <option value="<?php echo $p->id ?>"><?php echo $p->denominacion ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="mis_pruebas" class="form-label">Pruebas</label>
                            <select name="mis_pruebas" id="mis_pruebas" class="form-select">
                                <option selected value="">Todo Prueba</option>
                                <?php foreach ($pruebas as $p) { ?>
                                    <option value="<?php echo $p->denominacion ?>"><?php echo $p->denominacion ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="mis_resultados" class="form-label">Resultados</label>
                            <select name="mis_resultados" id="mis_resultados" class="form-select">
                                <option selected value="">Todo Resultados</option>
                                <?php foreach ($resultados as $p) { ?>
                                    <option value="<?php echo $p->id ?>"><?php echo $p->resultado ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="mis_serotipos" class="form-label">Serotipos</label>
                            <select name="mis_serotipos" id="mis_serotipos" class="form-select">
                                <option selected value="">Todo Serotipos</option>
                                <?php foreach ($serotipos as $p) { ?>
                                    <option value="<?php echo $p->denominacion ?>"><?php echo $p->denominacion ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="fecha_resultados" class="form-label">Fecha de resultados</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas" id="fecha_resultados">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="fecha_recepcion_lrr" class="form-label">Fecha recepción LRR</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas" id="fecha_recepcion_lrr">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="fecha_envio_ins" class="form-label">Fecha envío INS</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas" id="fecha_envio_ins">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="fecha_recepcion_ins" class="form-label">Fecha recepción INS</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas" id="fecha_recepcion_ins">
                        </div>
                    </div>
                    <div class="co-md-12 mt-3">
                        <table id="tbl_laboratorio" class="table hover responsive table-bordered" style="width:100%">
                            <thead>
                                <tr class="cv_l">
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody class="_mi_cuerpo_tabla">
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <div class="tab">
    <button id="defaultOpen" onclick="openCity(event, 'general')" class="btn btn-primary"><i class="bx bx-user me-1"></i> Fichas</button>
    <button onclick="openCity(event, 'laboratorios')" class="btn btn-primary"><i class="bx bx-user me-1"></i> Laboratorios</button>
</div>

<div id="general" class="tabcontent">
    <div class="row mt-20">
        <div class="col-md-12">
            <div class="col-md-12 mb-30 p-0">
                <div class="card_ficha">
                    <div class="card_cuerpo form-group mb-0">
                        <form action="" id="buscar_mis_fichas">
                            <div class="col-md-6 mb-20">
                                <div class="">
                                    <span class="input-group-addon" id="basic-addon1">Establecimiento</span>
                                    <select name="mis_establecimientos" id="mis_establecimientos" class="">
                                        <option selected value="">Todo establecimiento</option>
                                        <?php foreach ($establecimientos as $p) { ?>
                                            <option value="<?php echo $p->cod_est ?>"><?php echo $p->raz_soc ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 mb-20">
                                <div class="">
                                    <span class="input-group-addon" id="basic-addon1">Diresa</span>
                                    <select name="mis_diresas" id="mis_diresas" class="">
                                        <option selected value="">Todo diresas</option>
                                        <?php foreach ($diresas as $p) { ?>
                                            <option value="<?php echo $p->codigo ?>"><?php echo $p->nombre ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 mb-10">
                                <div class="mb-10">
                                    <span class="input-group-addon" id="basic-addon1">Dni</span>
                                    <input type="text" class="form-control" placeholder="Ingresa Dni"  id="dni" name="dni" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-1 mb-20">
                                <div class="">
                                    <span class="input-group-addon" id="basic-addon1">Solo Negativa</span>
                                    <label for="negativa" style="cursor: pointer;">
                                        Sí
                                        <input type="checkbox" name="" id="negativa" style="cursor: pointer;">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-20">
                                <div class="mb-10">
                                    <span class="input-group-addon" id="basic-addon1">Fecha de notificación</span>
                                    <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas"  id="fecha_notificacion">
                                </div>
                            </div>
                            <div class="col-md-4 mb-20">
                                <div class="mb-10">
                                    <span class="input-group-addon" id="basic-addon1">Fecha inicio de enfermedad</span>
                                    <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas"  id="fecha_inicio_enfermedad">
                                </div>
                            </div>
                            <div class="col-md-4 mb-20">
                                <div class="mb-10">
                                    <span class="input-group-addon" id="basic-addon1">Fecha de muestra</span>
                                    <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas"  id="fecha_muestra">
                                </div>
                            </div>

                            <div class="col-md-2 mb-20">
                                <button type="submit" class="col-md-12 btn btn-primary" id="btn_buscarFicha" style="width: 100%;padding-left: 0;padding-right: 0;padding-bottom: 8px;padding-top: 8px;">
                                    <div class="loader d-none"></div>
                                    <div class="contenido">
                                        Buscar
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-2 mb-20">
                                <button type="button" class="col-md-12 btn btn-secondary" id="btn_limpiarFichaFiltros" style="width: 100%;padding-left: 0;padding-right: 0;padding-bottom: 8px;padding-top: 8px;">
                                    <div class="loader d-none"></div>
                                    <div class="contenido">
                                        Limpiar
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-2 mb-20">
                                <button type="button" class="col-md-12 btn btn-success" id="btn_FichaExportar" style="width: 100%;padding-left: 0;padding-right: 0;padding-bottom: 8px;padding-top: 8px;">
                                    <div class="loader d-none"></div>
                                    <div class="contenido">
                                        Exportar
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table id="tbl_fichas" class="table no-footer hover responsive nowrap" style="width:100%">
                <thead>
                    <tr class="cabecera_variable cv_f">
                        <th></th>
                    </tr>
                </thead>
                <tbody class="_mi_cuerpo_tabla">
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="laboratorios" class="tabcontent">
    <div class="row mt-20">
        <div class="col-md-12">
            <div class="col-md-12 mb-30 p-0">
                <form id="buscar_mis_laboratorios">
                    <div class="card_ficha">
                        <div class="card_cuerpo form-group mb-0">
                            <div class="col-md-1 mb-10">
                                <div class="">
                                    <span class="input-group-addon" id="basic-addon1"></span>
                                    <label for="conFichas" style="cursor: pointer;">
                                        Fichas
                                        <input type="checkbox" name="" id="conFichas" style="cursor: pointer;">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-10">
                                <div class="">
                                    <span class="input-group-addon" id="basic-addon1">Nro Muestra</span>
                                    <input type="text" class="form-control" placeholder="Ingresa nro muestra"  id="nro_muestra" name="nro_muestra" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-4 mb-20">
                                <div class="">
                                    <span class="input-group-addon" id="basic-addon1">Enfermedad</span>
                                    <select name="mis_enfermedades" id="mis_enfermedades" class="">
                                        <option selected value="">Todo Enfermedades</option>
                                        <?php foreach ($enfermedades as $p) { ?>
                                            <option value="<?php echo $p->id ?>"><?php echo $p->denominacion ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-20">
                                <div class="">
                                    <span class="input-group-addon" id="basic-addon1">Prueba</span>
                                    <select name="mis_pruebas" id="mis_pruebas" class="">
                                        <option selected value="">Todo Prueba</option>
                                        <?php foreach ($pruebas as $p) { ?>
                                            <option value="<?php echo $p->denominacion ?>"><?php echo $p->denominacion ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-20">
                                <div class="">
                                    <span class="input-group-addon" id="basic-addon1">Resultados</span>
                                    <select name="mis_resultados" id="mis_resultados" class="">
                                        <option selected value="">Todo Resultados</option>
                                        <?php foreach ($resultados as $p) { ?>
                                            <option value="<?php echo $p->id ?>"><?php echo $p->resultado ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-20">
                                <div class="">
                                    <span class="input-group-addon" id="basic-addon1">Serotipos</span>
                                    <select name="mis_serotipos" id="mis_serotipos" class="">
                                        <option selected value="">Todo Serotipos</option>
                                        <?php foreach ($serotipos as $p) { ?>
                                            <option value="<?php echo $p->denominacion ?>"><?php echo $p->denominacion ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-20">
                                <div class="mb-10">
                                    <span class="input-group-addon" id="basic-addon1">Fecha de resultados</span>
                                    <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas"  id="fecha_resultados">
                                </div>
                            </div>
                            <div class="col-md-4 mb-20">
                                <div class="mb-10">
                                    <span class="input-group-addon" id="basic-addon1">Fecha recepción LRR</span>
                                    <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas"  id="fecha_recepcion_lrr">
                                </div>
                            </div>
                            <div class="col-md-4 mb-20">
                                <div class="mb-10">
                                    <span class="input-group-addon" id="basic-addon1">Fecha envío INS</span>
                                    <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas"  id="fecha_envio_ins">
                                </div>
                            </div>
                            <div class="col-md-4 mb-20">
                                <div class="mb-10">
                                    <span class="input-group-addon" id="basic-addon1">Fecha recepción INS</span>
                                    <input type="text" class="form-control flatpickr-input active" placeholder="Todas las fechas"  id="fecha_recepcion_ins">
                                </div>
                            </div>
                            <div class="col-md-2 mb-20">
                                <button type="submit" class="col-md-12 btn btn-primary" id="btn_buscarLaboratorio" style="width: 100%;padding-left: 0;padding-right: 0;padding-bottom: 8px;padding-top: 8px;">
                                    <div class="loader d-none"></div>
                                    <div class="contenido">
                                        Buscar
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-2 mb-20">
                                <button type="button" class="col-md-12 btn btn-secondary" id="btn_limpiarLaboratorioFiltros" style="width: 100%;padding-left: 0;padding-right: 0;padding-bottom: 8px;padding-top: 8px;">
                                    <div class="loader d-none"></div>
                                    <div class="contenido">
                                        Limpiar
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-2 mb-20">
                                <button type="button" class="col-md-12 btn btn-success" id="btn_exportarLaboratorio" style="width: 100%;padding-left: 0;padding-right: 0;padding-bottom: 8px;padding-top: 8px;">
                                    <div class="loader d-none"></div>
                                    <div class="contenido">
                                        Exportar
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <table id="tbl_laboratorio" class="table no-footer hover responsive nowrap" style="width:100%">
                <thead>
                    <tr class="cabecera_variable cv_l">
                        <th> </th>

                    </tr>
                </thead>
                <tbody class="_mi_cuerpo_tabla">
                </tbody>
            </table>
        </div>
    </div>
</div> -->



<script src="<?php echo base_url('public/js/Reportes/jsReportes.js') . '?=' . rand(); ?>"></script>