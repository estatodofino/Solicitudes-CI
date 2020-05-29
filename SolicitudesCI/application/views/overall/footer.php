        <footer class="main-footer">
          <div class="container footer" style="text-align: center;" >
                <p>Ubicación: Bloque C, planta Alta, Oficina C-91.<br>
                Correo  electrónico: <a> Endersona24@gmail.com</a><br>
                          LUZ Derechos reservados ® </p>
          </div>
        </footer> 
    </div>
    <!-- ./wrapper -->
 
<!-- jQuery 3 -->

 <script src="<?php echo base_url();?>assets/vendors/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Highcharts -->
<script src="<?php echo base_url();?>assets/template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-print/jquery.print.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables Export -->
<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>

<script type="text/javascript">
var base_url= "<?php echo base_url();?>";
var period = $("#nom_per").val();
var ed_per = $("#id_per").val();

    function add_materia(){
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#materia_modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function add_modificacion(){
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modificacion_modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function add_periodo()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#periodo_modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
    function edit_periodo()
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('administrar/backend/ajax_edit/')?>/" + ed_per,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            //$('[name="id"]'(form)).val(data.id)(DB);
            $('[name="id"]').val(data.cod_periodo);
            $('[name="codigo"]').val(data.cod_periodo);
            $('[name="nombre"]').val(data.nom_periodo);
            $('[name="inicio"]').val(data.inicio_periodo);
            $('[name="final"]').val(data.fin_periodo);


            $('#periodo_modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar periodo'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          swal({
                  type: 'error',
                  title: 'Error no se obtuvo respuesta de ajax.',
                  showConfirmButton: false,
                  timer: 1500
                })
        }
    });
    }

    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('administrar/backend/add_periodo')?>";
      }
      else
      {
        url = "<?php echo site_url('administrar/backend/periodo_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(), 
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
              $('#periodo_modal_form').modal('hide');
              swal({
                  type: 'success',
                  title: 'Se guardo satisfactoriamente.',
                  showConfirmButton: false,
                  timer: 1500
                })
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              swal({
                  type: 'error',
                  title: 'Error guardando / modificando.',
                  showConfirmButton: false,
                  timer: 1500
                })
            }
        });
    }
     function delete_periodo()
    {
      
          swal({
          title: 'Estas seguro?',
          text: "El periodo " +period+" se cerrara",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'si, deseo cerrar el periodo!',
          cancelButtonText:'Cancelar'
        }).then(function() {
           $.ajax({
            url: base_url+"administrar/Backend/delete_periodo/"+ ed_per,
            type:"POST",
            dataType:"html",
            // data:{id:idorden,estado:estado,url:url,table:table},
            success:function(resp){
                //http://localhost/ventas_ci/mantenimiento/productos
                swal(
                'Cerrado!',
                'el periodo fue cerrado.',
                'success'
                )
                window.location.href = base_url + resp;
            }
        });
        }, function(dismiss) {
          if (dismiss === 'cancel') {
             swal(
              'Cancelada!',
              'Periodo seguro.',
              'error'
          )
        }
     })
    }

    function save_m()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('administrar/Materias/add_materia')?>";
      }
      else
      {
        url = "<?php echo site_url('administrar/Materias/materia_update')?>";
      }
      var nombre = $("#nombre").val();
      var semestre = $("#semestre").val();
      var horas = $("#horas").val();
      var tipo = $("#tipo").val();
      var codigo = $("#codigo").val();
       // ajax adding data to database
        if (nombre =="" || codigo =="" || horas =="") {
          swal({
                  type: 'warning',
                  title: 'Debe llenar todos los campos.',
                  showConfirmButton: false,
                  timer: 1500
                })
        } else{
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(), 
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
              $('#materia_modal_form').modal('hide');
              swal({
                  type: 'success',
                  title: 'Se guardo satisfactoriamente.',
                  showConfirmButton: false,
                  timer: 1500
                })
              location.reload();// for reload a page
            },
            error: function (data,jqXHR, textStatus, errorThrown)
            {
              swal({
                  type: 'error',
                  title: 'Error guardando / modificando.',
                  showConfirmButton: false,
                  timer: 1500
                })
            }
        });
        } 
    }
    function edit_materia(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('administrar/materias/ajax_edit/')?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            //$('[name="id"]'(form)).val(data.id)(DB);
            $('[name="id"]').val(data.cod_materia);
            $('[name="codigo"]').val(data.cod_materia);
            $('[name="nombre"]').val(data.nombre_materia);
            $('[name="tipo"]').val(data.tipo);
            $('[name="semestre"]').val(data.semestre);
            $('[name="horas"]').val(data.horas_semanales);
            $('#materia_modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar materia'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          swal({
                  type: 'error',
                  title: 'Error no se obtuvo respuesta de ajax',
                  showConfirmButton: false,
                  timer: 1500
                })
           
        }
    });
    }
    function save_i()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('administrar/backend/nueva')?>";
      }
      else
      {
        url = "<?php echo site_url('administrar/backend/modificacion_update')?>";
      }
      var final = $("#fin").val();
      var inicio = $("#ini").val();
      var codex = $("#codego").val();
      var periodo = $("#nomper").val();
       // ajax adding data to database
        if (final =="" || inicio =="" ) {
          swal({
                  type: 'warning',
                  title: 'Debe llenar todos los campos.',
                  showConfirmButton: false,
                  timer: 1500
                })
        } else{
          $.ajax({
            url : url,
            type: "POST",
            data: {id:codex,inicio:inicio,fin:final,periodo:periodo}, 
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
              $('#modificacion_modal_form').modal('hide');
              swal({
                  type: 'success',
                  title: 'Se guardo satisfactoriamente.',
                  showConfirmButton: false,
                  timer: 1500
                })
              location.reload();// for reload a page
            },
            error: function (data,jqXHR, textStatus, errorThrown)
            {
              swal({
                  type: 'error',
                  title: 'Error guardando / modificando.',
                  showConfirmButton: false,
                  timer: 1500
                })
            }
        });
        } 
    }
//////////////Documento JQUERY/////////////////////////

$(document).ready(function () {
    var save_method; //for save method string
    var tabli;
    var base_url= "<?php echo base_url();?>";

        control = $("#secuencia").val();
         $("#numero").val(generarnumero(control));
         $("#numDoc").val(generarnumero(control));
         buscador=generarnumero(control);

         $("#tipo").on("change",function(){
            option = $('#idsolicitud').val();

            if (option != "") {
                $("#numero").val(generarnumero(option));
            }
            else{
                $("#idsolicitud").val(null);
                $("#numero").val(null);
            }
        })  

         codego = $("#idperiodo").val();
         codegis = $("#nomper").val();
         $("#codegux").val(generarcodigo(codego));
         $("#codego").val(generarcodigo(codegis));

    function edit_periodo(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('rutas/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            //$('[name="id"]'(form)).val(data.id)(DB);
            $('[name="id"]').val(data.id);
            $('[name="nombre"]').val(data.nombre);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar ruta'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error no se obtuvo respuesta de ajax');
        }
    });
    }

    //cerrar y abrir materias
    $(".btn-close-mt").on("click",function() {
      var id = $(this).attr("id");
      var nombre = $(this).attr("value");
      swal({
          title: 'Cierre de materias',
          text: "se realizara el cierre de la materia "+nombre+ "¿Desea continuar?" ,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'si, deseo cerrar la materia!',
          cancelButtonText:'Cancelar'
        }).then(function() {
           $.ajax({
            url: base_url+"administrar/materias/change_state",
            type:"POST",
            dataType:"html",
            data:{id:id,estado:0},
            success:function(resp){
                //http://localhost/ventas_ci/mantenimiento/productos
                swal(
              'Cerrada!',
              'La materia '+nombre+' ha sido cerrada.',
              'success'
              )
                window.location.reload();
            }
        });
        }, function(dismiss) {
          if (dismiss === 'cancel') {
             swal(
              'Cancelada!',
              'La materia permanece Abierta.',
              'error'
          )
        }
     })
    })
    $(".btn-open-mt").on("click",function() {
      var id = $(this).attr("id");
      var nombre = $(this).attr("value");
      swal({
          title: 'Apertura de materias',
          text: "se realizara la apertura de la materia "+nombre+ "¿Desea continuar?" ,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'si, deseo abrir la materia!',
          cancelButtonText:'Cancelar'
        }).then(function() {
           $.ajax({
            url: base_url+"administrar/materias/change_state",
            type:"POST",
            dataType:"html",
            data:{id:id,estado:1},
            success:function(resp){
                //http://localhost/ventas_ci/mantenimiento/productos
                swal(
              'Apertura exitosa!',
              'La materia '+nombre+' ha sido aperturada.',
              'success'
              )
                window.location.reload();
            }
        });
        }, function(dismiss) {
          if (dismiss === 'cancel') {
             swal(
              'Cancelada!',
              'La materia permanece cerrada.',
              'error'
          )
        }
     })
    })
    //cerras y abrir materias
         //aceptar usuarios
        $(".btn-aceptar").on("click",function(){
            var id_us = $("#id_newser").val();
            var estado = "1";
                alert(id_us);
                $.ajax({
                    url: base_url+"administrar/backend/usuarios_aceptar",
                    type:"POST",
                    dataType:"html",
                    data:{id:id_us,estado:estado},
                    success:function(resp){
                        //http://localhost/ventas_ci/mantenimiento/productos
                        swal({
                          position: 'top-end',
                          type: 'success',
                          title: 'El usuario ya esta activo',
                          showConfirmButton: false,
                          timer: 1500
                        })
                        window.location.href = base_url + resp;
                    }
                });
        }) 
         //eliminar solicitudes
          $(".btn-homero").on("click", function(){
                var idorden = $("#inOrdes").val();
                var estado = "0";
                var url =  $("#url_l").val();
                var table = $("#table").val();

                // alert(url);
                // alert(table);

                swal({
                  title: 'Estas seguro?',
                  text: "eliminaras la solicitud numero "+idorden,
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'si, deseo eliminarla!',
                  cancelButtonText:'Cancelar'
                }).then(function() {
                   $.ajax({
                    url: base_url+"administrar/backend/delete_orden",
                    type:"POST",
                    dataType:"html",
                    data:{id:idorden,estado:estado,url:url,table:table},
                    success:function(resp){
                        //http://localhost/ventas_ci/mantenimiento/productos
                        swal(
                      'Eliminado!',
                      'La solicitud ha sido eliminada.',
                      'success'
                      )
                        window.location.href = base_url + resp;
                    }
                });
                }, function(dismiss) {
                  if (dismiss === 'cancel') {
                     swal(
                      'Cancelada!',
                      'La solicitud esta segura.',
                      'error'
                  )
                }
             })
           });
         //eliminar solicitudes

         //rechazar las solicitudes
         $(".btn-rechazar").on("click",function () {
                swal({
                title: 'Motivo de rechazo',
                input: 'text',
                inputAttributes: {
                  autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Enviar',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                  return fetch(`//api.github.com/users/${login}`)
                    .then(response => {
                      if (!response.ok) {
                        throw new Error(response.statusText)
                      }
                      return response.json()
                    })
                    .catch(error => {
                      swal.showValidationMessage(
                        `Request failed: ${error}`
                      )
                    })
                },
                allowOutsideClick: () => !swal.isLoading()
                }).then((result) => {
                if (result.value) {
                  swal({
                    title: `${result.value.login}'s avatar`,
                    imageUrl: result.value.avatar_url
                  })
                }
                })
         })
         //rechazar solicitudes

       $(".btn-cancel").on("click",function() {
              numero = buscador; 
              var href = $(this).attr("value");
             
             $(this).attr('href', 'javascript:void(0)');
          $(this).click(function() {
           if (confirm("¿Desea cancelar la solicitud?")) {
                 $.ajax({
                url: base_url + "egresado/solicitudes/delete_documentos"+numero,
                type:"POST",
                dataType:"html",
                success:function(resp){
                    alert("Solicitud cancelada");
                    //http://localhost/ventas_ci/mantenimiento/productos
                    window.location.href = base_url + href;
                  }
              });
            }
         });
         });

         $(".btn-remove_doc").on("click", function(e){
                e.preventDefault();
                var ruta = $(this).attr("href");
                var ref = $(this).attr("value");
                // var ruta = base_url+"egresado/solicitudes/delete_archivo/"+buscador ;
                
                $(this).attr('href', 'javascript:void(0)');
                   $(this).click(function() {
                      if (confirm("¿Seguro desea eliminar el archivo?")) {
                        $.ajax({
                           url: ruta,
                            type:"POST",
                            success:function(resp){
                            alert("se elimino satisfactoriamente");
                            window.location.href = ref;
                            }
                          });
                         }
                       });
                    });


         $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
               {
                   extend: 'excelHtml5',
                   title: "Listado de Documentos Solicitados",
                   exportOptions: {
                       columns: [ 0, 1,2, 3, 4]
                   },
               },
               {
                   extend: 'pdfHtml5',
                   title: "Listado de Documentos Solicitados",
                   exportOptions: {
                       columns: [ 0, 1,2, 3 ]
                   }

               }
            ],

            language: {
               "lengthMenu": "Mostrar _MENU_ registros por pagina",
               "zeroRecords": "No se encontraron resultados en su busqueda",
               "searchPlaceholder": "Buscar registros",
               "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
               "infoEmpty": "No existen registros",
               "infoFiltered": "(filtrado de un total de _MAX_ registros)",
               "search": "Buscar:",
               "paginate": {
                   "first": "Primero",
                   "last": "Último",
                   "next": "Siguiente",
                   "previous": "Anterior"
               },
            }
            });
         $('#table_id').DataTable( {

               language: {
                  "lengthMenu": "Mostrar _MENU_ registros por pagina",
                  "zeroRecords": '<div class="callout callout-danger"> <button type="button" class="close" data-dismiss="alert"aria-hidden="true">&times;</button>                  <p><i class="icon fa fa-ban"></i>No hay solicitudes actualmente.</p>',
                  "searchPlaceholder": "Buscar registros",
                  "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                  "infoEmpty": "No existen registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "search": "Buscar:",
                  "paginate": {
                      "first": "Primero",
                      "last": "Último",
                      "next": "Siguiente",
                      "previous": "Anterior"
                  },
               }
               });
         $('#table_1').DataTable( {

               language: {
                  "lengthMenu": "Mostrar _MENU_ registros por pagina",
                  "zeroRecords": 'No existen registros',
                  "searchPlaceholder": "Buscar registros",
                  "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                  "infoEmpty": "No existen registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "search": "Buscar:",
                  "paginate": {
                      "first": "Primero",
                      "last": "Último",
                      "next": "Siguiente",
                      "previous": "Anterior"
                  },
               }
               });
            $('#example1').DataTable( {

               language: {
                  "lengthMenu": "Mostrar _MENU_ registros por pagina",
                  "zeroRecords": "No se encontraron resultados <a href="+base_url+"activos/backend/nueva_empresa>¿agregar nueva empresa?</a>",
                  "searchPlaceholder": "Buscar registros",
                  "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                  "infoEmpty": "No existen registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "search": "Buscar:",
                  "paginate": {
                      "first": "Primero",
                      "last": "Último",
                      "next": "Siguiente",
                      "previous": "Anterior"
                  },
               }
               });
               $('#etbstutor').DataTable( {

                  language: {
                     "lengthMenu": "Mostrar _MENU_ registros por pagina",
                     "zeroRecords": "No se encontraron resultados <a href="+base_url+"administrar/backend/nuevo_tutor>¿agregar nuevo tutor?</a>",
                     "searchPlaceholder": "Buscar registros",
                     "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                     "infoEmpty": "No existen registros",
                     "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                     "search": "Buscar:",
                     "paginate": {
                         "first": "Primero",
                         "last": "Último",
                         "next": "Siguiente",
                         "previous": "Anterior"
                     },
                  }
                  });
                //Funcion para agregar la empresa a postular
                $(document).on("click",".btn-check",function(){
                empresa = $(this).val();
                infoempresa = empresa.split("*");
                $("#rif").val(infoempresa[0]);
                $("#idempresa").val(infoempresa[0]);
                $("#nombre").val(infoempresa[1]);
                $("#telefono").val(infoempresa[2]);
                $("#direccion").val(infoempresa[3]);
                $("#modal-default").modal("hide");
                });
                //Funcion para buscar al asesor Empresarial
                $('.btn-buscar').on("click",function () {
                  rif=$('#rif').val();
                  if (rif!="") {
                    $.post(base_url+"activos/backend/get_asesor",{
                        id:rif
                    },
                    function (data) {

                    if (data != false) {
                         var d = JSON.parse(data);
                         $('#modal-tutor tbody').html('');
                          $.each(d, function (i, item) {

                        $('#modal-tutor tbody').append(
                            '<tr>'+
                                '<td><div class="unidad" id="'+item.ci_asesor+'"></div>'+item.ci_asesor+'</td>'+
                                '<td><div class="modelo" id="'+item.nombre_asesor+'"></div>'+item.nombre_asesor+'</td>'+
                                '<td><div class="asientos" id="'+item.profesion_asesor+'"></div>'+item.profesion_asesor+' personas</td>'+
                                '<td><div class="marca" id="'+item.cargo_asesor+'"></div>'+item.cargo_asesor+'</td>'+
                                '<td><button type="button" class="btn btn-success btn-asesadd" value="'+item.ci_asesor+"*"+item.nombre_asesor+"*"+item.profesion_asesor+"*"+item.cargo_asesor+'"><span class="fa fa-check"></span> Seleccionar</button></td>'+
                            '</tr>'
                              )
                          })
                      }else{
                      $('#etbstutor').append(
                      ' <tbody>'+
                      '<tr>'+
                      '<div class="alert-warning"> No existen asesores registrados</div>'+
                      '</tr>'+
                      '</tbody>'+
                      '</table>')
                      }
                   });
                  }else {
                    alert("Seleccione una empresa");
                  }

            });
            //Funcion para mostrar los datos del asesores
            $(document).on("click",".btn-asesadd",function(){
            asesor = $(this).val();
            infoasesor = asesor.split("*");
            $("#asesor").val(infoasesor[1]);
            $("#idtutor").val(infoasesor[0]);
            $("#tutor_e_ci").val(infoasesor[0]);
            $("#profesion").val(infoasesor[2]);
            $("#cargo_asesor").val(infoasesor[3]);
            $("#modal-tutor").modal("hide");
            });
            //llamado para cargar get_archivos
            $(".btn-foto").on("click",function() {
              $("#fileImagen").click();
              return false;
            })

            $("#fileImagen").on("change", function() {
              $("#uploadfi").removeClass("btn-light");
              $("#uploadfi").addClass("btn-success fotoci");
              $("#ico-btn-file").removeClass("fa-upload");
              $("#ico-btn-file").addClass("fa-check");
              return false;
            });

            var i = 0;
            $(".boton").on("click",function() {
              var e = $('.boton').index(this);
              var datos = $(this).attr("value");
              //alert(e);
              if (datos !='') {
                infomateria = datos.split("*");
                if (i<4) {
                  swal({
                  title: 'Materia a inscribir',
                  text: "¿Desea agregar "+infomateria[1]+" a su lista de materias a inscribir?",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'si',
                  cancelButtonText:'Cancelar'
                }).then(function() {
                    html = "<tr>";
                    html += "<td><input type='hidden' name='idmaterias[]' value='"+infomateria[0]+"'>"+infomateria[0]+"</td>";
                    html += "<td>"+infomateria[1]+"</td>";
                    html += "<td>"+infomateria[2]+"</td>";
                    html += "<td>"+infomateria[3]+"</td>";
                    html += "<td><input type='hidden' name='tipos[]' value='inscribir'>"+infomateria[4]+"</td>";
                    html += "<td><select name='condiciones[]' class='form-control'><option value='Choque de horas'>Choque de horas</option><option value='Dispersion'>Dispersion</option><option value='Paralelo'>Paralelo</option><option value='Prelacion'>Prelacion</option></select></td>";
                    
                    html += "<td><button type='button' id="+e+" class='btn btn-danger btn-remove-add-mt'><span class='fa fa-trash'></span></button></td>";
                    html += "</tr>";
                    $(".boton:eq("+e+")").addClass("hidden");
                    $(".botone:eq("+e+")").removeClass("hidden");
                    $("#tbinscribir tbody").append(html);
                    i++;
                    $("#display").html(i);
                    swal({
                    type: 'success',
                    title: 'Se agrego '+infomateria[1]+' a su lista de materias',
                    //text: 'Supero el numero de materias',
                    //footer: '<a href>Why do I have this issue?</a>'
                  })
                }, function(dismiss) {
                  if (dismiss === 'cancel') {
                     swal(
                      'Cancelada!',
                      'La materia no se agrego.',
                      'error'
                  )
                }
             })
                }else{
                   swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Supero el numero de materias',
                    //footer: '<a href>Why do I have this issue?</a>'
                  })
                  //alert("Supero el numero de materias");
                }
            
                }else{
                    swal({
                            type: 'warning',
                            title: 'Atencion...',
                            text: 'seleccione una materia..',
                            //footer: '<a href>Why do I have this issue?</a>'
                          })
                    //alert("seleccione una materia...");
                }
            })

            $(document).on("click",".btn-remove-add-mt", function(){
              var iq = $(this).attr("id");
              //alert(iq);

              $(".botone:eq("+iq+")").addClass("hidden");
              $(".boton:eq("+iq+")").removeClass("hidden");
              $(this).closest("tr").remove();
              i--;
              $("#display").html(i);
            })

            
            var c = 0;
            $(".botones").on("click",function() {
              var a = $('.botones').index(this);
              var data = $(this).attr("value");
              
              if (data !='') {
                  infomaterias = data.split("*");
                if (c<4) {
              swal({
                  title: 'Materia a retirar',
                  text: "¿Desea agregar "+infomaterias[1]+" a su lista de materias a retirar?",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'si',
                  cancelButtonText:'Cancelar'
                }).then(function() {
                    html = "<tr>";
                    html += "<td><input type='hidden' name='idmaterias[]' value='"+infomaterias[0]+"'>"+infomaterias[0]+"</td>";
                    html += "<td>"+infomaterias[1]+"</td>";
                    html += "<td>"+infomaterias[2]+"</td>";
                    html += "<td><input type='hidden' name='tipos[]' value='retirar'>"+infomaterias[4]+"</td>";                   
                    html += "<td><input type='hidden' name='condiciones[]' value='retiro'></td>";
                    html += "<td><button type='button' id="+a+" class='btn btn-danger btn-remove-del-mt'><span class='fa fa-trash'></span></button></td>";
                    html += "</tr>";
                    $(".botones:eq("+a+")").addClass("hidden");
                    $(".botonese:eq("+a+")").removeClass("hidden");
                    $("#tbretiro tbody").append(html);
                    c++;
                    $("#display_del").html(c);
                    swal({
                    type: 'warning',
                    title: 'Se agrego '+infomateria[1]+' a su lista de materias',
                    })

                }, function(dismiss) {
                  if (dismiss === 'cancel') {
                     swal(
                      'Cancelada!',
                      'La materia no se agrego.',
                      'error'
                  )
                }
             })

                }else{
                   swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Supero el numero de materias',
                    //footer: '<a href>Why do I have this issue?</a>'
                  })
                  //alert("Supero el numero de materias");
                }
            
        }else{
            swal({
                    type: 'warning',
                    title: 'Atencion...',
                    text: 'seleccione una materia..',
                    //footer: '<a href>Why do I have this issue?</a>'
                  })
            //alert("seleccione una materia...");
        }
            })

            $(document).on("click",".btn-remove-del-mt", function(){
              var aq = $(this).attr("id");
              //alert(aq);

              $(".botones:eq("+aq+")").addClass("hidden");
              $(".botonese:eq("+aq+")").removeClass("hidden");
              $(this).closest("tr").remove();
              c--;
              $("#display_del").html(i);
            })

            $("#comprobar").on("click",function() {
              dis = $("#display").html();
              del = $("#display_del").html();
              justificacion = $("#justificacion").val();
              if (justificacion=="") {
                swal({
                    type: 'warning',
                    title: 'Atencion...',
                    text: 'Debe incluir una breve justificacion.',
                    //footer: '<a href>Why do I have this issue?</a>'
                  })
              }else{                  
              if (dis =="0" && del =="0") {
                swal({
                    type: 'warning',
                    title: 'Atencion...',
                    text: 'no se seleccionado materias para inscribir o retirar.',
                    //footer: '<a href>Why do I have this issue?</a>'
                  })
              }else{
                if (dis !="0" && del=="0") {
                  swal({
                      title: 'Materias a inscribir',
                      text: "¡No ha seleccionado materias para retirar!¿Desea continuar?",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Continuar'
                    }).then(function(){
                        swal(
                          'Enviada!',
                          'Solicitud enviada!',
                          'success'
                        )
                     $("#enviar").click();
                    })
                }else if(dis =="0" && del!="0"){

                  swal({
                      title: 'Materias a inscribir',
                      text: "¡No ha seleccionado materias para inscribir!¿Desea continuar?",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Continuar'
                    }).then(function(){
                        swal(
                          'Enviada!',
                          'Solicitud enviada!',
                          'success'
                        )
                     $("#enviar").click();
                    })
                } else if (dis !="0" && del!="0") {
                  swal({
                      title: 'Materias a inscribir',
                      text: "Se enviara su solicitud de modificacion !¿Desea continuar?",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Continuar'
                    }).then(function(){
                        swal(
                          'Enviada!',
                          'Solicitud enviada!',
                          'success'
                        )
                     $("#enviar").click();
                    }, function(dismiss) {
                  if (dismiss === 'cancel') {
                     swal(
                      'Cancelada!',
                      'La solicitud no ha sido enviada.',
                      'error'
                  )
                }
             })
                }
              }
            }
          })

            

            

})
function generarnumero(numero){
    if (numero>= 99999 && numero< 999999) {
        return Number(numero)+1;
    }
    if (numero>= 9999 && numero< 99999) {
        return "0" + (Number(numero)+1);
    }
    if (numero>= 999 && numero< 9999) {
        return "00" + (Number(numero)+1);
    }
    if (numero>= 99 && numero< 999) {
        return "000" + (Number(numero)+1);
    }
    if (numero>= 9 && numero< 99) {
        return "0000" + (Number(numero)+1);
    }
    if (numero < 9 ){
        return "00000" + (Number(numero)+1);
    }
}
function generarcodigo(codigo) {
  return "mod-"+(codigo);
}
  </script>
</body>
</html>
