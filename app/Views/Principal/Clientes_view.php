<style>
    .box_cant {
        /* background: #F2F5F8; */
        border-radius: 8px;
        width: 100%;
        padding: 5px;
        border: 1px #80808030 solid;
    }

    .atributo {
        /* border:1px #e1e3ea dashed; */
        border-radius: 4px;
        /* padding: 10px; */
        /* margin-right: 8px; */
    }

    .atributo small {
        font-size: 12px;
        text-align: center;
    }

    .cant {
        font-weight: bold;
        margin-bottom: 4px;
        font-size: 18px;
        text-align: center;
        color: #303030;
    }

    .derecha {
        width: 80%;
        max-width: 300px;
        margin: auto;
    }

    .nombre_ {
        color: #303030;
    }
</style>
<h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Lista de</span> clientes ( <span class="total"></span> resultado )</h4>
<div class="card mb-4">
    <div class="row card-body ">
        <div class="col-md-4">
            <form action="" id="buscador_cliente">
                <div class="input-group input-group-merge">
                    <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                    <input type="search" autocomplete="off" class="form-control mi_buscador_cliente" id="mi_buscador_cliente" placeholder="Nombre del cliente..." />
                    <button class="btn btn-primary buscar_cliente" type="submit">Buscar</button>
                </div>
            </form>
        </div>
        <div class="col-md-8 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agrega">
                <span class="tf-icons bx bx-plus me-1"></span> Agregar
            </button>
        </div>
    </div>
</div>
<div>
    <div class="">
        <div class="row mb-5 mis_clientes">
            <?php echo view('extras/esqueleton_cliente_view') ?>
            <?php echo view('extras/esqueleton_cliente_view') ?>
            <?php echo view('extras/esqueleton_cliente_view') ?>
        </div>
    </div>
</div>
<style>
    .mi_box_avatar {
        text-align: center;
    }

    .mi_box_avatar .foto_servicio {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: url(<?php echo APP_URL_PUBLIC_IMAGE . 'user.jpg' ?>)center;
        background-size: cover;
    }

    .mi_box_avatar label {
        background: #04040400;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        transition: .2s;
        cursor: pointer;
    }

    .mi_box_avatar label i {
        opacity: 0;
    }

    .mi_box_avatar label:hover i {
        opacity: 1;
        color: white;
    }

    .mi_box_avatar label:hover {
        background: #04040436;
    }

    .mi_box_avatar input {
        width: 10px;
        height: 0;
        opacity: 0;
        margin: auto;
    }

    .photo_size {
        font-size: 11px;
        color: #80808096;
        text-align: center;
        margin-top: 4px;
    }

    .foto_servicio {
        background-size: cover;
        background-position: center;
    }
</style>
<div class="modal fade agregar_cliente" id="agrega" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="" id="add_cli" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header" style="flex-direction: column;">
                    <h5 class="modal-title fw-bolder m-auto" id="exampleModalLabel4">Crear nuevo cliente</h5>
                    <small>Agrega un cliente para darle seguimiento</small>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>

                <div class="modal-body">
                    <div class="mb-2 mi_box_avatar">
                        <div class="foto_servicio m-auto">
                            <label for="foto_cliente_nuevo" class=" m-auto d-flex justify-content-center align-items-center">
                                <i class="bx bxs-camera camara_ico" style="font-size: 40px;"></i>
                            </label>
                        </div>
                        <input class="form-control foto_cliente_nuevo" id="foto_cliente_nuevo" name="foto_cliente_nuevo" type="file" accept="image/png, .jpeg, .jpg">
                        <div class="photo_size"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nameExLarge" class="form-label">Nombre</label>
                            <input type="text" id="nombre_cliente" required class="form-control text-uppercase" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido_paterno_cliente" class="form-label">Apellido paterno</label>
                            <input type="text" id="apellido_paterno_cliente" class="form-control text-uppercase" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido_materno_cliente" class="form-label">Apellido materno</label>
                            <input type="text" id="apellido_materno_cliente" class="form-control text-uppercase" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nameExLarge" class="form-label">Sexo</label>
                            <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="sexo_cliente" id="btnradio1" value="H" autocomplete="off" checked required>
                                <label class="btn btn-outline-primary" for="btnradio1">Hombre</label>

                                <input type="radio" class="btn-check" name="sexo_cliente" id="btnradio2" value="M" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio2">Mujer</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edad_cliente" class="form-label">Edad</label>
                            <input type="number" id="edad_cliente" class="form-control" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="direccion_cliente" class="form-label">Dirección o distrito</label>
                            <input type="text" list="distritos" id="direccion_cliente" class="form-control" placeholder="" autocomplete="off">
                        </div>
                        <datalist id="distritos">
                            <option value="EL PORVENIR">
                            <option value="FLORENCIA DE MORA">
                            <option value="HUANCHACO">
                            <option value="LA ESPERANZA">
                            <option value="LAREDO">
                            <option value="MOCHE">
                            <option value="POROTO">
                            <option value="SALAVERRY">
                            <option value="SIMBAL">
                            <option value="TRUJILLO">
                            <option value="VICTOR LARCO HERRERA">
                        </datalist>
                        <div class="col-md-6 mb-3">
                            <label for="dni_cliente" class="form-label">DNI</label>
                            <input type="number" id="dni_cliente" class="form-control" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fecha_nacimiento_cliente" class="form-label">Fecha cumpleaños</label>
                            <input type="date" id="fecha_nacimiento_cliente" class="form-control" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="correo_cliente" class="form-label">Correo</label>
                            <input type="text" id="correo_cliente" class="form-control" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono1_cliente" class="form-label">Telefono 1</label>
                            <input type="text" id="telefono1_cliente" class="form-control" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono2_cliente" class="form-label">Telefono 2</label>
                            <input type="text" id="telefono2_cliente" class="form-control" placeholder="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn_crear_cliente">Crear cliente</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade editar_cliente" id="edita" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="" id="edit_cli" is-foto="" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header" style="flex-direction: column;">
                    <h5 class="modal-title fw-bolder m-auto" id="exampleModalLabel4">Editar cliente</h5>
                    <small>Edita los datos de tu cliente</small>
                </div>
                <div class="modal-body">
                    <div class="mb-2 mi_box_avatar">
                        <div class="foto_servicio m-auto">
                            <label for="foto_cliente_editar" class=" m-auto d-flex justify-content-center align-items-center">
                                <i class="bx bxs-camera camara_ico" style="font-size: 40px;"></i>
                            </label>
                        </div>
                        <input class="form-control foto_cliente_nuevo" id="foto_cliente_editar" name="foto_cliente_nuevo" type="file" accept="image/png, .jpeg, .jpg">
                        <div class="photo_size"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nameExLarge" class="form-label">Nombre</label>
                            <input type="text" id="nombre_cliente_editar" required class="form-control text-uppercase" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido_paterno_cliente" class="form-label">Apellido paterno</label>
                            <input type="text" id="apellido_paterno_cliente_editar" class="form-control text-uppercase" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido_materno_cliente" class="form-label">Apellido materno</label>
                            <input type="text" id="apellido_materno_cliente_editar" class="form-control text-uppercase" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nameExLarge" class="form-label">Sexo</label>
                            <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="sexo_cliente_editar" id="btn_hombre_edit" value="H" autocomplete="off" checked required>
                                <label class="btn btn-outline-primary" for="btn_hombre_edit">Hombre</label>

                                <input type="radio" class="btn-check" name="sexo_cliente_editar" id="btn_mujer_edit" value="M" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn_mujer_edit">Mujer</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edad_cliente" class="form-label">Edad</label>
                            <input type="number" id="edad_cliente_editar" class="form-control" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="direccion_cliente" class="form-label">Dirección o distrito</label>
                            <input type="text" list="distritos" id="direccion_cliente_editar" class="form-control" placeholder="" autocomplete="off">
                        </div>
                        <datalist id="distritos">
                            <option value="EL PORVENIR">
                            <option value="FLORENCIA DE MORA">
                            <option value="HUANCHACO">
                            <option value="LA ESPERANZA">
                            <option value="LAREDO">
                            <option value="MOCHE">
                            <option value="POROTO">
                            <option value="SALAVERRY">
                            <option value="SIMBAL">
                            <option value="TRUJILLO">
                            <option value="VICTOR LARCO HERRERA">
                        </datalist>
                        <div class="col-md-6 mb-3">
                            <label for="dni_cliente" class="form-label">DNI</label>
                            <input type="number" id="dni_cliente_editar" class="form-control" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fecha_nacimiento_cliente" class="form-label">Fecha cumpleaños</label>
                            <input type="date" id="fecha_nacimiento_cliente_editar" class="form-control" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="correo_cliente" class="form-label">Correo</label>
                            <input type="text" id="correo_cliente_editar" class="form-control" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono1_cliente" class="form-label">Telefono 1</label>
                            <input type="text" id="telefono1_cliente_editar" class="form-control" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono2_cliente" class="form-label">Telefono 2</label>
                            <input type="text" id="telefono2_cliente_editar" class="form-control" placeholder="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline-info">Info</button>
                    <button type="button" class="btn btn-danger me-2 eliminar_cliente" id-cliente="">
                        <span class="tf-icons bx bxs-trash me-1"></span> Eliminar
                    </button>
                    <button type="submit" class="btn btn-primary btn_modificar_cliente">Modificar cliente</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?php echo APP_URL_PUBLIC_JS . 'principal/jsClientes.js?' . rand() ?>"></script>