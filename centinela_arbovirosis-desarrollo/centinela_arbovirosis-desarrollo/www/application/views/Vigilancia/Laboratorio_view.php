<link rel="stylesheet" href="<?php echo base_url() ?>public/css/Vigilancia/NuevaFicha.css">
<link rel="stylesheet" href="<?php echo base_url() ?>public/css/Vigilancia/Fichas.css">
<link rel="stylesheet" href="<?php echo base_url() ?>public/css/Vigilancia/Laboratorio.css">

<div class="d-flex justify-content-between align-items-center">
    <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Laboratorio </span>N° <?php echo $inf_ficha->id ?><br>
        <small class="fw-light fs-6 text-muted">Lista de muestras de laboratorio registradas</small>
    </h4>
    <?php if($_SESSION['nivel']==8){ ?>
    <button class="btn btn-primary agregar_laboratorio"  data-bs-toggle="modal" data-bs-target="#agregaLab">
        <i class='bx bx-plus-circle'></i>
        &nbsp; Agregar
    </button>
    <?php } ?>
</div>

<div class="card accordion-item mb-3">
    <h2 class="accordion-header" id="headingTwo">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo" style="background: #696cff;color: white;">
            Ficha N° <?php echo $inf_ficha->id ?> - <?php echo $inf_ficha->nombres . ' ' . $inf_ficha->apepat . ' ' . $inf_ficha->apemat ?>
        </button>
    </h2>
    <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
        <div class="accordion-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <h5 class="card-header">
                                Información general
                            </h5>
                            <hr class="my-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="responsable_laboratorio" class="form-label">Responsable Laboratorio</label>
                                        <input type="text" class="form-control" placeholder="" id="responsable_laboratorio" required value="<?php echo $inf_ficha->laboratorio_res ?>">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="responsable_epidemiologia" class="form-label">Responsable Epidemiología</label>
                                        <input type="text" class="form-control" placeholder="" id="responsable_epidemiologia" required value="<?php echo $inf_ficha->epidemio_res ?>">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="fecha_notificacion" class="form-label">Fecha de notificación</label>
                                        <input type="text" class="form-control flatpickr-input active" placeholder="" id="fecha_notificacion" required value="<?php echo $inf_ficha->fecha_not ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <h5 class="card-header">
                                Datos del paciente
                            </h5>
                            <hr class="my-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="dni" class="form-label">Dni</label>
                                        <div style="display: flex;">
                                            <input class="form-control me-1" type="text" autocomplete="off" required id="dni" value="<?php echo $inf_ficha->dni ?>">
                                            <button type="button" class="btn btn-primary" disabled style="height: 38px;">Reniec</button>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="nombres" class="form-label">Nombres</label>
                                        <input class="form-control" type="text" name="" id="nombres" autocomplete="off" required value="<?php echo $inf_ficha->nombres ?>">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="apellido_paterno" class="form-label">Apellido paterno</label>
                                        <input type="text" class="form-control" placeholder="" id="apellido_paterno" autocomplete="off" required value="<?php echo $inf_ficha->apepat ?>">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="apellido_materno" class="form-label">Apellido materno</label>
                                        <input type="text" class="form-control" placeholder="" id="apellido_materno" autocomplete="off" required value="<?php echo $inf_ficha->apemat ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">Sexo</label>
                                            <div class="flight-types">
                                                <input type="radio" name="flight-type" value="M" id="_masculino" <?php echo $inf_ficha->sexo == 'M' ? 'checked' : '' ?> />
                                                <label for="_masculino">
                                                    Masculino
                                                </label>
                                                <input type="radio" name="flight-type" value="F" id="_femenino" <?php echo $inf_ficha->sexo == 'F' ? 'checked' : '' ?> <?php if ($inf_ficha->sexo != 'F' && $inf_ficha->sexo != 'M') {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                        } ?> />
                                                <label for="_femenino">
                                                    Femenino
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="edad" class="form-label">Edad</label>
                                        <div style="display: flex;">
                                            <input type="number" style="border-radius:4px 0 0 4px;border-right: 0;" class="form-control" placeholder="" id="edad" autocomplete="off" required value="<?php echo $inf_ficha->edad ?>">
                                            <button class="btn btn-primary" disabled style="border-radius:0 4px 4px 0;border:1px solid #696cff;font-weight: 600;">Años</button>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input type="number" class="form-control" placeholder="" id="telefono" autocomplete="off" required value="<?php echo $inf_ficha->telefono ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <h5 class="card-header">
                            Lugar probable de infección
                        </h5>
                        <hr class="my-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <!-- <?php print_r($inf_ficha)?> -->
                                    <label for="mis_paises" class="form-label">País</label>
                                    <select name="mis_paises" id="mis_paises" class="select2 form-select" required onchange="obtenerProvincia(this)">
                                        <option value=""><?php echo $inf_ficha->Npais ?></option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="mis_departamentos" class="form-label">Departamento</label>
                                    <select name="mis_departamentos" id="mis_departamentos" class="select2 form-select" onchange="obtenerProvincia(this)">
                                        <option value=""><?php echo $inf_ficha->Ndepartamento ?></option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="mis_provincias" class="form-label">Provincia</label>
                                    <select name="mis_provincias" id="mis_provincias" placeholder="" class="select2 form-select" onchange="obtenerDistrito(this)" id-prov="<?php echo $inf_ficha->provincia ?>">
                                        <option value=""><?php echo $inf_ficha->Nprovincia ?></option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="mis_distritos" class="form-label">Distrito</label>
                                    <select name="mis_distritos" id="mis_distritos" class="select2 form-select" id-dist="<?php echo $inf_ficha->distrito ?>">
                                        <option value=""><?php echo $inf_ficha->Ndistrito ?></option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="localidad" class="form-label">Localidad</label>
                                    <input type="text" class="form-control" placeholder="" id="localidad" autocomplete="off" required value="<?php echo $inf_ficha->localidad ?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">Tipo de zona</label>
                                        <div class="zona">
                                            <input type="radio" name="zona" value="1" id="_brote" <?php echo $inf_ficha->tipo_zona == '1' ? 'checked' : '' ?> />
                                            <label for="_brote">
                                                Brote
                                            </label>

                                            <input type="radio" name="zona" value="2" id="_nueva" <?php echo $inf_ficha->tipo_zona == '2' ? 'checked' : '' ?> />
                                            <label for="_nueva">
                                                Nueva
                                            </label>
                                            <input type="radio" name="zona" value="3" id="_baja" <?php echo $inf_ficha->tipo_zona == '3' ? 'checked' : '' ?> <?php if ($inf_ficha->tipo_zona != '1' && $inf_ficha->tipo_zona != '2' && $inf_ficha->tipo_zona != '3') {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                } ?> />
                                            <label for="_baja">
                                                Baja transmisión
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12 d-none">
                                    <label for="direccion" class="form-label">Dirección de residencia</label>
                                    <input type="text" class="form-control" placeholder="" id="direccion" autocomplete="off" required value="<?php echo $inf_ficha->direccion ?>">
                                </div>
                                <div class="col-md-12">
                                    <label for="detalle_direccion" class="form-label">DETALLE DIRECCIÓN DE RESIDENCIA</label>
                                    <div class="col-md-12 row m-0 card_ficha detalle_direccion" style="padding: 20px;">
                                        <div class="row p-0 m-0">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Tipo de vía</label>
                                                <select name="d_tipo_via" id="d_tipo_via" class="select2 form-select" required>
                                                    <option value=""><?php echo $inf_ficha->Ntipovia ?></option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="d_nombre_via" class="form-label">Nombre de vía</label>
                                                <input type="text" class="form-control" placeholder="" id="d_nombre_via" autocomplete="off" required value="<?php echo $inf_ficha->direccion_nombre_via ?>">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="d_nro_puerta" class="form-label">N° de puerta</label>
                                                <input type="number" class="form-control" placeholder="" id="d_nro_puerta" autocomplete="off" required value="<?php echo $inf_ficha->direccion_numero_puerta ?>">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="d_nro_manzana" class="form-label">N° de manzana</label>
                                                <input type="text" class="form-control" placeholder="" id="d_nro_manzana" autocomplete="off" required value="<?php echo $inf_ficha->direccion_numero_manzana ?>">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="d_lote" class="form-label">Lote</label>
                                                <input type="text" class="form-control" placeholder="" id="d_lote" autocomplete="off" required value="<?php echo $inf_ficha->direccion_lote ?>">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="d_tipo_asociacion" class="form-label">Tipo asociación</label>
                                                <select name="d_tipo_asociacion" id="d_tipo_asociacion" class="select2 form-select" required>
                                                    <option value=""><?php echo $inf_ficha->Ntipoasociacion ?></option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="d_nombre_asociacion" class="form-label">Nombre asociación</label>
                                                <input type="text" class="form-control" placeholder="" id="d_nombre_asociacion" autocomplete="off" required value="<?php echo $inf_ficha->direccion_nombre_asociacion ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <h5 class="card-header">
                            Aspectos clínicos
                        </h5>
                        <hr class="my-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label for="responsable_laboratorio" class="form-label">Fecha de inicio de enfermedad</label>
                                    <input type="text" class="form-control flatpickr-input active" placeholder="" id="fecha_inicio_enfermedad" required value="<?php echo $inf_ficha->fecha_fie ?>">
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="responsable_epidemiologia" class="form-label">Fecha de muestra</label>
                                    <input type="text" class="form-control flatpickr-input active" placeholder="" id="fecha_muestra" required value="<?php echo $inf_ficha->fecha_mue ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <h5 class="card-header">
                            Datos clínicos y de sintomatología
                        </h5>
                        <hr class="my-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 mb-2">
                                    <div class="_gestante">
                                        <div class="inputGroup">
                                            <input id="_gestante" name="_gestante" type="checkbox" <?php echo $inf_ficha->gestante == 1 ? 'checked' : '' ?> />
                                            <label for="_gestante" class="box_contenido_sel_box">
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="256.000000pt" height="256.000000pt" viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">
                                                    <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                                                        <path d="M2191 2499 c-15 -44 -15 -46 21 -58 36 -13 41 -9 56 36 10 30 9 32
                                                    -20 42 -43 15 -45 15 -57 -20z" />
                                                        <path d="M594 2438 c-100 -135 -134 -264 -100 -381 19 -66 71 -130 120 -148
                                                    l32 -12 -131 -131 c-137 -137 -199 -221 -271 -365 -87 -174 -119 -314 -119
                                                    -516 0 -118 4 -152 24 -215 68 -219 222 -392 447 -501 l84 -41 0 -44 0 -44 40
                                                    0 41 0 -3 71 c-2 52 -7 74 -18 79 -8 4 -59 29 -112 54 -202 96 -328 231 -395
                                                    421 -26 75 -28 90 -27 230 1 128 5 164 28 250 68 259 251 521 489 699 103 78
                                                    103 108 -1 119 -102 12 -150 62 -159 166 -7 78 15 143 83 243 30 43 54 82 54
                                                    87 0 12 -35 41 -48 41 -7 0 -33 -28 -58 -62z" />
                                                        <path d="M2097 2218 c-118 -388 -166 -606 -174 -783 -9 -188 -13 -176 243
                                                    -675 124 -241 175 -409 190 -623 l7 -97 40 0 40 0 -7 97 c-4 54 -16 143 -27
                                                    198 -41 200 -84 303 -307 725 -82 156 -102 222 -102 336 0 150 62 438 166 769
                                                    25 83 49 157 51 166 3 12 -5 20 -28 28 -17 6 -35 11 -39 11 -4 0 -27 -69 -53
                                                    -152z" />
                                                        <path d="M874 1669 c-71 -12 -172 -50 -241 -90 -78 -46 -209 -179 -256 -259
                                                    -106 -183 -124 -418 -47 -622 56 -149 198 -305 343 -377 124 -61 190 -76 337
                                                    -75 107 1 137 5 205 27 115 38 198 90 290 182 92 92 144 175 182 290 22 68 26
                                                    98 27 205 1 147 -14 213 -75 337 -72 145 -228 287 -377 343 -119 45 -265 60
                                                    -388 39z m261 -84 c180 -37 351 -170 433 -336 96 -193 95 -389 0 -579 -129
                                                    -256 -419 -395 -702 -335 -241 51 -440 250 -491 491 -96 452 306 854 760 759z" />
                                                        <path d="M1066 1504 c-70 -22 -149 -103 -170 -174 -22 -75 -20 -118 10 -178
                                                    30 -61 85 -111 168 -152 88 -44 44 -36 -54 10 -47 22 -97 40 -112 40 -35 0
                                                    -85 -43 -93 -80 -12 -54 17 -92 108 -143 l82 -47 -85 6 c-81 6 -87 5 -115 -19
                                                    -17 -13 -48 -49 -69 -79 -25 -34 -57 -64 -85 -79 -69 -36 -67 -59 10 -109 83
                                                    -54 117 -53 193 1 l56 40 53 -46 c79 -69 129 -90 212 -90 89 1 147 26 214 93
                                                    84 84 153 251 167 402 8 86 -20 163 -81 222 -42 41 -43 43 -38 93 17 162 -118
                                                    307 -281 304 -23 0 -63 -7 -90 -15z m204 -98 c49 -32 79 -83 87 -145 10 -91
                                                    -63 -201 -145 -217 -83 -17 -252 116 -252 198 0 76 64 166 132 187 53 16 135
                                                    6 178 -23z m196 -412 c19 -51 14 -120 -18 -224 -55 -178 -163 -290 -282 -290
                                                    -47 0 -96 28 -165 95 -37 36 -73 65 -81 65 -7 0 -43 -22 -80 -50 -65 -48 -102
                                                    -61 -115 -40 -3 6 -2 10 4 10 6 0 36 34 67 75 65 86 53 83 222 59 133 -19 145
                                                    -15 140 50 l-3 41 -123 71 c-141 81 -151 89 -134 106 8 8 37 -1 117 -37 l106
                                                    -49 56 28 c30 15 57 34 60 44 2 9 22 25 43 35 21 10 55 37 77 61 l38 43 27
                                                    -25 c15 -14 35 -45 44 -68z" />
                                                    </g>
                                                </svg>
                                                <div class="_box_check">
                                                    <p class="p-0 _titulo_check">Gestante</p>
                                                    <!-- <p class="descripcion_check">Selecciona esta opción si el caso presenta un embarazo</p> -->
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-2">
                                    <div class="_gestante">
                                        <div class="inputGroup">
                                            <input id="_fiebre" name="_fiebre" type="checkbox" <?php echo $inf_ficha->fiebre == 1 ? 'checked' : '' ?> />
                                            <label for="_fiebre" class="box_contenido_sel_box">
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="256.000000pt" height="256.000000pt" viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">

                                                    <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                                                        <path d="M1235 2545 c-22 -8 -58 -33 -80 -57 -33 -36 -51 -46 -100 -58 -34 -8
                                                        -96 -13 -142 -11 -111 4 -167 -16 -242 -85 -61 -56 -93 -114 -106 -191 -4 -29
                                                        -13 -44 -25 -48 -36 -11 -98 -93 -110 -145 -14 -57 -2 -126 30 -174 17 -28 17
                                                        -30 -1 -70 -38 -83 -19 -202 43 -267 l25 -27 -24 -38 c-21 -34 -24 -49 -21
                                                        -111 3 -53 9 -79 24 -99 33 -45 70 -67 121 -71 l49 -5 11 -62 c20 -103 93
                                                        -235 176 -319 40 -39 96 -85 125 -102 28 -16 52 -33 52 -36 0 -4 -12 -32 -26
                                                        -63 -24 -53 -37 -66 -192 -182 -169 -126 -219 -177 -249 -253 -13 -33 -13 -43
                                                        -3 -56 24 -28 48 -17 74 34 38 73 65 101 201 200 l124 92 53 -27 c178 -90 337
                                                        -93 502 -9 l69 35 34 -26 c42 -32 77 -29 81 7 3 22 -8 34 -66 76 -57 42 -74
                                                        61 -96 108 -14 32 -26 60 -26 64 1 3 26 22 56 41 31 19 85 66 121 103 66 71
                                                        76 99 41 121 -15 9 -29 -1 -91 -62 -90 -91 -148 -131 -256 -178 -107 -46 -133
                                                        -43 -280 30 -177 90 -275 196 -335 366 l-30 85 -4 293 c-3 196 0 315 8 360 14
                                                        84 60 170 117 223 l44 40 29 -24 c28 -24 87 -49 140 -61 17 -4 34 -22 52 -55
                                                        29 -53 88 -100 152 -121 48 -16 141 -9 185 13 33 17 35 17 57 -4 17 -16 22
                                                        -29 17 -49 -5 -25 4 -35 87 -104 51 -43 97 -75 103 -73 5 1 17 13 25 25 14 21
                                                        12 25 -29 63 -24 23 -36 39 -26 35 10 -3 41 -6 69 -6 l50 0 -4 -272 c-4 -248
                                                        -6 -279 -26 -338 -12 -36 -22 -75 -22 -87 0 -27 36 -41 55 -22 16 17 55 130
                                                        55 159 0 16 6 20 34 20 140 0 220 160 145 289 l-20 34 33 66 c29 58 33 75 33
                                                        146 0 68 -4 89 -28 138 -25 50 -27 62 -18 89 28 79 -2 240 -45 246 -33 5 -50
                                                        -23 -36 -61 32 -93 19 -180 -38 -249 -94 -114 -280 -107 -367 13 -38 54 -59
                                                        60 -102 30 -101 -72 -232 -33 -289 88 l-27 56 -59 6 c-136 15 -215 153 -156
                                                        274 30 63 83 96 162 104 60 6 62 7 87 49 32 54 62 71 124 72 42 0 53 -5 93
                                                        -42 l45 -42 47 17 c26 10 62 17 80 17 38 0 98 -23 125 -48 31 -28 57 -88 57
                                                        -134 0 -55 5 -61 65 -82 66 -23 85 -24 98 -5 16 25 1 49 -43 66 -35 14 -40 20
                                                        -46 58 -23 158 -199 260 -349 204 -5 -2 -26 9 -46 24 -63 48 -130 58 -204 32z
                                                        m-343 -222 c-44 -64 -57 -139 -38 -213 l14 -55 -56 -55 c-110 -107 -142 -198
                                                        -142 -401 l0 -136 -32 -7 c-38 -7 -71 11 -98 57 -39 64 -38 128 5 191 30 45
                                                        31 57 4 82 -75 68 -61 191 27 241 58 32 64 40 64 86 0 56 41 138 88 177 42 34
                                                        102 58 150 59 l33 1 -19 -27z m1127 -614 c19 -55 13 -139 -13 -195 -28 -61
                                                        -37 -68 -76 -59 l-30 7 0 103 c0 92 2 104 18 109 10 4 31 20 47 36 16 17 32
                                                        30 36 30 4 0 12 -14 18 -31z m-1349 -440 l0 -111 -32 6 c-18 4 -44 18 -58 31
                                                        -21 21 -25 35 -25 81 0 49 4 59 28 80 16 14 41 24 58 24 l29 0 0 -111z m1311
                                                        82 c24 -24 29 -38 29 -76 0 -25 -5 -55 -11 -67 -10 -18 -65 -48 -89 -48 -6 0
                                                        -10 41 -10 110 l0 110 26 0 c15 0 38 -12 55 -29z m-696 -861 c43 0 75 7 113
                                                        25 l53 24 8 -22 c5 -12 21 -47 35 -77 29 -61 31 -58 -54 -92 -45 -18 -74 -22
                                                        -160 -22 -92 0 -113 4 -172 28 -38 16 -68 29 -68 30 0 1 12 27 26 56 14 30 30
                                                        64 34 76 l9 22 58 -24 c39 -16 78 -24 118 -24z" />
                                                        <path d="M284 2162 c-29 -26 -55 -56 -58 -66 -4 -11 3 -47 14 -82 l21 -63 -40
                                                        -51 c-47 -59 -50 -81 -19 -145 l22 -45 -22 -45 c-30 -62 -28 -83 15 -148 41
                                                        -62 55 -72 84 -57 27 15 23 38 -11 84 -36 47 -36 47 -8 113 l21 52 -21 52
                                                        c-28 65 -27 70 2 98 14 13 32 39 41 58 16 32 15 38 -4 95 -12 34 -21 65 -21
                                                        68 0 4 20 21 45 39 45 32 55 57 33 79 -21 21 -42 13 -94 -36z" />
                                                        <path d="M2182 2198 c-22 -22 -12 -47 33 -79 25 -18 45 -35 45 -39 0 -3 -9
                                                        -34 -21 -68 -19 -57 -20 -63 -4 -95 9 -19 27 -45 41 -58 29 -28 30 -33 2 -98
                                                        l-21 -52 21 -52 c28 -66 28 -66 -8 -113 -34 -46 -38 -69 -11 -84 29 -15 43 -5
                                                        84 57 43 65 45 86 15 148 l-22 45 22 45 c31 64 28 86 -19 145 l-40 51 21 63
                                                        c24 72 19 95 -26 137 -63 57 -91 68 -112 47z" />
                                                        <path d="M889 1649 c-46 -39 -87 -77 -91 -83 -8 -14 17 -56 32 -56 19 0 190
                                                        151 190 168 0 20 -18 42 -35 42 -6 0 -49 -32 -96 -71z" />
                                                        <path d="M928 1519 c-24 -13 -23 -34 4 -61 l22 -22 -22 -14 c-24 -16 -28 -42
                                                        -10 -60 17 -17 36 -15 67 8 l28 19 33 -24 c40 -29 44 -30 64 -9 21 20 20 30
                                                        -5 55 l-21 21 21 19 c24 22 26 40 9 57 -17 17 -36 15 -67 -8 l-28 -19 -33 24
                                                        c-38 28 -38 28 -62 14z" />
                                                        <path d="M1570 1505 l-33 -24 -28 19 c-31 23 -50 25 -67 8 -17 -17 -15 -35 9
                                                        -57 l21 -19 -21 -21 c-25 -25 -26 -35 -5 -55 20 -21 24 -20 64 9 l33 24 28
                                                        -19 c31 -23 50 -25 67 -8 18 18 14 46 -8 58 l-21 11 21 26 c24 31 25 37 4 57
                                                        -20 21 -24 20 -64 -9z" />
                                                        <path d="M1151 1232 c-13 -24 6 -52 53 -81 60 -38 153 -22 206 34 18 19 20 27
                                                        11 44 -15 27 -34 26 -79 -4 -20 -14 -46 -25 -57 -25 -11 0 -37 11 -57 25 -44
                                                        30 -64 31 -77 7z" />
                                                        <path d="M1057 953 c-39 -30 -47 -62 -22 -83 12 -10 21 -8 47 8 l33 21 40 -25
                                                        c50 -30 57 -30 92 0 l28 24 28 -24 c36 -30 53 -30 100 1 l37 26 28 -21 c29
                                                        -22 56 -19 66 6 9 22 -9 49 -48 73 -43 27 -55 26 -98 -2 l-34 -24 -34 24 c-43
                                                        29 -52 29 -88 -2 l-29 -24 -36 24 c-46 32 -65 31 -110 -2z" />
                                                        <path d="M671 459 c-53 -10 -68 -23 -85 -74 -11 -32 -21 -41 -62 -56 -54 -21
                                                        -74 -41 -74 -76 0 -16 -11 -28 -40 -43 -46 -23 -55 -38 -63 -102 -6 -46 8 -78
                                                        33 -78 18 0 40 32 40 58 0 35 8 46 47 66 35 18 53 43 53 75 0 14 11 23 38 31
                                                        59 19 81 37 92 79 9 33 16 41 43 46 58 12 66 16 72 36 8 24 -11 49 -34 48 -9
                                                        -1 -36 -5 -60 -10z" />
                                                        <path d="M1801 456 c-7 -8 -10 -24 -6 -35 6 -20 14 -24 72 -36 27 -5 34 -13
                                                        43 -46 11 -42 33 -60 93 -79 26 -8 37 -17 37 -31 0 -32 18 -57 53 -75 39 -20
                                                        47 -31 47 -66 0 -26 22 -58 40 -58 25 0 39 32 33 78 -8 64 -17 79 -63 102 -30
                                                        16 -40 26 -40 45 0 33 -30 61 -80 76 -23 7 -44 20 -47 28 -23 78 -40 93 -124
                                                        105 -35 5 -49 3 -58 -8z" />
                                                        <path d="M1782 258 c-22 -22 -12 -44 41 -90 32 -27 66 -70 86 -107 33 -63 56
                                                        -76 81 -46 27 32 -43 150 -130 219 -49 39 -60 42 -78 24z" />
                                                    </g>
                                                </svg>
                                                <div class="_box_check">
                                                    <p class="p-0 _titulo_check">Fiebre</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-2">
                                    <div class="_gestante">
                                        <div class="inputGroup">
                                            <input id="_rash" name="_rash" type="checkbox" <?php echo $inf_ficha->rash == 1 ? 'checked' : '' ?> />
                                            <label for="_rash" class="box_contenido_sel_box">
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="256.000000pt" height="256.000000pt" viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">

                                                    <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                                                        <path d="M1180 2542 c-67 -33 -70 -49 -70 -394 0 -286 -1 -308 -18 -317 -10
                                                        -5 -24 -6 -31 -2 -8 5 -25 98 -47 247 -18 131 -40 254 -49 272 -22 47 -90 77
                                                        -143 63 -44 -12 -79 -45 -91 -87 -5 -20 3 -106 27 -267 19 -130 31 -245 28
                                                        -254 -10 -25 -29 -1 -61 77 -51 123 -67 150 -100 170 -61 38 -131 22 -173 -40
                                                        -35 -51 -26 -89 69 -300 l83 -185 6 -175 c6 -190 10 -205 72 -275 17 -20 48
                                                        -45 70 -56 l38 -19 0 -471 0 -471 29 -29 29 -29 377 0 377 0 29 29 29 29 0
                                                        504 c0 277 4 508 8 514 4 6 32 29 63 51 31 23 71 60 90 81 56 66 309 505 309
                                                        536 0 56 -81 106 -171 106 -19 0 -60 -12 -90 -27 -47 -24 -64 -42 -129 -136
                                                        l-75 -108 -3 73 c-2 51 11 153 43 351 29 174 45 291 41 312 -4 21 -20 45 -42
                                                        64 -64 57 -168 34 -199 -43 -7 -17 -30 -134 -50 -261 -21 -126 -42 -235 -47
                                                        -242 -5 -6 -16 -9 -24 -6 -11 4 -14 30 -14 123 0 65 -3 125 -6 134 -9 23 -51
                                                        20 -65 -5 -7 -14 -10 -66 -7 -146 l3 -125 33 -29 c52 -46 117 -37 147 20 8 16
                                                        32 136 54 267 44 259 53 283 105 270 15 -4 30 -17 35 -29 5 -14 -6 -107 -35
                                                        -272 -32 -188 -43 -280 -44 -370 -2 -118 -2 -120 25 -142 52 -45 83 -27 170
                                                        99 91 130 112 148 176 148 53 0 89 -13 89 -32 0 -6 -42 -83 -92 -169 l-93
                                                        -158 -123 -1 c-136 0 -175 -11 -210 -55 -12 -15 -26 -44 -32 -64 -7 -28 -26
                                                        -50 -76 -90 -41 -33 -72 -67 -81 -89 -30 -73 2 -163 70 -199 18 -9 65 -18 105
                                                        -21 l72 -5 0 -396 c0 -296 -3 -400 -12 -409 -17 -17 -689 -17 -706 0 -24 24
                                                        -10 47 78 132 74 71 95 86 121 86 50 0 114 43 138 93 33 68 26 117 -15 117
                                                        -25 0 -37 -18 -48 -72 -8 -35 -43 -58 -104 -69 -38 -8 -58 -20 -107 -69 -33
                                                        -33 -64 -60 -68 -60 -4 0 -7 119 -7 265 l0 265 79 0 c88 0 91 -3 91 -69 0 -50
                                                        37 -105 72 -109 37 -4 46 28 19 72 -12 20 -21 50 -21 75 0 31 -7 48 -29 73
                                                        -27 30 -32 32 -120 36 l-91 4 0 83 c0 46 -3 90 -6 99 -3 9 -32 31 -63 50 -94
                                                        58 -105 86 -112 296 l-5 175 -87 192 c-72 160 -85 197 -77 217 12 31 45 42 73
                                                        23 13 -8 40 -57 67 -122 48 -116 73 -145 125 -145 36 0 80 30 90 61 4 11 -10
                                                        133 -31 270 -35 240 -36 250 -19 269 22 24 58 26 76 4 8 -10 29 -123 50 -267
                                                        37 -250 37 -252 68 -279 36 -32 76 -36 121 -13 16 8 34 24 40 34 6 12 10 134
                                                        10 323 0 335 3 351 56 356 17 2 36 -3 42 -11 7 -7 13 -61 14 -126 3 -103 5
                                                        -115 24 -128 19 -12 24 -12 38 2 13 13 16 39 16 128 0 129 -14 168 -71 199
                                                        -42 23 -74 23 -119 0z m630 -1219 c-1 -20 -65 -89 -132 -142 -41 -33 -78 -67
                                                        -82 -76 -3 -9 -6 -43 -6 -76 l0 -59 -64 0 c-82 0 -116 23 -116 80 0 34 7 43
                                                        74 104 60 54 76 74 85 110 6 25 19 50 29 55 20 12 212 15 212 4z" />
                                                        <path d="M985 1514 c-19 -20 -16 -43 8 -58 20 -13 50 2 55 26 3 16 -23 48 -38
                                                        48 -5 0 -16 -7 -25 -16z" />
                                                        <path d="M822 1458 c-28 -28 -1 -75 37 -63 25 8 34 31 21 56 -12 21 -40 25
                                                        -58 7z" />
                                                        <path d="M927 1373 c-13 -12 -7 -50 9 -64 31 -26 70 25 44 56 -13 16 -42 20
                                                        -53 8z" />
                                                        <path d="M1444 745 c-5 -18 -1 -32 10 -43 23 -23 51 -4 51 34 0 24 -5 30 -27
                                                        32 -22 3 -29 -2 -34 -23z" />
                                                        <path d="M926 608 c-27 -39 18 -80 52 -46 18 18 14 46 -7 58 -26 14 -28 13
                                                        -45 -12z" />
                                                        <path d="M1280 611 c-7 -14 -5 -24 8 -41 28 -35 71 -4 57 41 -8 25 -51 25 -65
                                                        0z" />
                                                        <path d="M1452 618 c-29 -29 3 -82 36 -61 25 15 22 67 -3 71 -11 1 -26 -3 -33
                                                        -10z" />
                                                        <path d="M987 504 c-15 -15 -6 -54 14 -64 27 -15 51 5 47 39 -2 19 -9 27 -28
                                                        29 -14 2 -29 0 -33 -4z" />
                                                        <path d="M1437 354 c-15 -15 -6 -54 14 -64 27 -15 51 5 47 39 -2 19 -9 27 -28
                                                        29 -14 2 -29 0 -33 -4z" />
                                                        <path d="M1372 218 c-25 -25 -6 -68 30 -68 9 0 22 9 28 20 22 40 -26 80 -58
                                                        48z" />
                                                    </g>
                                                </svg>
                                                <div class="_box_check">
                                                    <p class="p-0 _titulo_check">Rash</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-2">
                                    <div class="_gestante">
                                        <div class="inputGroup">
                                            <input id="_conjuntivitis" name="_conjuntivitis" type="checkbox" <?php echo $inf_ficha->conjuntivitis == 1 ? 'checked' : '' ?> />
                                            <label for="_conjuntivitis" class="box_contenido_sel_box">
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="256.000000pt" height="256.000000pt" viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">

                                                    <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                                                        <path d="M1055 2385 c-329 -61 -598 -215 -828 -475 -69 -77 -164 -214 -202
                                                        -289 l-27 -55 22 -45 c63 -131 222 -334 346 -443 72 -63 232 -173 297 -204
                                                        l37 -18 0 -164 c0 -184 7 -209 68 -238 45 -21 91 -12 128 27 29 30 29 32 32
                                                        160 2 71 7 129 10 129 4 -1 36 -7 72 -15 73 -15 103 -7 98 27 -4 27 -15 32
                                                        -128 58 -118 27 -257 83 -361 146 -74 45 -78 49 -65 68 21 33 51 30 129 -13
                                                        373 -206 817 -206 1191 -1 74 40 77 41 101 26 14 -9 25 -23 25 -31 0 -18 -129
                                                        -94 -229 -136 -135 -56 -296 -88 -515 -102 -47 -2 -67 -26 -46 -53 13 -15 30
                                                        -16 142 -12 l128 6 0 -184 c0 -110 4 -193 11 -207 22 -49 97 -71 153 -45 48
                                                        21 60 54 64 171 4 96 6 109 25 119 17 9 24 7 39 -12 10 -12 18 -32 18 -44 0
                                                        -45 60 -96 112 -96 36 0 88 37 104 75 10 26 14 83 14 233 l0 198 70 49 c97 65
                                                        257 220 332 319 33 44 79 118 101 164 l40 84 -22 46 c-86 178 -319 441 -492
                                                        555 -154 102 -304 168 -473 207 -161 38 -236 36 -236 -4 1 -27 22 -36 125 -51
                                                        197 -29 391 -106 554 -218 81 -56 222 -185 274 -250 l32 -41 -65 51 c-211 164
                                                        -463 285 -710 339 -67 15 -126 19 -280 19 -179 0 -204 -3 -302 -27 -238 -60
                                                        -451 -165 -663 -327 -55 -42 -58 -43 -38 -15 40 56 198 198 283 255 195 130
                                                        381 197 622 224 62 7 83 23 73 55 -5 17 -14 20 -63 19 -31 0 -88 -7 -127 -14z
                                                        m470 -260 c303 -62 598 -226 858 -475 l92 -88 -18 -37 c-12 -26 -22 -35 -33
                                                        -31 -8 3 -58 35 -109 72 -69 48 -100 64 -115 59 -29 -9 -26 -49 6 -74 l26 -21
                                                        -31 -46 c-24 -36 -28 -51 -20 -65 16 -30 45 -22 82 23 l35 41 46 -29 c25 -16
                                                        46 -32 46 -35 0 -27 -165 -216 -258 -298 l-57 -49 -48 43 -47 44 55 91 c60 98
                                                        66 123 35 140 -17 9 -25 6 -49 -20 l-29 -32 -42 31 c-33 24 -46 28 -61 20 -33
                                                        -17 -22 -51 27 -87 l45 -33 -22 -37 c-69 -113 -66 -110 -161 -156 -258 -125
                                                        -539 -149 -817 -70 -47 13 -144 54 -216 89 -71 36 -141 65 -155 65 -31 0 -85
                                                        -32 -100 -60 l-11 -21 -29 23 c-16 13 -29 27 -29 32 -1 5 26 73 60 152 33 79
                                                        59 151 57 161 -2 11 -14 19 -31 21 -25 3 -30 -2 -51 -49 l-23 -52 -31 52 c-24
                                                        39 -38 51 -56 51 -43 0 -42 -33 3 -111 47 -80 47 -82 25 -135 l-16 -39 -60 65
                                                        c-59 65 -175 229 -199 284 -13 28 -12 30 78 116 214 206 446 349 693 430 63
                                                        21 149 43 190 49 41 6 86 13 100 15 52 9 288 -3 365 -19z m415 -1404 c0 -93
                                                        -3 -176 -6 -185 -13 -34 -74 -12 -74 26 0 53 -58 108 -115 108 -35 0 -82 -25
                                                        -97 -53 -7 -12 -15 -70 -18 -131 -4 -89 -8 -111 -22 -120 -13 -8 -23 -8 -35 0
                                                        -16 10 -18 33 -21 203 -2 186 -2 191 18 191 30 0 225 66 295 100 33 15 63 29
                                                        68 29 4 1 7 -75 7 -168z m-1121 88 l32 -11 -3 -137 c-3 -136 -3 -136 -27 -139
                                                        -43 -6 -51 19 -51 165 0 73 4 133 9 133 4 0 22 -5 40 -11z" />
                                                        <path d="M1128 2071 c-150 -48 -279 -173 -323 -313 -9 -29 -19 -59 -21 -67 -3
                                                        -10 -35 15 -97 77 -51 51 -100 92 -109 92 -10 0 -22 -9 -28 -20 -8 -16 -5 -26
                                                        21 -55 l31 -35 -31 -35 c-35 -41 -37 -48 -15 -69 21 -22 28 -20 70 16 l36 32
                                                        59 -65 c44 -49 58 -71 59 -96 0 -17 9 -59 19 -93 l19 -61 -21 -8 c-12 -5 -51
                                                        -19 -87 -31 -36 -13 -71 -28 -77 -33 -31 -23 3 -71 42 -61 21 5 24 2 27 -33 3
                                                        -35 5 -38 33 -38 29 0 30 2 35 54 5 52 6 55 43 67 l39 14 58 -62 59 -62 -21
                                                        -29 c-39 -54 12 -89 61 -42 l28 26 76 -26 c150 -50 319 -29 447 56 61 42 61
                                                        42 76 20 8 -11 24 -21 34 -21 30 0 39 28 23 70 -14 35 -14 38 17 86 34 54 70
                                                        159 70 208 1 24 15 46 59 95 l59 65 36 -32 c42 -36 49 -38 70 -16 22 21 20 28
                                                        -15 69 l-31 35 31 35 c26 29 29 39 21 55 -6 11 -18 20 -28 20 -9 0 -58 -41
                                                        -109 -92 -62 -62 -94 -87 -97 -77 -2 8 -12 38 -21 67 -9 29 -32 76 -51 103
                                                        -39 58 -40 62 -19 79 21 17 19 66 -2 74 -10 4 -28 -1 -45 -14 -15 -11 -29 -20
                                                        -32 -20 -2 0 -27 16 -56 35 -109 73 -292 97 -422 56z m257 -66 c83 -22 147
                                                        -60 206 -122 155 -163 156 -420 3 -584 -166 -176 -430 -186 -606 -21 -182 170
                                                        -182 457 0 623 115 105 253 141 397 104z" />
                                                        <path d="M1181 1843 c-63 -22 -134 -96 -156 -162 -43 -130 15 -269 139 -333
                                                        59 -31 175 -31 232 -1 83 44 155 143 134 183 -16 30 -48 25 -68 -11 -46 -84
                                                        -100 -119 -182 -119 -131 0 -218 114 -185 243 24 92 122 157 213 141 67 -12
                                                        112 -46 156 -117 23 -38 60 -34 64 6 7 56 -78 145 -167 175 -46 16 -127 14
                                                        -180 -5z" />
                                                        <path d="M1880 383 c-62 -19 -90 -56 -90 -119 0 -51 53 -104 104 -104 73 0
                                                        121 47 119 114 -1 41 -17 72 -46 90 -27 17 -67 26 -87 19z m48 -85 c28 -28 1
                                                        -75 -37 -63 -11 3 -23 15 -26 26 -12 38 35 65 63 37z" />
                                                    </g>
                                                </svg>
                                                <div class="_box_check">
                                                    <p class="p-0 _titulo_check">Conjuntivitis</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-2">
                                    <div class="_gestante">
                                        <div class="inputGroup">
                                            <input id="_artralgia" name="_artralgia" type="checkbox" <?php echo $inf_ficha->artralgia == 1 ? 'checked' : '' ?> />
                                            <label for="_artralgia" class="box_contenido_sel_box">
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="256.000000pt" height="256.000000pt" viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">

                                                    <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                                                        <path d="M650 2542 c-16 -13 -36 -69 -81 -227 -32 -116 -59 -220 -59 -233 0
                                                -30 43 -72 73 -72 14 0 43 7 66 15 22 8 41 11 41 7 0 -4 -13 -54 -30 -112 -37
                                                -131 -38 -163 -5 -195 32 -33 70 -32 104 3 21 22 38 68 85 238 57 205 58 211
                                                42 242 -20 39 -55 49 -114 33 -25 -6 -47 -10 -49 -7 -3 3 9 55 26 116 37 134
                                                38 154 6 185 -29 30 -73 33 -105 7z" />
                                                        <path d="M1816 2402 c-88 -87 -177 -168 -197 -180 -51 -31 -151 -67 -329 -119
                                                -295 -85 -402 -173 -417 -344 -5 -52 -3 -60 20 -83 55 -55 128 -20 141 68 15
                                                97 79 139 330 211 176 51 279 90 352 137 27 16 122 103 212 192 144 143 162
                                                165 162 194 0 44 -38 82 -81 82 -27 0 -53 -21 -193 -158z" />
                                                        <path d="M44 2458 c-39 -18 -44 -50 -44 -259 0 -245 8 -269 89 -269 15 0 43
                                                11 62 25 l34 26 5 -131 c5 -123 7 -133 29 -151 32 -26 69 -24 114 6 l37 26 0
                                                -121 c0 -121 0 -122 29 -151 36 -36 70 -37 108 -5 l28 24 -3 224 c-3 211 -5
                                                224 -24 246 -28 29 -74 28 -120 -3 l-36 -25 -4 131 c-3 123 -4 132 -27 150
                                                -31 26 -71 24 -114 -5 l-35 -24 -7 129 c-7 122 -9 130 -32 149 -28 22 -56 24
                                                -89 8z" />
                                                        <path d="M2328 1973 c-66 -65 -142 -147 -169 -183 -67 -87 -145 -250 -214
                                                -445 -86 -240 -119 -292 -205 -315 -70 -19 -93 -88 -45 -135 72 -73 246 27
                                                321 185 17 36 57 137 89 225 60 167 115 287 168 364 17 25 89 105 159 177 109
                                                112 128 137 128 163 0 43 -39 81 -81 81 -28 0 -49 -17 -151 -117z" />
                                                        <path d="M1163 1785 c-33 -14 -43 -32 -43 -75 0 -38 26 -64 84 -85 99 -36 181
                                                -139 196 -245 12 -82 28 -105 86 -119 46 -12 87 -45 127 -104 44 -66 147 -30
                                                147 52 0 46 -100 159 -166 187 -25 11 -33 21 -39 51 -12 65 -58 145 -122 213
                                                -95 101 -205 152 -270 125z" />
                                                        <path d="M840 1596 c-83 -19 -124 -40 -179 -91 -69 -64 -102 -120 -187 -310
                                                -40 -90 -89 -190 -110 -222 -20 -32 -111 -133 -200 -224 -143 -145 -164 -170
                                                -164 -198 0 -43 38 -81 81 -81 28 0 52 19 187 152 224 223 220 216 407 614 76
                                                161 141 210 272 202 89 -5 155 -37 191 -91 23 -34 27 -52 27 -107 0 -58 -4
                                                -74 -33 -119 -17 -29 -32 -66 -32 -82 0 -57 68 -97 119 -69 24 12 76 94 96
                                                150 23 65 21 184 -5 252 -41 111 -148 194 -287 223 -81 17 -110 17 -183 1z" />
                                                        <path d="M1372 1150 c-28 -26 -37 -62 -22 -89 6 -12 31 -40 55 -62 74 -68 82
                                                -156 24 -257 -52 -91 -101 -115 -311 -153 -193 -34 -228 -56 -455 -282 -173
                                                -172 -193 -196 -193 -225 0 -44 38 -82 81 -82 28 0 56 24 223 188 205 203 230
                                                220 351 236 106 15 232 50 288 79 62 32 136 107 167 167 90 176 51 380 -90
                                                474 -47 31 -88 33 -118 6z" />
                                                        <path d="M975 914 c-16 -14 -49 -35 -72 -45 -75 -34 -96 -97 -48 -144 29 -30
                                                65 -32 123 -5 129 59 175 152 100 204 -32 23 -68 19 -103 -10z" />
                                                    </g>
                                                </svg>
                                                <div class="_box_check">
                                                    <p class="p-0 _titulo_check">Artralgia</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-2">
                                    <div class="_gestante">
                                        <div class="inputGroup">
                                            <input id="_mialgia" name="_mialgia" type="checkbox" <?php echo $inf_ficha->mialgia == 1 ? 'checked' : '' ?> />
                                            <label for="_mialgia" class="box_contenido_sel_box">
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="256.000000pt" height="256.000000pt" viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">

                                                    <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                                                        <path d="M1197 2546 c-98 -36 -169 -119 -182 -217 -8 -60 16 -158 54 -220 l29
                                                -47 -73 -4 c-127 -8 -219 -69 -269 -177 -20 -44 -21 -64 -24 -416 -3 -416 -4
                                                -408 73 -470 33 -27 44 -30 106 -30 l69 0 0 -415 c0 -466 -2 -453 74 -515 33
                                                -26 46 -30 99 -30 49 0 69 5 95 23 l32 23 33 -23 c25 -18 45 -23 94 -23 53 0
                                                66 4 99 30 76 62 74 49 74 515 l0 415 69 0 c62 0 73 3 106 30 69 55 75 78 75
                                                267 0 177 -5 198 -50 198 -35 0 -50 -28 -50 -91 l0 -59 -75 0 -75 0 0 234 c0
                                                200 -2 237 -16 250 -20 20 -48 20 -68 0 -14 -13 -16 -50 -16 -250 l0 -234
                                                -200 0 -200 0 0 234 c0 200 -2 237 -16 250 -20 20 -48 20 -68 0 -14 -13 -16
                                                -50 -16 -250 l0 -234 -76 0 -75 0 3 258 c3 250 4 258 27 295 13 21 42 50 64
                                                65 l41 27 310 0 c361 0 364 -1 426 -93 28 -42 39 -52 62 -52 21 0 32 7 40 26
                                                10 22 9 32 -12 70 -47 91 -138 144 -256 152 l-72 4 29 47 c38 62 62 160 54
                                                220 -22 162 -197 271 -348 217z m140 -97 c73 -27 121 -111 107 -187 -15 -82
                                                -87 -185 -140 -198 -56 -14 -115 29 -158 115 -48 94 -42 172 16 228 53 51 113
                                                66 175 42z m-357 -1289 c0 -41 -5 -56 -25 -75 -31 -32 -69 -32 -100 0 -20 19
                                                -25 34 -25 75 l0 50 75 0 75 0 0 -50z m500 -380 l0 -430 -75 0 -75 0 0 308 c0
                                                329 0 332 -50 332 -50 0 -50 -3 -50 -332 l0 -308 -75 0 -75 0 0 430 0 430 200
                                                0 200 0 0 -430z m250 380 c0 -41 -5 -56 -25 -75 -31 -32 -69 -32 -100 0 -20
                                                19 -25 34 -25 75 l0 50 75 0 75 0 0 -50z m-500 -960 c0 -41 -5 -56 -25 -75
                                                -13 -14 -36 -25 -50 -25 -14 0 -37 11 -50 25 -20 19 -25 34 -25 75 l0 50 75 0
                                                75 0 0 -50z m250 0 c0 -41 -5 -56 -25 -75 -31 -32 -69 -32 -100 0 -20 19 -25
                                                34 -25 75 l0 50 75 0 75 0 0 -50z" />
                                                        <path d="M316 2164 c-25 -24 -19 -47 24 -101 l40 -51 -35 -23 c-50 -34 -54
                                                -61 -18 -112 16 -23 43 -61 59 -84 31 -46 53 -58 84 -48 39 12 36 52 -9 115
                                                l-41 59 40 31 c23 19 40 40 40 52 0 18 -97 151 -124 170 -18 12 -44 9 -60 -8z" />
                                                        <path d="M2184 2172 c-27 -19 -124 -152 -124 -170 0 -12 17 -33 40 -52 l40
                                                -31 -41 -59 c-32 -45 -40 -64 -35 -83 12 -50 68 -47 103 6 11 17 38 55 58 84
                                                44 62 42 87 -10 122 l-35 23 40 51 c22 27 40 58 40 68 0 35 -47 61 -76 41z" />
                                                        <path d="M145 1670 c-26 -28 -13 -61 40 -99 25 -18 45 -35 45 -39 0 -3 -12
                                                -23 -26 -43 -17 -25 -24 -45 -19 -58 6 -20 159 -151 177 -151 26 0 48 23 48
                                                50 0 22 -12 39 -55 75 l-54 47 31 38 c38 48 33 77 -19 113 -21 14 -58 40 -82
                                                56 -52 36 -62 38 -86 11z" />
                                                        <path d="M2329 1659 c-24 -16 -61 -42 -82 -56 -52 -36 -57 -65 -19 -113 l31
                                                -38 -54 -47 c-43 -36 -55 -53 -55 -75 0 -27 22 -50 48 -50 18 0 171 131 177
                                                151 5 13 -2 33 -19 58 -14 20 -26 40 -26 43 0 4 20 21 45 39 56 40 68 75 35
                                                101 -29 23 -29 23 -81 -13z" />
                                                        <path d="M1742 1668 c-7 -7 -12 -21 -12 -33 0 -28 19 -45 50 -45 31 0 50 17
                                                50 45 0 28 -19 45 -50 45 -14 0 -31 -5 -38 -12z" />
                                                        <path d="M271 1054 c-44 -36 -83 -74 -86 -85 -5 -14 3 -34 21 -61 l28 -40 -24
                                                -20 c-88 -69 -100 -95 -56 -123 29 -19 35 -16 134 55 78 55 85 78 44 130 l-31
                                                38 54 47 c43 36 55 53 55 75 0 27 -22 50 -48 50 -6 0 -46 -30 -91 -66z" />
                                                        <path d="M2168 1109 c-11 -6 -18 -22 -18 -39 0 -22 12 -39 55 -75 l54 -47 -31
                                                -38 c-41 -52 -34 -75 44 -130 99 -71 105 -74 134 -55 44 28 32 54 -56 123
                                                l-24 20 28 40 c18 27 26 47 21 61 -7 22 -160 151 -178 151 -7 0 -20 -5 -29
                                                -11z" />
                                                        <path d="M412 639 c-11 -11 -41 -51 -67 -89 -55 -80 -55 -102 0 -139 l35 -23
                                                -40 -51 c-22 -27 -40 -58 -40 -68 0 -35 47 -61 76 -41 27 19 124 152 124 170
                                                0 12 -17 33 -40 52 l-40 32 40 55 c43 61 48 83 24 107 -21 22 -50 20 -72 -5z" />
                                                        <path d="M2076 644 c-24 -24 -19 -46 24 -107 l40 -55 -40 -32 c-23 -19 -40
                                                -40 -40 -52 0 -18 97 -151 124 -170 29 -20 76 6 76 41 0 10 -18 41 -40 69
                                                l-40 50 24 15 c37 24 56 47 56 66 0 16 -103 168 -125 183 -17 12 -43 9 -59 -8z" />
                                                    </g>
                                                </svg>
                                                <div class="_box_check">
                                                    <p class="p-0 _titulo_check">Mialgia</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-2">
                                    <div class="_gestante">
                                        <div class="inputGroup">
                                            <input id="_otros" name="_otros" type="checkbox" <?php echo $inf_ficha->otros == 1 ? 'checked' : '' ?> />
                                            <label for="_otros" class="box_contenido_sel_box" onclick="otrasEnfermedades()">
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="256.000000pt" height="256.000000pt" viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">

                                                    <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                                                        <path d="M1796 2538 c-9 -12 -16 -39 -16 -59 0 -29 -5 -38 -26 -48 -23 -10
                                                -30 -8 -60 19 -37 32 -61 37 -86 18 -32 -25 -31 -54 3 -92 29 -34 30 -39 19
                                                -66 -11 -27 -17 -30 -56 -30 -33 0 -46 -5 -58 -22 -32 -45 -9 -79 59 -87 42
                                                -5 50 -10 58 -34 8 -26 5 -33 -32 -71 -43 -44 -51 -74 -25 -100 26 -26 56 -18
                                                100 25 38 37 45 40 71 32 24 -8 29 -16 34 -58 8 -68 42 -91 87 -59 17 12 22
                                                25 22 58 0 39 3 45 31 56 29 12 32 11 73 -29 94 -92 165 -14 76 83 -37 40 -40
                                                46 -29 70 10 22 19 26 54 26 28 0 47 6 58 18 39 43 7 92 -60 92 -37 0 -42 3
                                                -52 32 -10 29 -9 34 21 65 28 29 31 36 22 60 -5 16 -21 32 -37 37 -24 9 -31 6
                                                -60 -22 -31 -30 -36 -31 -65 -21 -29 10 -32 15 -32 53 0 69 -60 103 -94 54z
                                                m115 -234 c36 -35 46 -82 25 -122 -22 -43 -54 -62 -104 -62 -61 0 -102 41
                                                -102 100 0 52 13 76 53 101 41 26 90 19 128 -17z" />
                                                        <path d="M1790 2261 c-15 -29 -12 -56 8 -74 21 -19 45 -21 73 -7 22 12 27 68
                                                7 88 -20 20 -76 15 -88 -7z" />
                                                        <path d="M488 2483 c-9 -10 -19 -48 -23 -86 -5 -51 -11 -69 -23 -73 -10 -3
                                                -43 -17 -74 -33 l-57 -28 -30 38 c-38 46 -64 56 -96 35 -38 -25 -32 -60 19
                                                -117 l44 -49 -28 -82 c-27 -82 -60 -245 -60 -300 0 -28 -1 -28 -60 -28 -83 0
                                                -119 -36 -90 -91 9 -16 22 -19 78 -19 l68 0 17 -110 c18 -119 65 -276 97 -320
                                                l20 -28 -30 -64 c-16 -34 -30 -70 -30 -79 0 -34 56 -61 86 -41 6 4 24 31 38
                                                60 23 46 31 53 49 48 12 -3 38 -9 58 -12 33 -6 37 -10 43 -43 3 -20 6 -48 6
                                                -62 0 -32 28 -59 62 -59 43 0 52 21 44 107 l-7 77 38 32 38 33 47 -46 c51 -50
                                                91 -59 115 -27 23 31 14 54 -44 116 l-58 60 3 57 c2 42 -4 77 -27 141 -16 47
                                                -31 101 -33 120 l-3 35 78 5 c80 5 97 14 97 53 0 38 -36 57 -111 57 l-71 0 7
                                                45 c3 25 20 84 36 130 16 47 29 106 29 131 0 42 5 52 55 106 59 64 66 87 35
                                                118 -29 29 -45 25 -94 -21 l-44 -40 -46 35 c-25 19 -55 37 -66 41 -20 6 -21
                                                11 -14 86 7 89 -1 109 -46 109 -15 0 -34 -8 -42 -17z m79 -293 c77 -46 87
                                                -103 42 -236 -32 -94 -34 -106 -34 -239 0 -133 2 -146 34 -241 41 -123 38
                                                -159 -17 -215 -52 -51 -106 -60 -170 -27 -56 29 -83 77 -118 216 -75 293 -6
                                                707 126 755 35 13 106 6 137 -13z" />
                                                        <path d="M407 2012 c-21 -23 -21 -41 -1 -70 22 -32 73 -27 93 9 13 24 13 29
                                                -2 53 -21 31 -66 35 -90 8z" />
                                                        <path d="M370 1740 c-11 -11 -20 -29 -20 -40 0 -26 34 -60 60 -60 26 0 60 34
                                                60 60 0 11 -9 29 -20 40 -11 11 -29 20 -40 20 -11 0 -29 -9 -40 -20z" />
                                                        <path d="M407 1462 c-22 -25 -21 -55 2 -76 27 -25 72 -17 90 15 13 24 13 29
                                                -2 53 -21 31 -66 35 -90 8z" />
                                                        <path d="M2029 1593 c-9 -10 -15 -48 -17 -99 -4 -82 -4 -82 -42 -113 -25 -20
                                                -50 -55 -70 -98 -18 -38 -46 -90 -62 -116 l-31 -48 -51 50 c-53 52 -89 64
                                                -114 39 -25 -25 -13 -61 39 -114 l51 -52 -43 -32 c-24 -18 -80 -49 -124 -71
                                                -46 -21 -95 -54 -113 -73 -32 -35 -34 -36 -110 -36 -85 0 -102 -8 -102 -51 0
                                                -39 33 -59 96 -59 l52 0 5 -57 c3 -32 8 -67 11 -78 5 -16 -6 -30 -54 -68 -63
                                                -50 -70 -68 -44 -105 23 -33 54 -27 118 23 32 25 60 45 62 45 1 0 18 -9 36
                                                -19 18 -11 50 -23 71 -26 l37 -7 0 -62 c0 -69 10 -86 51 -86 40 0 59 33 59
                                                105 l1 60 78 38 c72 35 152 87 245 161 l36 29 50 -47 c27 -25 53 -46 57 -46 5
                                                0 19 7 31 16 35 24 28 62 -20 111 -31 32 -40 47 -33 57 6 7 34 44 62 82 63 82
                                                141 230 149 283 6 36 9 38 80 65 79 29 97 52 75 94 -17 31 -42 34 -106 12 -46
                                                -16 -60 -17 -67 -8 -4 7 -8 16 -8 20 0 3 -11 20 -25 36 l-25 30 40 50 c44 55
                                                50 90 20 117 -29 26 -60 13 -108 -50 -44 -56 -54 -60 -111 -49 -30 6 -31 8
                                                -31 63 0 69 -19 101 -59 101 -16 0 -35 -7 -42 -17z m212 -302 c36 -32 42 -43
                                                46 -88 5 -43 0 -63 -26 -119 -94 -202 -269 -384 -473 -494 -47 -25 -95 -43
                                                -125 -46 -167 -18 -229 206 -78 281 154 76 263 161 328 254 18 25 50 82 72
                                                125 43 85 72 114 126 125 54 11 86 1 130 -38z" />
                                                        <path d="M2087 1152 c-36 -39 -13 -94 38 -94 34 -1 55 19 55 53 0 53 -59 79
                                                -93 41z" />
                                                        <path d="M1920 930 c-11 -11 -20 -29 -20 -40 0 -26 34 -60 60 -60 24 0 60 37
                                                60 62 0 24 -35 58 -60 58 -11 0 -29 -9 -40 -20z" />
                                                        <path d="M1697 762 c-35 -38 -13 -92 36 -92 42 0 57 15 57 57 0 50 -59 72 -93
                                                35z" />
                                                        <path d="M467 652 c-10 -11 -17 -35 -17 -59 0 -36 -4 -42 -30 -53 -27 -11 -32
                                                -10 -65 19 -41 35 -52 37 -83 15 -32 -22 -29 -64 7 -98 26 -25 28 -30 18 -57
                                                -10 -26 -16 -29 -53 -29 -45 0 -74 -22 -74 -58 0 -33 27 -52 74 -52 37 0 43
                                                -3 53 -29 10 -27 8 -32 -28 -67 -48 -47 -55 -68 -35 -99 25 -38 62 -33 112 16
                                                42 41 42 41 73 25 28 -15 31 -21 31 -61 0 -34 5 -47 19 -55 48 -25 91 7 91 68
                                                0 32 5 41 27 51 24 11 29 9 67 -28 45 -44 83 -53 110 -25 26 25 19 51 -26 100
                                                -37 40 -40 48 -32 72 8 23 17 28 54 32 59 7 70 15 70 50 0 40 -24 60 -74 60
                                                -37 0 -43 3 -53 29 -10 27 -8 32 18 57 37 35 39 77 5 99 -27 18 -50 12 -87
                                                -22 -21 -19 -30 -22 -51 -14 -21 8 -26 18 -31 57 -7 68 -53 97 -90 56z m112
                                                -247 c21 -24 31 -46 31 -68 0 -81 -81 -136 -152 -103 -71 34 -88 112 -37 171
                                                27 31 37 35 79 35 42 0 52 -4 79 -35z" />
                                                        <path d="M453 364 c-15 -24 -15 -29 -2 -53 28 -49 109 -32 109 24 0 54 -77 75
                                                -107 29z" />
                                                    </g>
                                                </svg>
                                                <div class="_box_check">
                                                    <p class="p-0 _titulo_check">Otros</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 <?php echo $inf_ficha->otros == 1 ? '' : 'd-none' ?> otro_sintomatologia">
                                    <label for="_nombre_otro" class="form-label">Nombre de sintomatología</label>
                                    <input type="text" class="form-control" placeholder="" autocomplete="off" id="_nombre_otro" name="_nombre_otro" value="<?php if ($inf_ficha->otros == 1) {
                                                                                                                                                                echo $inf_ficha->otros_nombre;
                                                                                                                                                            } ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <h5 class="card-header">
                            Datos de captación y evolución del paciente
                        </h5>
                        <hr class="my-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label for="area_captacion" class="form-label">Área de captación</label>
                                    <select name="area_captacion" id="area_captacion" placeholder="" style="width: 100%;" class="select2 form-select" valor="<?php echo $inf_ficha->area_captacion ?>">
                                        <option value="1">Triaje</option>
                                        <option value="2">Observación</option>
                                        <option value="3">Hospitalización</option>
                                        <option value="4">Consultorio</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="diagnostico_captacion" class="form-label">Área de captación</label>
                                    <textarea rows="2" style="resize: none;" type="text" class="form-control" id="diagnostico_captacion" required placeholder=""><?php echo $inf_ficha->diagnostico_captacion ?></textarea>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="evaluacion_paciente" class="form-label">Evaluación del paciente</label>
                                    <select name="evaluacion_paciente" id="evaluacion_paciente" placeholder="" style="width: 100%;" class="select2 form-select" valor="<?php echo $inf_ficha->evaluacion_paciente ?>">
                                        <option value="1">Hospitalizado</option>
                                        <option value="2">Favorable</option>
                                        <option value="3">Defunción</option>
                                    </select>
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
                                    <label for="observacion" class="form-label">Observaciones</label>
                                    <textarea rows="9" style="resize: none;" type="text" class="form-control" id="observacion" placeholder=""><?php echo $inf_ficha->observaciones ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="" id="id_ficha" value="<?php echo $inf_ficha->id ?>">


<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <form action="" id="buscar_mis_laboratorios">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control b_lab" placeholder="Muestra" id="muestra_f" autocomplete="off">
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="">
                            <select name="evaluacion_paciente" id="enfermedad_f" placeholder="" style="width: 100%;" class="select2 form-select b_lab">
                                <option value="" selected>Todo enfermedades</option>
                                <?php foreach ($enfermedades_f as $e) { ?>
                                    <option value="<?php echo $e->id ?>"><?php echo $e->denominacion ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="">
                            <!-- <span class="input-group-addon" id="basic-addon1">Responsable Laboratorio</span> -->
                            <!-- <input type="number" class="form-control"  id="prueba_f" placeholder="Prueba" autocomplete="off"> -->
                            <select name="evaluacion_paciente" id="prueba_f" placeholder="" style="width: 100%;" class="select2 form-select b_lab">
                                <option value="" selected>Todo pruebas</option>
                                <?php foreach ($pruebas_f   as $e) { ?>
                                    <option value="<?php echo $e->denominacion ?>"><?php echo $e->denominacion ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mb-10">
                        <div class="">
                            <!-- <span class="input-group-addon" id="basic-addon1">Responsable Epidemiología</span> -->
                            <!-- <input type="text" class="form-control"  id="resultado_f" placeholder="Resultado" autocomplete="off"> -->
                            <select name="evaluacion_paciente" id="resultado_f" placeholder="" style="width: 100%;" class="select2 form-select b_lab">
                                <option value="" selected>Todo resultados</option>
                                <?php foreach ($resultados_f   as $e) { ?>
                                    <option value="<?php echo $e->id ?>"><?php echo $e->resultado ?></option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-2 d-flex mb-2">
                        <button type="submit" class="btn btn-dark d-flex justify-content-center" id="btn_buscarFichaNegativas" style="width: calc(100% - 46.94px);">
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
                        <table id="tbl_laboratorio" class="table hover responsive table-bordered" style="width:100%">
                            <thead>
                                <tr class="">
                                    <th>Muestra</th>
                                    <th>Enfermedad</th>
                                    <th>Prueba</th>
                                    <th class="text-center">Resultado</th>
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

</div>


<div class="modal fade" id="agregaLab" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="" id="agregar_muestras_laboratorio">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Nueva muestra<br><small class="fw-light fs-6 text-muted">de <?php echo $inf_ficha->nombres . ' ' . $inf_ficha->apepat . ' ' . $inf_ficha->apemat ?></small></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="anouncer_date">
                        <div class="miIco">
                            <svg width="35" height="35" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 7.75C9.41421 7.75 9.75 8.08579 9.75 8.5V13.5C9.75 13.9142 9.41421 14.25 9 14.25C8.58579 14.25 8.25 13.9142 8.25 13.5V8.5C8.25 8.08579 8.58579 7.75 9 7.75Z" fill="currentColor" />
                                <path d="M9 6C9.55228 6 10 5.55228 10 5C10 4.44772 9.55228 4 9 4C8.44772 4 8 4.44772 8 5C8 5.55228 8.44772 6 9 6Z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.25 9C0.25 4.16751 4.16751 0.25 9 0.25C13.8325 0.25 17.75 4.16751 17.75 9C17.75 13.8325 13.8325 17.75 9 17.75C4.16751 17.75 0.25 13.8325 0.25 9ZM9 1.75C4.99594 1.75 1.75 4.99594 1.75 9C1.75 13.0041 4.99594 16.25 9 16.25C13.0041 16.25 16.25 13.0041 16.25 9C16.25 4.99594 13.0041 1.75 9 1.75Z" fill="currentColor" />
                            </svg>

                        </div>
                        <div style="font-weight: 400;"><span style="font-weight: 800;">Recuerda: </span>Las fechas que vas a registrar, deben ser posteriores a la fecha de toma de muestra registrada en la ficha.</div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="nro_muestra" class="form-label">Nro muestra</label>
                            <input type="text" class="form-control" placeholder="" id="nro_muestra" required autocomplete="off">
                        </div>
                        <div class="mb-3 col-md-8">
                            <label for="fecha_resultado" class="form-label">Fecha de resultado</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="" id="fecha_resultado" required fecha_fie="<?php echo $inf_ficha->fecha_fie ?>" fecha_mue="<?php echo $inf_ficha->fecha_mue ?>">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="fecha_recepcion_lrr" class="form-label">Fecha de recepción del LRR</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="" id="fecha_recepcion_lrr" onchange="validaFechalrr(this)">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="fecha_envio_ins" class="form-label">Fecha de envío de la muestra INS? &nbsp;&nbsp;<input type="checkbox" onclick="fechaInsValida(this)" name="ins_si" id="ins_si">&nbsp;Si </label>
                            <input type="text" class="form-control flatpickr-input" placeholder="" id="fecha_envio_ins" onchange="validaFechaEnvioIns(this)" disabled>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="fecha_recepcion_ins" class="form-label">Fecha de recepción de la muestra por INS</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="" id="fecha_recepcion_ins">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="mis_enfermedades" class="form-label">Enfermedad</label>
                            <select name="mis_enfermedades" id="mis_enfermedades" class="select2 form-select" required onchange="obtenerPruebas(this)">
                                <option value="" disabled selected>Selecciona una enfermedad</option>
                                <?php foreach ($enfermedades as $e) { ?>
                                    <option value="<?php echo $e->id ?>"><?php echo $e->denominacion ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-7">
                            <label for="mis_pruebas" class="form-label">Prueba</label>
                            <select name="mis_pruebas" id="mis_pruebas" class="select2 form-select" required onchange="obtenerSerotipos(this)">
                            </select>
                        </div>
                        <div class="mb-3 col-md-5">
                            <label for="mis_serotipos" class="form-label">Serotipo</label>
                            <select name="mis_serotipos" id="mis_serotipos" class="select2 form-select" disabled>
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="mis_resultados" class="form-label">Resultado</label>
                            <select name="mis_resultados" id="mis_resultados" class="select2 form-select" required>
                                <?php foreach ($resultados   as $e) { ?>
                                    <option value="<?php echo $e->id ?>"><?php echo $e->resultado ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary registrar_fichas_lab">
                        <div class="loader d-none">
                            <div class="spinner-border spinner-border-sm text-white" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <div class="contenido">
                            Registrar muestra
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="myModalVer" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="" id="agregar_muestras_laboratorio">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Nueva muestra<br><small class="fw-light fs-6 text-muted">de <?php echo $inf_ficha->nombres . ' ' . $inf_ficha->apepat . ' ' . $inf_ficha->apemat ?></small></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="nro_muestra" class="form-label">Nro muestra</label>
                            <input type="text" class="form-control" placeholder="" id="nro_muestra_ver" required autocomplete="off" disabled>
                        </div>
                        <div class="mb-3 col-md-8">
                            <label for="fecha_resultado" class="form-label">Fecha de resultado</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="" id="fecha_resultado_ver" required fecha_fie="<?php echo $inf_ficha->fecha_fie ?>" fecha_mue="<?php echo $inf_ficha->fecha_mue ?>" disabled>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="fecha_recepcion_lrr" class="form-label">Fecha de recepción del LRR</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="" id="fecha_recepcion_lrr_ver" onchange="validaFechalrr(this)" disabled>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="fecha_envio_ins" class="form-label">Fecha de envío de la muestra INS? &nbsp;&nbsp;<input disabled type="checkbox" name="ins_si_ver" id="ins_si_ver">&nbsp;Si </label>
                            <input type="text" class="form-control flatpickr-input" placeholder="" id="fecha_envio_ins_ver" onchange="validaFechaEnvioIns(this)" disabled>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="fecha_recepcion_ins" class="form-label">Fecha de recepción de la muestra por INS</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="" id="fecha_recepcion_ins_ver" disabled>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="mis_enfermedades_ver" class="form-label">Enfermedad</label>
                            <select name="mis_enfermedades_ver" id="mis_enfermedades_ver" class="select2 form-select" required onchange="obtenerPruebas(this)" disabled>
                                <option value="" disabled selected>Selecciona una enfermedad</option>
                                <?php foreach ($enfermedades as $e) { ?>
                                    <option value="<?php echo $e->id ?>"><?php echo $e->denominacion ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-7">
                            <label for="mis_pruebasV" class="form-label">Prueba</label>
                            <select name="mis_pruebasV" id="mis_pruebasV" class="select2 form-select" required onchange="obtenerSerotipos(this)" disabled>
                            </select>
                        </div>
                        <div class="mb-3 col-md-5">
                            <label for="mis_serotiposV" class="form-label">Serotipo</label>
                            <select name="mis_serotiposV" id="mis_serotiposV" class="select2 form-select" disabled>
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="mis_resultadosV" class="form-label">Resultado</label>
                            <select name="mis_resultadosV" id="mis_resultadosV" class="select2 form-select" required disabled>
                                <?php foreach ($resultados   as $e) { ?>
                                    <option value="<?php echo $e->id ?>"><?php echo $e->resultado ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>



<div class="modal fade" id="myModalEditar" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="" id="editar_muestras_laboratorio">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Editar muestra<br><small class="fw-light fs-6 text-muted">de <?php echo $inf_ficha->nombres . ' ' . $inf_ficha->apepat . ' ' . $inf_ficha->apemat ?></small></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="anouncer_date">
                        <div class="miIco">
                            <svg width="35" height="35" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 7.75C9.41421 7.75 9.75 8.08579 9.75 8.5V13.5C9.75 13.9142 9.41421 14.25 9 14.25C8.58579 14.25 8.25 13.9142 8.25 13.5V8.5C8.25 8.08579 8.58579 7.75 9 7.75Z" fill="currentColor" />
                                <path d="M9 6C9.55228 6 10 5.55228 10 5C10 4.44772 9.55228 4 9 4C8.44772 4 8 4.44772 8 5C8 5.55228 8.44772 6 9 6Z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.25 9C0.25 4.16751 4.16751 0.25 9 0.25C13.8325 0.25 17.75 4.16751 17.75 9C17.75 13.8325 13.8325 17.75 9 17.75C4.16751 17.75 0.25 13.8325 0.25 9ZM9 1.75C4.99594 1.75 1.75 4.99594 1.75 9C1.75 13.0041 4.99594 16.25 9 16.25C13.0041 16.25 16.25 13.0041 16.25 9C16.25 4.99594 13.0041 1.75 9 1.75Z" fill="currentColor" />
                            </svg>

                        </div>
                        <div style="font-weight: 400;"><span style="font-weight: 800;">Recuerda: </span>Las fechas que vas a registrar, deben ser posteriores a la fecha de toma de muestra registrada en la ficha.</div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="nro_muestra_editar" class="form-label">Nro muestra</label>
                            <input type="text" class="form-control" placeholder="" id="nro_muestra_editar" required autocomplete="off">
                        </div>
                        <div class="mb-3 col-md-8">
                            <label for="fecha_resultado_editar" class="form-label">Fecha de resultado</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="" id="fecha_resultado_editar" required>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="fecha_recepcion_lrr_editar" class="form-label">Fecha de recepción del LRR</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="" id="fecha_recepcion_lrr_editar" onchange="validaFechalrrEditar(this)" required>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="fecha_envio_ins_editar" class="form-label">Fecha de envío de la muestra INS? &nbsp;&nbsp;<input type="checkbox" onclick="fechaInsValidaEdita(this)" name="ins_si_editar" id="ins_si_editar">&nbsp;Si </label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="" id="fecha_envio_ins_editar" onchange="validaFechaEnvioInsEditar(this)">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="fecha_recepcion_ins_editar" class="form-label">Fecha de recepción de la muestra por INS</label>
                            <input type="text" class="form-control flatpickr-input active" placeholder="" id="fecha_recepcion_ins_editar" required>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="mis_enfermedades_E" class="form-label">Enfermedad</label>
                            <select name="mis_enfermedades_E" id="mis_enfermedades_E" class="select2 form-select" required onchange="obtenerPruebasE(this)">
                                <option value="" disabled selected>Selecciona una enfermedad</option>
                                <?php foreach ($enfermedades as $e) { ?>
                                    <option value="<?php echo $e->id ?>"><?php echo $e->denominacion ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-7">
                            <label for="mis_pruebasE" class="form-label">Prueba</label>
                            <select name="mis_pruebasE" id="mis_pruebasE" class="select2 form-select" required onchange="obtenerSerotiposE(this)">

                            </select>
                        </div>
                        <div class="mb-3 col-md-5">
                            <label for="mis_serotiposE" class="form-label">Serotipo</label>
                            <select name="mis_serotiposE" id="mis_serotiposE" class="select2 form-select" disabled>

                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="mis_resultadosE" class="form-label">Resultado</label>
                            <select name="mis_resultadosE" id="mis_resultadosE" class="select2 form-select" required>
                                <?php foreach ($resultados   as $e) { ?>
                                    <option value="<?php echo $e->id ?>"><?php echo $e->resultado ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary editar_fichas">
                        <div class="loader d-none">
                            <div class="spinner-border spinner-border-sm text-white" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <div class="contenido">
                            Modificar muestra
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="<?php echo base_url('public/js/Vigilancia/jsFichasVer.js') . '?=' . rand(); ?>"></script>
<script src="<?php echo base_url('public/js/Vigilancia/jsLaboratorio.js') . '?=' . rand(); ?>"></script>