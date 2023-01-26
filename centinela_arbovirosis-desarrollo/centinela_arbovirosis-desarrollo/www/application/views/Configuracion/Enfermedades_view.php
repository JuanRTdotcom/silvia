<link rel="stylesheet" href="<?php echo base_url() ?>public/css/Configuracion/Enfermedades.css">

<div class="row p-0 m-0">
    <div class="card">
        <div class="card-header">
            <h5 class="fw-bold m-0"><span class="text-muted fw-light"></span>Enfermedades<br>
                <small class="fw-light fs-6 text-muted">Lista de enfermedades registradas</small>
            </h5>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <table id="tbl_enfermedades" class="table hover responsive table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Enfermedad</th>
                            <th class="text-center">Muestras Laboratorio</th>
                            <th class="text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="_mi_cuerpo_tabla">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('public/js/Configuracion/jsEnfermedades.js') . '?=' . rand(); ?>"></script>