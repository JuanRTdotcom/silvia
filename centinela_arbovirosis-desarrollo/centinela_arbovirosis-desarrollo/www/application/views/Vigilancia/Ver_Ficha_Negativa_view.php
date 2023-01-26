<link rel="stylesheet" href="<?php echo base_url() ?>public/css/Vigilancia/NuevaFicha.css">
<h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Ver </span>notificación negativa<br>
    <small class="fw-light fs-6 text-muted">Ver registros sobre fichas de vigilancia negativas</small>
</h4>
<form action="action/Cwoo231#5-13poO($kkis_u)" id="_registrar_ficha" method="post">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <h5 class="card-header">
                    Información general
                </h5>
                <hr class="my-0">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="responsable_epidemiologia" class="form-label">Responsable Epidemiología</label>
                            <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" id="responsable_epidemiologia" required disabled value="<?php echo $inf_ficha->epidemio_res?>">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="fecha_notificacion" class="form-label">Fecha de notificación</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="" aria-describedby="basic-addon1" id="fecha_notificacion" disabled value="<?php echo $inf_ficha->fecha_not?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <h5 class="card-header">
                    Adicional
                </h5>
                <hr class="my-0">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="observacion" class="form-label">SUSTENTO DE REGISTRO NEGATIVO</label>
                            <textarea rows="5" style="resize: none;" type="text" class="form-control" id="observacion" placeholder="" required aria-describedby="basic-addon1" disabled ><?php echo $inf_ficha->observaciones?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="<?php echo base_url('public/js/Vigilancia/jsFichaNegativaVer.js') . '?=' . rand(); ?>"></script>