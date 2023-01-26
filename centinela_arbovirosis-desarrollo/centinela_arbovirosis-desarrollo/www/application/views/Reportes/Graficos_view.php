<script src="<?php echo base_url('public/js/echars.js') . '?=' . rand(); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>public/css/Vigilancia/Fichas.css">
<h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Gráficos de </span>vigilancia<br>
    <!-- <small class="fw-light fs-6 text-muted">Agrega nuevos registros sobre fichas de vigilancia negativas</small> -->
</h4>
<div class="row">
    
        <!-- <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div id="ape" style="width: 100%;height:350px;"></div>
                </div>
            </div>
        </div> -->
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div id="meta_anual" style="width: 100%;height:350px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div id="meta_semanal" style="width: 100%;height:350px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-body">
                    <div id="meta_grupo_anios" style="width: 100%;height:350px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div id="meta_grupo_sexo" style="width: 100%;height:350px;"></div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div id="edad_n" style="width: 100%;height:350px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div id="genero_n" style="width: 100%;height:350px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div id="captacionAnual_d" style="width: 100%;height:350px;"></div>
                </div>
            </div>
        </div>
         -->
    
</div>

<script src="<?php echo base_url('public/js/Reportes/jsGraficos.js') . '?=' . rand(); ?>"></script>