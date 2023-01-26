
<div class="row p-0 m-0">
    <div class="card">
        <div class="card-header">
            <h5 class="fw-bold m-0"><span class="text-muted fw-light"></span>Serotipos<br>
                <small class="fw-light fs-6 text-muted">Lista de serotipos registrados</small>
            </h5>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <table id="tbl_serotipos" class="table hover responsive table-bordered" style="width:100%">
                    <thead>
                        <tr>
                        <th>Enfermedad</th>
                        <th>Prueba</th>
                        <th class="text-center">Serotipo</th>
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
<script src="<?php echo base_url('public/js/Configuracion/jsSerotipos.js') . '?=' . rand(); ?>"></script>