<style>
    .accordion-item {
        border: 1px #d9dee3 solid !important;
        border-top: 0px !important;
        border-radius: 0 !important;
        box-shadow: none !important;
    }

    .detalle_venta {
        padding: 0 20px 20px;
    }

    .centrados {
        display: flex;
        align-items: center;
    }
</style>
<div class="d-flex justify-content-between align-items-center">
    <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Ventas </span> del día ( 10 resultados )</h4>
    <button type="button" class="btn btn-primary me-2">
        <span class="tf-icons bx bx-cut me-2 bx-tada"></span> Nueva venta
    </button>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Venta total</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">200.00</h4>
                                <small class="text-success">(+29% que ayer)</small>
                            </div>
                            <small>Hoy</small>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                        <i class='bx bx-money bx-sm' ></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Clientes atendidos</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">16</h4>
                                <small class="text-danger">(-6% que ayer)</small>
                            </div>
                            <small>Hoy</small>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="bx bx-user bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Servicios prestados</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">21</h4>
                                <small class="text-success">(+52% que ayer)</small>
                            </div>
                            <small>Hoy</small>
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                        <i class='bx bx-cube-alt bx-sm'></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Session</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">21,459</h4>
                                <small class="text-success">(+29%)</small>
                            </div>
                            <small>Total Users</small>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="bx bx-user bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-8">
                    <div class="card-body">
                        <h6 class="card-title mb-1 text-nowrap">Felicidades <?php echo session()->get('user_nombre') ?>!</h6>
                        <small class="d-block mb-3 text-nowrap">Mejor venta del mes</small>

                        <h5 class="card-title text-primary mb-1">S/ 250.00</h5>
                        <small class="d-block mb-3 text-muted">78% of target</small>

                        <a href="javascript:;" class="btn btn-sm btn-primary">View sales</a>
                    </div>
                </div>
                <div class="col-4 pt-3 ps-0">
                    <img src="<?php echo APP_URL_PUBLIC_IMAGE ?>mas.png" width="90" height="140" class="rounded-start" alt="View Sales">
                </div>
            </div>
        </div> -->
    </div>
    <div class="col-md-8">
        <div class="card">
            <table class="table hover responsive table-bordered dataTable no-footer dtr-inline" id="tt">
                <thead>
                    <tr>
                        <th class="w-50">Cliente</th>
                        <th class="w-25">Fotos</th>
                        <th class="w-25">Total</th>
                    </tr>
                </thead>
            </table>
            <div class="accordion-item card">
                <h2 class="accordion-header text-body d-flex justify-content-between" id="uno">
                    <button type="button" class="accordion-button collapsed d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#accordionIcon-1" aria-controls="accordionIcon-1">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <div class="cliente_info d-flex">
                                <img src="http://localhost/silvia/public/image/juan.jpg" alt="" width="50" height="50" class="rounded me-3">
                                <div>
                                    <div>
                                        Juan Victor Ruiz Trujillo
                                    </div>
                                    <div>
                                        <span class="badge bg-label-primary">Bueno</span>
                                    </div>
                                </div>
                            </div>
                            <div class="cliente_monto fw-bolder w-25" style="padding: 0 0 0 40px;">
                                200.00
                            </div>
                        </div>
                    </button>
                </h2>

                <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#uno">
                    <div class="accordion-body p-0">
                        <div class="mi_servicio d-flex">
                            <div class="w-50 detalle_venta centrados">
                                <!-- <div style="width: 40px;"></div> -->
                                <i class='bx bx-subdirectory-right mx-2 me-3 fs-3 text-primary'></i>
                                <div>
                                    <h6 class="m-0 fw-bold">Corte</h6>
                                    <small>Corte con tijera y maquina para...</small>
                                </div>
                            </div>
                            <div class="w-25 detalle_venta">
                                <div class="d-flex  align-items-center avatar-group">
                                    <div class="avatar">
                                        <img src="http://localhost/silvia/public/image/juan.jpg" alt="Avatar" class="rounded-circle pull-up">
                                    </div>
                                    <div class="avatar">
                                        <img src="http://localhost/silvia/public/image/juan.jpg" alt="Avatar" class="rounded-circle pull-up">
                                    </div>
                                    <div class="avatar">
                                        <img src="http://localhost/silvia/public/image/juan.jpg" alt="Avatar" class="rounded-circle pull-up">
                                    </div>
                                    <div class="avatar">
                                        <img src="http://localhost/silvia/public/image/juan.jpg" alt="Avatar" class="rounded-circle pull-up">
                                    </div>
                                </div>
                            </div>
                            <div class="w-25 detalle_venta centrados">150.00</div>
                        </div>
                        <div class="mi_servicio d-flex">
                            <div class="w-50 detalle_venta centrados">
                                <!-- <div style="width: 40px;"></div> -->
                                <i class='bx bx-subdirectory-right mx-2 me-3 fs-3 text-primary'></i>
                                <div>
                                    <h6 class="m-0 fw-bold">Tinturado</h6>
                                    <small>Trajo su propio tinte</small>
                                </div>
                            </div>
                            <div class="w-25 detalle_venta">
                                <div class="d-flex  align-items-center avatar-group">
                                    <div class="avatar">
                                        <img src="http://localhost/silvia/public/image/juan.jpg" alt="Avatar" class="rounded-circle pull-up">
                                    </div>
                                </div>
                            </div>
                            <div class="w-25 detalle_venta centrados">35.00</div>
                        </div>
                        <div class="mi_servicio d-flex">
                            <div class="w-50 detalle_venta centrados">
                                <!-- <div style="width: 40px;"></div> -->
                                <i class='bx bx-subdirectory-right mx-2 me-3 fs-3 text-primary'></i>
                                <div>
                                    <h6 class="m-0 fw-bold">Pedicure</h6>
                                    <small></small>
                                </div>
                            </div>
                            <div class="w-25 detalle_venta">
                                <div class="d-flex  align-items-center avatar-group">
                                    <div class="avatar">
                                        <img src="http://localhost/silvia/public/image/juan.jpg" alt="Avatar" class="rounded-circle pull-up">
                                    </div>
                                    <div class="avatar">
                                        <img src="http://localhost/silvia/public/image/juan.jpg" alt="Avatar" class="rounded-circle pull-up">
                                    </div>
                                    <div class="avatar">
                                        <img src="http://localhost/silvia/public/image/juan.jpg" alt="Avatar" class="rounded-circle pull-up">
                                    </div>
                                </div>
                            </div>
                            <div class="w-25 detalle_venta centrados">15.00</div>
                        </div>
                        <hr>
                        <div style="padding: 0 20px 20px;">
                            <button type="button" class="btn btn-outline-primary me-2 btn-sm">
                                <span class="tf-icons bx bx-show me-1"></span> Info
                            </button>
                            <button type="button" class="btn btn-outline-danger me-2 btn-sm">
                                <span class="tf-icons bx bx-trash me-1"></span> Eliminar
                            </button>
                            <button type="button" class="btn btn-primary me-2 btn-sm">
                                <span class="tf-icons bx bx-edit-alt me-1"></span> Modificar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>