        <footer class="main-footer">
          <div class="container footer" style="text-align: center;" >
                <p>Ubicación: Bloque C, planta Alta, Oficina C-91.<br>
                Correo  electrónico: <a> soportepf@luz.edu.ve</a><br>
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
    $(document).ready(function () {
        var base_url= "<?php echo base_url();?>";

            $(document).on("click",".btn-view-orden",function(){
                valor_id = $(this).val();
                $.ajax({
                    url: base_url + "admin/Soporte/edit_orden",
                    type:"POST",
                    dataType:"html",
                    data:{id:valor_id},
                    success:function(data){
                        $("#modal-default .modal-body").html(data);
                    }
                });
            });

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
         control = $("#secuencia").val();
         $("#numero").val(generarnumero(control));
         $("#numDoc").val(generarnumero(control));
         buscador=generarnumero(control);


         $.post(base_url+"egresado/solicitudes/get_documentos",
          {
            id:buscador
          },
          function (data) {
            var c = JSON.parse(data);
            $.each(c,function(i,item){
              $('#tipo').append(
                '<div class="col-sm-6 col-md-3">'+
                        '<div class="thumbnail" style="height: 100%;">'+
                          '<div class="image view view-first">'+
                            '<img style="width: 100%; display: block;" src="'+base_url+'uploads/files/'+item.ruta_adj+'" alt="'+item.nombre_adj+'"/>'+
                            '<div class="tools tools-bottom centrado">'+
                              '<button class="btn btn-doc"><span class="fa fa-trash"></span></button>'+
                              '</div>'+
                          '</div>'+
                          '<div class="caption" style="width:100%">'+
                          '<ul class="no_style_list centrado">'+
                            '<input type="hidden" id="idx" value="'+item.id+'">'+
                           '<li><p>'+item.ruta_adj+'</p></li>'+
                           '<li><p>'+item.nombre_adj+'</p></li>'+
                          ' </ul>'+
                          '</div>'+
                        '</div>'+
                    '  </div>'
              );
            });
          });

          // $(".btn-doc").on("click", function(){
          //      id = $("#idx").val();
          //      numero = buscador;
          //      //alert(ids);
          //       $(this).attr('href', 'javascript:void(0)');
          //          $(this).click(function() {
          //     if (confirm("¿Seguro desea eliminar este Archivo?")) {
          //           $.ajax({
          //          url: base_url + "egresado/solicitudes/delete_documento",
          //          type:"POST",
          //          dataType:"html",
          //          data:{id:id,num:numero},
          //          success:function(resp){
          //              alert("Se elimino satisfactoriamente");
          //              //http://localhost/ventas_ci/mantenimiento/productos
          //               window.location.reload();
          //          }
          //      });
          //     }
          //   });
          //  });
          

          $(".btn-cancel").on("click",function() {
            numero = buscador;
            //alert(numero);
             $(this).attr('href', 'javascript:void(0)');
                $(this).click(function() {
           if (confirm("¿Seguro desea eliminar los Archivos?")) {
                 $.ajax({
                url: base_url + "egresado/solicitudes/delete_documentos",
                type:"POST",
                dataType:"html",
                data:{num:numero},
                success:function(resp){
                    alert("Se elimino satisfactoriamente");
                    //http://localhost/ventas_ci/mantenimiento/productos
                     location.reload();
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
                     "zeroRecords": "No se encontraron resultados <a href="+base_url+"activos/backend/nuevo_tutor>¿agregar nuevo tutor?</a>",
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
                                '<td><button type="button" class="btn btn-success btn-asesadd" value="'+item.ci_asesor+"*"+item.nombre_asesor+"*"+item.profesion_asesor+"*"+item.cargo_asesor+'"><span class="fa fa-check"></span></button></td>'+
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
  </script>
</body>
</html>
