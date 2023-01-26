<style>
    .foto_servicio {
        text-align: center;
        height: 150px;
        background: #696cff1a;
        border-radius: 20px;
    }

    .foto_bg {
        width: 100%;
        height: 100%;
        cursor: pointer;
        background: #696cff00;
        border-radius: 20px;
        transition: .3s;
    }

    .foto_bg:hover {
        background: #31313154;
    }

    .foto_bg:hover .camara_ico {
        color: white;
    }

    #foto_servicio,
    .foto_servicio_i {
        /* display: none; */
        opacity: 0;
        width: 100%;
        height: 0;
    }

    .label_foto_servicio {
        cursor: pointer;
    }

    #imageName {
        color: green;
    }

    .photo_size {
        font-size: 11px;
        color: #80808096;
        text-align: center;
        margin-top: 4px;
    }

    /* .add_service {
        opacity: .5;
        transition: .3s;
    }

    .add_service:hover {
        opacity: 1;
    } */

    .card {
        box-shadow: none;
        border: 0px solid #d9dee3;
    }

    .mis_servicios .card {
        transform: scale(1);
        transition: .2s;
    }

    .mis_servicios .card:hover {
        transform: scale(1.05);
    }

    .card_nuevo {
        flex-direction: column;
        border: 0px #696cff dashed;
        width: 100%;
        height: calc(100% - 16px);
        font-size: 40px;
        background: url(<?php echo APP_URL_PUBLIC_IMAGE . 'bg3.png' ?>) center;
        background-color: #696cff;
        background-size: cover;
        box-shadow: none;
    }
</style>
<h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Lista de</span> servicios</h4>
<div class="">
    <div class="row mb-5 mis_servicios">
        <div class="col-12 col-xs-6 col-sm-6 col-md-6 col-xl-4 col-xxl-3 cursor-pointer add_service" onclick="limpiarNuevo()" data-bs-toggle="modal" data-bs-target="#add">
            <div class="card ">
                <div class="row ">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                            <img src="<?php echo APP_URL_PUBLIC_IMAGE ?>servi.png" class="img-fluid" alt="Image" width="120" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <button class="btn btn-primary mb-3 text-nowrap add-new-role">Crear servicio</button>
                            <p class="mb-0">Crear si no existe</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo view('extras/esqueleton_view') ?>
        <?php echo view('extras/esqueleton_view') ?>
        <?php echo view('extras/esqueleton_view') ?>
        <?php echo view('extras/esqueleton_view') ?>
        <?php echo view('extras/esqueleton_view') ?>
    </div>
</div>

<div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" id="crear_servicio" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <div class="foto_servicio" style="background-size: cover;background-position: center;">
                                <label for="foto_servicio" class="foto_bg d-flex justify-content-center align-items-center">
                                    <i class="bx bxs-camera camara_ico" style="font-size: 40px;"></i>
                                </label>
                            </div>
                            <input class="form-control" id="foto_servicio" name="foto_servicio" type="file" required accept="image/png, .jpeg, .jpg">
                            <div class="photo_size"></div>
                        </div>
                        <div class="col-md-7">
                            <h3 class="modal-title mb-2 fw-bold">
                                <!-- <i class='bx bx-plus-circle' style="font-size: 20px;color:#696cff"></i> -->
                                <span id="tipo_proceso">Crear un servicio</span>
                                </h5>
                                <div class="mb-3 px-2">
                                    <label for="nombre_servicio" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre_servicio" name="nombre_servicio" required placeholder="" />
                                </div>
                                <div class="mb-3 px-2">
                                    <label for="descripcion_servicio" class="form-label">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion_servicio" name="descripcion_servicio" placeholder="" />
                                </div>
                                <div class="mb-3 px-2">
                                    <label for="descripcion_servicio" class="form-label">Monto sugerido</label>
                                    <input type="number" step="any" class="form-control" id="monto_servicio" required name="monto_servicio" placeholder="" />
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <!-- <button type="button" class="btn btn-danger  d-none eliminar_servicio" onclick="eliminarServicio(this)" id-servicio="">Eliminar</button> -->
                    <!-- <button type="submit" class="btn btn-primary d-none modificar_servicio">Modificar servicio</button> -->
                    <button type="submit" class="btn btn-primary crear_servicio">Crear servicio</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" id="editar_servicio" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <div class="foto_servicio" style="background-size: cover;background-position: center;">
                                <label for="foto_servicio_i" class="foto_bg d-flex justify-content-center align-items-center">
                                    <i class="bx bxs-camera camara_ico" style="font-size: 40px;"></i>
                                </label>
                            </div>
                            <input class="form-control foto_servicio_i" id="foto_servicio_i" name="foto_servicio_i" type="file" accept="image/png, .jpeg, .jpg" id="formFile">
                            <div class="photo_size"></div>
                            <div class="alert alert-primary mt-2" role="alert">
                                Si no eliges una imagen, se colocará la ultima foto registrada
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h3 class="modal-title mb-2 fw-bold">
                                <span id="tipo_proceso">Modificar servicio</span>
                                </h5>
                                <div class="mb-3 px-2">
                                    <label for="nombre_servicio" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre_servicio_editar" name="nombre_servicio" required placeholder="" />
                                </div>
                                <div class="mb-3 px-2">
                                    <label for="descripcion_servicio" class="form-label">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion_servicio_editar" name="descripcion_servicio" placeholder="" />
                                </div>
                                <div class="mb-3 px-2">
                                    <label for="descripcion_servicio" class="form-label">Monto sugerido</label>
                                    <input type="number" step="any" class="form-control" id="monto_servicio_editar" required name="monto_servicio" placeholder="" />
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger  eliminar_servicio" onclick="eliminarServicio(this)" id-servicio="">Eliminar</button>
                    <button type="submit" class="btn btn-primary modificar_servicio">Modificar servicio</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo APP_URL_PUBLIC_JS . 'principal/jsServicios.js?' . rand() ?>"></script>