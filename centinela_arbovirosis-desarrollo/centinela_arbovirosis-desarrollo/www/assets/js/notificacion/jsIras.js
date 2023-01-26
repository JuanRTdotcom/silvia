var IRAS = function () {
    
  
    var eventos = function () {

      $('form input,select').on('keyup change', function() {
           
        $(this).parents('.form-group').removeClass('has-error');
        $(this).parents('.form-group').find('.text-danger').html(" ");

    });
  
      $("#btnGuardar").click(function(event) {
        $(this).blur();
        event.preventDefault();
        registrarNoti();
    });
  
      $('#input-dept').on('change', function () {
        $("#input-prov").html("<option value='' disabled>selecciona...</option>");
        $("#input-dist").html("<option value='' disabled>selecciona...</option>");
        obtenerProvs('input-dept', 'input-prov', 'input-dist');
      });
  
      $('#input-prov').on('change', function () {
        $("#input-dist").html("<option value='' disabled>selecciona...</option>");
        obtenerDists('input-prov', 'input-dist');
      });
  
  
      $('#input-dept2').on('change', function () {
        $("#input-prov2").html("<option value='' disabled>selecciona...</option>");
        $("#input-dist2").html("<option value='' disabled>selecciona...</option>");
        obtenerProvs('input-dept2', 'input-prov2', 'input-dist2');
      });
  
      $('#input-prov2').on('change', function () {
        $("#input-dist2").html("<option value='' disabled>selecciona...</option>");
        obtenerDists('input-prov2', 'input-dist2');
      });
  
      $('#input-etnia').on('change', function () {
        $("#input-grupo_etnia").html("<option value='' disabled>selecciona...</option>");
        $("#input-otra_etnia").val("");
        if($(this).val() == '6'){
           $(".otra_etnia").removeClass("ocultar");
           $(".grupo_etnia").addClass("ocultar");

           $('#input-grupo_etnia').val("");
           $('#input-grupo_etnia').parents('.form-group').removeClass("has-error");
           $('#input-grupo_etnia').parents('.form-group').find("span").html("");

        }else{
          $(".otra_etnia").addClass("ocultar");
          $(".grupo_etnia").removeClass("ocultar");

          $('#input-otra_etnia').val("");
          $('#input-otra_etnia').parents('.form-group').removeClass("has-error");
          $('#input-otra_etnia').parents('.form-group').find("span").html("");

          obtenerGrupoEtnico('input-etnia');
        }
        
      });

      $(".mayuscula").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      
        return false;
      }
      });
  
      $('.valida').on('change', function () {
        checkExiste();
      });

      $('.valida_blur').on('change', function () {
        checkExiste();
      });
  
      $('#input-diresa').on('change', function () {
        $("#input-red").html("<option value='' disabled>selecciona...</option>");
        $("#input-microred").html("<option value='' disabled>selecciona...</option>");
        $("#input-establecimiento").html("<option value='' disabled>selecciona...</option>");
        obtenerRed();
      });
  
      $('#input-red').on('change', function () {
  
        $("#input-microred").html("<option value='' disabled>selecciona...</option>");
        $("#input-establecimiento").html("<option value='' disabled>selecciona...</option>");
        obtenerMicroRed();
      });
  
      $('#input-microred').on('change', function () {
        $("#input-establecimiento").html("<option value='' disabled>selecciona...</option>");
        obtenerHospitales();
      });
  
     /* $('#input-pais').on('change', function () {
        $("#input-dept").val("");
        $("#input-prov").html("").val("");
        $("#input-dist").html("").val("");
  
        $("#input-dept").parent(".form-group").removeClass("has-error");
        $("#input-dept").parent(".form-group").find(".text-danger").html("");
        $("#input-prov").parent(".form-group").removeClass("has-error");
        $("#input-prov").parent(".form-group").find(".text-danger").html("");
        $("#input-dist").parent(".form-group").removeClass("has-error");
        $("#input-dist").parent(".form-group").find(".text-danger").html("");
        if ($(this).val() == "171") {
          $(".nac").show();
        } else {
          $(".nac").hide();
        }
      });*/
  
  
  
    };
  
  
    var CargaInicial = function () {
      
     
       
        if($("#idvigi").val() != ''){
          getFicha();
          return false;
        }
     
        obtenerDepts();
        obtenerEtnias();
        obtenerProcedencia();
        obtenerEstablecimientos();
    };
  
  
    var obtenerEstablecimientos = function () {
  
      $.ajax({
        type: "GET",
        url: "obtenerEstablecimientos",
        processData: false,
        cache: false,
        async: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
          if (data.status) {
            if (data.nivel == 7) {
  
              $("#input-establecimiento").html("<option value=''>selecciona...</option>");
            } else if (data.nivel == 6) {
  
              $("#input-microred").html("<option value=''>selecciona...</option>");
              $("#input-establecimiento").html("<option value=''>selecciona...</option>");
            } else if (data.nivel == 5) {
  
              $("#input-red").html("<option value=''>selecciona...</option>");
              $("#input-microred").html("<option value=''>selecciona...</option>");
              $("#input-establecimiento").html("<option value=''>selecciona...</option>");
            } else if (data.nivel == 4 || data.nivel == 1) {
              $("#input-diresa").html("<option value=''>selecciona...</option>");
              $("#input-red").html("<option value=''>selecciona...</option>");
              $("#input-microred").html("<option value=''>selecciona...</option>");
              $("#input-establecimiento").html("<option value=''>selecciona...</option>");
            }
  
  
            if (!isEmpty(data.diresa)) {
              for (var i = 0; i < data.diresa.length; i++) {
                $("#input-diresa").append("<option value='" + data.diresa[i].codigo + "'>" + data.diresa[i].nombre.toUpperCase() + "</option>")
              }
            }
            if (!isEmpty(data.red)) {
              for (var i = 0; i < data.red.length; i++) {
                $("#input-red").append("<option subregion='" + data.red[i].subregion + "' value='" + data.red[i].codigo + "'>" + data.red[i].nombre.toUpperCase() + "</option>")
              }
            }
            if (!isEmpty(data.microred)) {
              for (var i = 0; i < data.microred.length; i++) {
                $("#input-microred").append("<option red='" + data.microred[i].red + "' subregion='" + data.microred[i].subregion + "' value='" + data.microred[i].codigo + "'>" + data.microred[i].nombre.toUpperCase() + "</option>")
              }
            }
            if (!isEmpty(data.establecimiento)) {
              for (var i = 0; i < data.establecimiento.length; i++) {
                $("#input-establecimiento").append("<option value='" + data.establecimiento[i].cod_est + "'>" + data.establecimiento[i].raz_soc.toUpperCase() + "</option>")
              }
            }
            //   $("#input-dept").val("");
  
          } else {
            if (data.tipo === 'error_bd') {
              alerta("Error!", data.mensaje, "error");
            }
          }
  
        },
        error: function (request, status, error) {
          alerta("Error!", error, "error");
        }
      });
  
    }
  
   
  
  
  
    var obtenerPaises = function () {
  
      $.ajax({
        type: "GET",
        url: "getPaises",
        processData: false,
        cache: false,
        async: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
          if (data.status) {
            if (!isEmpty(data.paises)) {
              for (var i = 0; i < data.paises.length; i++) {
                $("#input-pais").append("<option value='" + data.paises[i].codigo + "'>" + data.paises[i].nombre.toUpperCase() + "</option>")
                $("#input-pais_res").append("<option value='" + data.paises[i].codigo + "'>" + data.paises[i].nombre.toUpperCase() + "</option>")
              }
            }
            $("#input-pais").val("171");
            $("#input-pais_res").val("171");
          } else {
            if (data.tipo === 'error_bd') {
              alerta("Error!", data.mensaje, "error");
            }
          }
  
        },
        error: function (request, status, error) {
          alerta("Error!", error, "error");
        }
      });
  
    }
  
  
    var obtenerDepts = function () {
  
      $.ajax({
        type: "GET",
        url: "obtenerDepartamentos",
        processData: false,
        cache: false,
        async: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
          if (data.status) {
            $("#input-dept").html("<option value='' disabled>selecciona...</option>");
           
            if (!isEmpty(data.departamentos)) {
              for (var i = 0; i < data.departamentos.length; i++) {
                $("#input-dept").append("<option value='" + data.departamentos[i].iCodDept + "'>" + data.departamentos[i].vNombre.toUpperCase() + "</option>")
               
              }
            }
            $("#input-dept").val("");
            
          } else {
            if (data.tipo === 'error_bd') {
              alerta("Error!", data.mensaje, "error");
            }
          }
  
        },
        error: function (request, status, error) {
          alerta("Error!", error, "error");
        }
      });
  
    }
  
  
    var obtenerProvs = function (inputdept, inputprov, inputdist) {
      var fd = new FormData();
      fd.append('dept', $("#" + inputdept).val());
      $.ajax({
        type: "POST",
        url: "obtenerProvincias",
        processData: false,
        cache: false,
        contentType: false,
        dataType: "json",
        data: fd,
        success: function (data) {
          if (data.status) {
            if (!isEmpty(data.provincias)) {
              for (var i = 0; i < data.provincias.length; i++) {
                $("#" + inputprov).append("<option value='" + data.provincias[i].iCodProv + "'>" + data.provincias[i].vNombre.toUpperCase() + "</option>")
              }
            }
            $("#" + inputprov).val("");
            $("#" + inputdist).val("");
          } else {
            if (data.tipo === 'error_bd') {
              alerta("Error!", data.mensaje, "error");
            } else if (data.tipo === 'error_select') {
              alerta("Atención!", "Por favor, selecciona un departamento.", "warning");
            }
          }
        },
        error: function (request, status, error) {
          alerta("Error!", error, "error");
        }
      });
    }
  
    var obtenerDists = function (inputprov, inputdist) {
      var fd = new FormData();
      fd.append('prov', $("#" + inputprov).val());
      $.ajax({
        type: "POST",
        url: "obtenerDistritos",
        processData: false,
        cache: false,
        contentType: false,
        dataType: "json",
        data: fd,
        success: function (data) {
          if (data.status) {
            if (!isEmpty(data.distritos)) {
              for (var i = 0; i < data.distritos.length; i++) {
                $("#" + inputdist).append("<option value='" + data.distritos[i].iCodDist + "'>" + data.distritos[i].vNombre.toUpperCase() + "</option>")
              }
            }
            $("#" + inputdist).val("");
          } else {
            if (data.tipo === 'error_bd') {
              alerta("Error!", data.mensaje, "error");
            } else if (data.tipo === 'error_select') {
              alerta("Atención!", "Por favor, selecciona una provincia.", "warning");
            }
          }
        },
        error: function (request, status, error) {
          alerta("Error!", error, "error");
        }
      });
    }
  
  
    var obtenerRed = function () {
      var fd = new FormData();
      fd.append('diresa', $("#input-diresa").val());
      $.ajax({
        type: "POST",
        url: "obtenerRedes",
        processData: false,
        cache: false,
        contentType: false,
        dataType: "json",
        data: fd,
        success: function (data) {
          if (data.status) {
            if (!isEmpty(data.redes)) {
              for (var i = 0; i < data.redes.length; i++) {
                $("#input-red").append("<option subregion='" + data.redes[i].subregion + "' value='" + data.redes[i].codigo + "'>" + data.redes[i].nombre.toUpperCase() + "</option>")
              }
            }
            $("#input-red").val("");
            $("#input-microred").val("");
            $("#input-establecimiento").val("");
          } else {
            if (data.tipo === 'error_bd') {
              alerta("Error!", data.mensaje, "error");
            } else if (data.tipo === 'error_select') {
              alerta("Atención!", "Por favor, selecciona una diresa.", "warning");
            }
          }
        },
        error: function (request, status, error) {
          alerta("Error!", error, "error");
        }
      });
    }
  
    var obtenerMicroRed = function () {
      var fd = new FormData();
      fd.append('red', $("#input-red").val());
      fd.append('subregion', $("#input-red option:selected").attr("subregion"));
      $.ajax({
        type: "POST",
        url: "obtenerMicroRedes",
        processData: false,
        cache: false,
        contentType: false,
        dataType: "json",
        data: fd,
        success: function (data) {
          if (data.status) {
            if (!isEmpty(data.microredes)) {
              for (var i = 0; i < data.microredes.length; i++) {
                $("#input-microred").append("<option  red='" + data.microredes[i].red + "' subregion='" + data.microredes[i].subregion + "'  value='" + data.microredes[i].codigo + "'>" + data.microredes[i].nombre.toUpperCase() + "</option>")
              }
            }
  
            $("#input-microred").val("");
            $("#input-establecimiento").val("");
          } else {
            if (data.tipo === 'error_bd') {
              alerta("Error!", data.mensaje, "error");
            } else if (data.tipo === 'error_select') {
              alerta("Atención!", "Por favor, selecciona una red.", "warning");
            }
          }
        },
        error: function (request, status, error) {
          alerta("Error!", error, "error");
        }
      });
    }
  
  
    var obtenerHospitales = function () {
      var fd = new FormData();
      fd.append('microred', $("#input-microred").val());
      fd.append('red', $("#input-microred option:selected").attr("red"));
      fd.append('subregion', $("#input-microred option:selected").attr("subregion"));
      $.ajax({
        type: "POST",
        url: "obtenerEstablecimientoByMicrored",
        processData: false,
        cache: false,
        contentType: false,
        dataType: "json",
        data: fd,
        success: function (data) {
          if (data.status) {
            if (!isEmpty(data.hospitales)) {
              for (var i = 0; i < data.hospitales.length; i++) {
                $("#input-establecimiento").append("<option value='" + data.hospitales[i].cod_est + "'>" + data.hospitales[i].raz_soc.toUpperCase() + "</option>")
              }
            }
  
  
            $("#input-establecimiento").val("");
          } else {
            if (data.tipo === 'error_bd') {
              alerta("Error!", data.mensaje, "error");
            } else if (data.tipo === 'error_select') {
              alerta("Atención!", "Por favor, selecciona una microred.", "warning");
            }
          }
        },
        error: function (request, status, error) {
          alerta("Error!", error, "error");
        }
      });
    }
  
  
  
    var obtenerEtnias = function () {
  
      $.ajax({
        type: "GET",
        url: "obtenerEtnia",
        processData: false,
        cache: false,
        async: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
          if (data.status) {
            $("#input-etnia").html("<option value='' disabled>selecciona...</option>");
           
            if (!isEmpty(data.etnias)) {
              for (var i = 0; i < data.etnias.length; i++) {
                $("#input-etnia").append("<option value='" + data.etnias[i].registroId + "'>" + data.etnias[i].nombre.toUpperCase() + "</option>")
               
              }
            }
            $("#input-etnia").val("");
            
          } else {
            if (data.tipo === 'error_bd') {
              alerta("Error!", data.mensaje, "error");
            }
          }
  
        },
        error: function (request, status, error) {
          alerta("Error!", error, "error");
        }
      });
  
    }



    var obtenerGrupoEtnico = function (inputetnia) {
      var fd = new FormData();
      fd.append('etnia', $("#" + inputetnia).val());
      $.ajax({
        type: "POST",
        url: "../edas/obtenerGrupoEtnia",
        processData: false,
        cache: false,
        contentType: false,
        dataType: "json",
        data: fd,
        success: function (data) {
          if (data.status) {
            $("#input-grupo_etnia").html("<option value='' disabled>selecciona...</option>");
            if (!isEmpty(data.grupos)) {
              for (var i = 0; i < data.grupos.length; i++) {
                $("#input-grupo_etnia").append("<option value='" + data.grupos[i].registroId + "'>" + data.grupos[i].nombre.toUpperCase() + "</option>")
              }
            }
            $("#input-grupo_etnia").val("");
           
          } else {
            if (data.tipo === 'error_bd') {
              alerta("Error!", data.mensaje, "error");
            } else if (data.tipo === 'error_select') {
              alerta("Atención!", "Por favor, selecciona un departamento.", "warning");
            }
          }
        },
        error: function (request, status, error) {
          alerta("Error!", error, "error");
        }
      });
    }



    var obtenerProcedencia = function () {
  
      $.ajax({
        type: "GET",
        url: "obtenerProcedencia",
        processData: false,
        cache: false,
        async: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
          if (data.status) {
            $("#input-proc").html("<option value='' disabled>selecciona...</option>");
           
            if (!isEmpty(data.procedencia)) {
              for (var i = 0; i < data.procedencia.length; i++) {
                $("#input-proc").append("<option value='" + data.procedencia[i].id + "'>" + data.procedencia[i].nombre.toUpperCase() + "</option>")
               
              }
            }
            $("#input-proc").val("");
            
          } else {
            if (data.tipo === 'error_bd') {
              alerta("Error!", data.mensaje, "error");
            }
          }
  
        },
        error: function (request, status, error) {
          alerta("Error!", error, "error");
        }
      });
  
    }

    var checkExiste = function () {
      var fd = new FormData($("#form1")[0]);
     
      $.ajax({
        type: "POST",
        url: "checkIfExiste",
        processData: false,
        cache: false,
        contentType: false,
        dataType: "json",
        data: fd,
        success: function (data) {
          if (data.status) {
            if (!isEmpty(data.ficha)) {
              Swal.fire({
                title: 'La Ficha ya se encuentra registrada. Deseea actualizarla?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, actualizar',
                cancelButtonText: 'No',
                allowOutsideClick: false
              }).then((result) => {
                if (result.value) {
                  window.location.href = 'edita/' + data.ficha[0].registroId;
                }else{
                  window.location.href = 'listar';
                }
              });
            }
          } else {
            alerta("Error!", "Ha ocurrido un error!", "error");
          }
        },
        error: function (request, status, error) {
          alerta("Error!", error, "error");
        }
      });
    }


    var registrarNoti = function() {
     
      var fd = new FormData($("#form1")[0]);
      $.ajax({
          type: "POST",
          url: "registrarConsolidado",
          data: fd,
          processData: false,
          cache: false,
          contentType: false,
          dataType: "json",
          async: false,
          success: function(data) {
              if (data.status) {
                  alertaRedirect("Éxito!", data.mensaje, "success", "iras/listar");


              } else {
                  if (data.tipo === 'error_validation') {
                      $.each(data.errors, function(key, value) {
                          if (value !== '') {
                              $($('#input-' + key).parents('.form-group')[0]).addClass('has-error');
                              $($('#input-' + key).parents('.form-group')[0]).find('.help-block').html(value);

                          }
                      });
                      alerta("Atención!", "Por favor , revisar que los campos esten correctos!", "warning");
                  } else if (data.tipo === 'error_bd') {
                      alerta("Error!", data.mensaje, "error");
                  }
              }

          },
          error: function(request, status, error) {
              alerta("Error!", error, "error");
          }
      });
  }

  function fillCab(data) {
    if (!isEmpty(data)) {
        $("#input-etnia").val(data.etnias);
          if( data.etnias == '6'){
            $(".otra_etnia").removeClass("ocultar");
            $(".grupo_etnia").addClass("ocultar"); 
          }

          
          $("#input-diresa").val(data.sub_reg_nt);
          $("#input-red").val(data.red);
          $("#input-microred").val(data.microred);
          $("#input-establecimiento").val(data.e_salud);



          $("#input-proc").val(data.procede);
        $("#input-otra_etnia").val(data.otroproc);
      
        $("#input-anio").val(data.ano);
        $("#input-semana").val(data.semana);

        $("#input-dist").val(data.ubigeo);
        $("#input-prov").val(data.ubigeo.substr(0,4));

        $("#input-grupo_etnia").val(data.etniaproc);

        $("#input-dept").val((data.ubigeo).substr(0,2));

        $("#input-ira_m2").val(data.ira_m2);
        $("#input-ngr_m2").val(data.ngr_m2);
        $("#input-dih_m2").val(data.dih_m2);
        $("#input-deh_m2").val(data.deh_m2);

        $("#input-ira_2_11").val(data.ira_2_11);
        $("#input-neu_2_11").val(data.neu_2_11);
        $("#input-ngr_2_11").val(data.ngr_2_11);
        $("#input-dih_2_11").val(data.dih_2_11);
        $("#input-deh_2_11").val(data.deh_2_11);

        $("#input-ira_1_4a").val(data.ira_1_4a);
        $("#input-neu_1_4a").val(data.neu_1_4a);
        $("#input-ngr_1_4a").val(data.ngr_1_4a);
        $("#input-dih_1_4a").val(data.dih_1_4a);
        $("#input-deh_1_4a").val(data.deh_1_4a);

        $("#input-ira_60a").val(data.ira_60a);
        $("#input-sob_2a").val(data.sob_2a);
        $("#input-sob_2_4a").val(data.sob_2_4a);

        $("#input-neu_5_11a").val(data.neu_5_11a);
        $("#input-hos_5_11a").val(data.hos_5_11a);
        $("#input-dih_5_11a").val(data.dih_5_11a);
        $("#input-deh_5_11a").val(data.deh_5_11a);

        $("#input-neu_12_17a").val(data.neu_12_17a);
        $("#input-hos_12_17a").val(data.hos_12_17a);
        $("#input-dih_12_17a").val(data.dih_12_17a);
        $("#input-deh_12_17a").val(data.deh_12_17a);

        $("#input-neu_18_29a").val(data.neu_18_29a);
        $("#input-hos_18_29a").val(data.hos_18_29a);
        $("#input-dih_18_29a").val(data.dih_18_29a);
        $("#input-deh_18_29a").val(data.deh_18_29a);

        $("#input-neu_30_59a").val(data.neu_30_59a);
        $("#input-hos_30_59a").val(data.hos_30_59a);
        $("#input-dih_30_59a").val(data.dih_30_59a);
        $("#input-deh_30_59a").val(data.deh_30_59a);
    

        $("#input-neu_60a").val(data.neu_60a);
        $("#input-hos_60a").val(data.hos_60a);
        $("#input-dih_60a").val(data.dih_60a);
        $("#input-deh_60a").val(data.deh_60a);
    
       
    }
}

function fillCombo(data, idCombo,nameId,nameDesc = "vNombre") {
  if (!isEmpty(data)) {
      for (var i = 0; i < data.length; i++) {
          $("#" + idCombo).append("<option  value='" + data[i][nameId] + "'>" + data[i][nameDesc].toUpperCase() + "</option>");
      }
  }
}
  

var getFicha = function() {
  var id = $("#idvigi").val();
  if (id !== "") {
      var fd = new FormData();
      fd.append('id', id);
      $.ajax({
          type: "POST",
          url: "getFicha",
          processData: false,
          cache: false,
          contentType: false,
          dataType: "json",
          async: true,
          beforeSend: function() {
            $(".loader_bg").show();
            $("body").addClass("loader-open");
          },
          complete: function() {
            $(".loader_bg").hide();
            $("body").removeClass("loader-open");
          },
          data: fd,
          success: function(data) {
              if (data.status) {
                  if (!isEmpty(data.datos)) {

                   
                    fillCombo(data.datos.diresas, "input-diresa","codigo","nombre");
                    fillCombo(data.datos.red, "input-red","codigo","nombre");
                    fillCombo(data.datos.microred, "input-microred","codigo","nombre");
                    fillCombo(data.datos.establecimiento, "input-establecimiento","cod_est","raz_soc");

                    fillCombo(data.datos.departamentos.data, "input-dept","iCodDept","vNombre");
                     fillCombo(data.datos.provincias.data, "input-prov","iCodProv");
                     fillCombo(data.datos.distritos.data, "input-dist","iCodDist");
                     fillCombo(data.datos.etnias.data, "input-etnia","registroId","nombre");
                     fillCombo(data.datos.grupo_etnias.data, "input-grupo_etnia","registroId","nombre");
                     fillCombo(data.datos.procedencia.data, "input-proc","id","nombre");

                     /*  fillCombo(data.datos.distritos, "input-dist");*/
                     


                      fillCab(data.datos.ficha[0]);


                  }
              } else {
                  alertaRedirect("Error!", data.mensaje, data.tipo, "vigilancia/listar");
              }
          },
          error: function(request, status, error) {
              alerta("Error!", error, "error");
          }
      });
  }
}
  
  
    return {
      init: function () {
       
        eventos();
        CargaInicial();
  
  
      }
    };
  }();
  
  