<style>
    .img_descarga{
        transform: scale(1);
        transition: .2s;
    }
    .img_descarga:hover{
        transform: scale(1.1);
    }
</style>
<div class="row p-0 m-0">
    <div class="card">
        <div class="card-header">
            <h5 class="fw-bold m-0"><span class="text-muted fw-light"></span>Descargas<br>
                <small class="fw-light fs-6 text-muted">Lista de documentos en cola de descarga</small>
            </h5>
        </div>
        <div class="card-body" style="min-height: 315px;">
            <div class="col-md-12">
                <div class="d-flex flex-wrap mis_descargas">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('public/js/Descargas/jsDescarga.js') . '?=' . rand(); ?>"></script>