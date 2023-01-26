<link rel="stylesheet" href="<?php echo base_url() ?>public/css/Vigilancia/Fichas.css">
<div>
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="fw-bold py-3">
            <span class="text-muted fw-light">Fichas de</span> <span class="fw-bold" style="color:#566a7f"> Vigilancia</span>
        </h4>
        <?php if($_SESSION['nivel']==8){ ?>
        <a href="<?php echo base_url() ?>Vigilancia/Fichas/Agregar" class="btn btn-primary">
            <i class='bx bx-plus-circle'></i>
            &nbsp; Agregar
        </a>
        <?php }?>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form id="buscar_mis_fichas">
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <input type="text" class="form-control" placeholder="Nombres" id="nombres_f" autocomplete="off">
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" class="form-control" placeholder="Apellido paterno" id="apepat_f" autocomplete="off">
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" class="form-control" placeholder="Apellido materno" id="apemat_f" autocomplete="off">
                    </div>
                    <div class="col-md-2 mb-2">
                        <input type="text" class="form-control" placeholder="Dni" id="dni_f" autocomplete="off">
                    </div>
                    <div class="col-md-2 d-flex mb-2">
                        <button type="submit" class="btn btn-dark d-flex justify-content-center" id="btn_buscarFicha" style="width: calc(100% - 46.94px);">
                            <div class="loader d-none">
                                <div class="spinner-border spinner-border-sm text-white" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div class="contenido">
                                <span class="tf-icons bx bx-search"></span>
                            </div>
                            &nbsp;Buscar
                        </button>
                        <div style="width: 10px;"></div>
                        <button type="button" class="btn btn-outline-secondary btn-icon" id="btn_limpiarFichaFiltros" style="width: 38.94;">
                            <div class="loader d-none">
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div class="contenido">
                                <span class="tf-icons bx bx-refresh"></span>
                            </div>
                        </button>
                    </div>
                    <div class="col-md-12 mt-4">
                        <table id="tbl_fichas" class="table hover responsive table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Persona</th>
                                    <th class="text-center">Edad</th>
                                    <th class="text-center">Año</th>
                                    <th class="text-center">Semana</th>
                                    <th class="text-center">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="_mi_cuerpo_tabla" style="border-top: 1px;">
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-20">

    </div>
</div>
<script src="<?php echo base_url('public/js/Vigilancia/jsFichas.js') . '?=' . rand(); ?>"></script>