<link rel="stylesheet" href="<?php echo base_url() ?>public/css/Vigilancia/NuevaFicha.css">
<h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Registro de </span>notificación negativa<br>
    <small class="fw-light fs-6 text-muted">Agrega nuevos registros sobre fichas de vigilancia negativas</small>
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
                            <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" id="responsable_epidemiologia" required>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="fecha_notificacion" class="form-label">Fecha de notificación</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="" aria-describedby="basic-addon1" id="fecha_notificacion">
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
                            <textarea rows="5" style="resize: none;" type="text" class="form-control" id="observacion" placeholder="" required aria-describedby="basic-addon1"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-4" style="text-align: right;">
            <button class="btn btn-primary registrar_fichas" type="submit">
                <div class="loader d-none">
                    <div class="spinner-border spinner-border-sm text-white" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="contenido">
                <i class='bx bxs-paper-plane' ></i>
                    &nbsp;Registrar ficha negativa
                </div>
            </button>
        </div>

    </div>
</form>

<script src="<?php echo base_url('public/js/Vigilancia/jsNuevaFichaNegativa.js') . '?=' . rand(); ?>"></script>