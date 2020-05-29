        <footer>
          <div class="pull-right">
            URBI &copy; alquiler de buses <a href="https://colorlib.com">contactanos</a>
          </div>
          <div class="clearfix"></div>
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Highcharts -->
<script src="<?php echo base_url();?>assets/template/highcharts/highcharts.js"></script>
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
<script src="<?php echo base_url();?>assets/build/js/custom.min.js"></script>

<script>
$(document).ready(function () {
    var base_url= "<?php echo base_url();?>";
    
        $('#vehiculotbs').DataTable({
        "language": {
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

    $('#example').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excelHtml5',
            title: "Lista de Cotizaciones",
            exportOptions: {
                columns: [ 0, 1,2, 3, 4 ]
            },
        },
        {
            extend: 'pdfHtml5',
            title: "Listado de Cotizaciones",
            exportOptions: {
                columns: [ 0, 1,2, 3, 4 ]
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
$('.example1').DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar registros",
        "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "<i class='fa fa-search fa-fw'></i>",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});

    $(".btn-remove").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        //alert(ruta);
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){
                //http://localhost/ventas_ci/mantenimiento/productos
                window.location.href = base_url + resp;
            }
        });
    });

  $('#personas').keyup(function(){
            carro='';
            num = $(this).val();
            if (num != "") {
                if (num>55) {
                alert('Valor no valido');
                $(this).focus();
                $(this).select();
            }else{
                if (num<5)
             {
                carro="Camioneta";
                tipo="3";
                $('#vehiculo').val(carro);
                $('#vehinum').val(tipo);
            }else if(num>=5 && num<=11){
                carro="Minivan";
                tipo="4";
                $('#vehiculo').val(carro);
                $('#vehinum').val(tipo);
            }else if(num>=11 && num<=30){
                carro="Van";
                tipo="2";
                $('#vehiculo').val(carro);
                $('#vehinum').val(tipo);
            }else if(num>=30){
                carro="Bus";
                tipo="1";
                $('#vehiculo').val('Bus');
                $('#vehinum').val(tipo);
            }
            }

            }else{
                //alert('esta vacio');
                $('#vehiculo').val(null);

            }
        });

    $(".btn-view-cliente").on("click", function(){
        var cliente = $(this).val();

        var infocliente = cliente.split("*");
        html = "<p><strong>Nombre:</strong>"+infocliente[1]+"</p>"
        html += "<p><strong>Tipo de Cliente:</strong>"+infocliente[2]+"</p>"
        html += "<p><strong>Tipo de Documento:</strong>"+infocliente[3]+"</p>"
        html += "<p><strong>Numero  de Documento:</strong>"+infocliente[4]+"</p>"
        html += "<p><strong>Telefono:</strong>"+infocliente[5]+"</p>"
        html += "<p><strong>Direccion:</strong>"+infocliente[6]+"</p>"
        $("#modal-default .modal-body").html(html);
    });

    $(".btn-view-usuario").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "administrador/usuarios/view",
            type:"POST",
            data:{idusuario:id},
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });




    $('.sidebar-menu').tree();

    $("#comprobantes").on("change",function(){
        option = $(this).val();

        if (option != "") {
            infocomprobante = option.split("*");

            $("#idcomprobante").val(infocomprobante[0]);
            $("#igv").val(infocomprobante[2]);
            $("#serie").val(infocomprobante[3]);
            $("#numero").val(generarnumero(infocomprobante[1]));
        }
        else{
            $("#idcomprobante").val(null);
            $("#igv").val(null);
            $("#serie").val(null);
            $("#numero").val(null);
        }

    })

    $(document).on("click",".btn-check",function(){
        cliente = $(this).val();
        infocliente = cliente.split("*");
        $("#idcliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]);
        $("#modal-default").modal("hide");
    });




    $("#ruta").autocomplete({
        source:function(request, response){
            $.ajax({
                url: base_url+"destinos/getDestinos",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term,tipo:carro},
                success:function(data){
                   response(data);
                }
            });
        },
        minLength:2,
        select:function(event, ui){
            data = ui.item.idruta+"*"+ui.item.label+"*"+ui.item.tipo+"*"+ui.item.p1+"*"+ui.item.p2+"*"+ui.item.p3+"*"+ui.item.p4;
            $("#btn-agregar").val(data);
        },
    });

    $("#btn-agregar").on("click",function(){
        data = $(this).val();
        if (data !='') {
            $("#tbventas tbody").html('');
            infoproducto = data.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idrutas' value='"+infoproducto[0]+"'>"+infoproducto[1]+"</td>";
            html += "<td>"+infoproducto[2]+"</td>";
            html += "<td><input type='hidden' name='precio1' value='"+infoproducto[3]+"'><p>"+infoproducto[3]+"</p></td>";
            html += "<td><input type='hidden' name='precio2' id='i4' value='"+infoproducto[4]+"'>"+infoproducto[4]+"</td>";
            html += "<td><input type='hidden' name='precio3' value='"+infoproducto[5]+"'><p>"+infoproducto[5]+"</p></td>";
            html += "<td><input type='hidden' name='precio4' value='"+infoproducto[6]+"'><p>"+infoproducto[6]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-ruta'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbventas tbody").append(html);

            $("#btn-agregar").val(null);
            $("#ruta").val(null);
        }else{
            alert("seleccione una ruta...");
        }
    });
    $('#btn-agregar').on("click",function () {
        carrito=$('#vehinum').val();
        $.post(base_url+"vehiculo/getCarro",{
            tipo:carrito
        },
             function (data) {

        if (data != false) {
             var d = JSON.parse(data);
             $('#modal-vehiculo tbody').html('');
              $.each(d, function (i, item) {

            $('#modal-vehiculo tbody').append(
                '<tr>'+
                    '<td><div class="unidad" id="'+item.tipo+'"></div>'+item.tipo+'</td>'+
                    '<td><div class="modelo" id="'+item.marca+'"></div>'+item.marca+'</td>'+
                    '<td><div class="marca" id="'+item.modelo+'"></div>'+item.modelo+'</td>'+
                    '<td><div class="asientos" id="'+item.personas+'"></div>'+item.personas+' personas</td>'+
                    '<td><div class="servicios" id="'+item.servicios+'"></div>'+item.servicios+'</td>'+
                    '<td><div class="empresa" id="'+item.empresa+'"></div>'+item.empresa+'</td>'+
                    '<td><button type="button" class="btn btn-success btn-addcarro" value="'+item.cod_placa+"*"+item.tipo+"*"+item.marca+"*"+item.modelo+"*"+item.personas+"*"+item.empresa+"*"+item.servicios+'"><span class="fa fa-check"></span></button></td>'+
                '</tr>'
                  )
              })
              $("#vehiculo").val(null);
              $("#personas").val(null);
              $("#vehinum").val(null);
          }else{
            $('#tbvehiculo').append(
           ' <tbody>'+
              '<tr>'+
                   '<div class="alert-warning"> No existe la ruta o la unidad</div>'+
                        '</tr>'+
           '</tbody>'+
           '</table>')
          }
       });
    });

    $(document).on("click",".btn-addcarro",function () {
        chopy = $(this).val();
        if (chopy !='') {
            $("#tbvehiculo tbody").html('');
           infochopy = chopy.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idvehiculos' value='"+infochopy[0]+"'>"+infochopy[1]+"</td>";
            html += "<td>"+infochopy[2]+"</td>";
            html += "<td><input type='hidden' name='marca[]' value='"+infochopy[3]+"'>"+infochopy[3]+"</td>";
            html += "<td>"+infochopy[4]+"</td>";
            html += "<td><input type='hidden' name='modelo[]' id='transportista' value='"+infochopy[5]+"'><p>"+infochopy[5]+"</p></td>";

            html += "<td><button type='button' class='btn btn-danger btn-remove-ruta'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbvehiculo tbody").append(html);
            asignado = $("#transportista").val();
            $("#btn-addcarro").val(null);
        }else{
            alert("seleccione una ruta...");
        }
        $("#modal-vehiculo").modal("hide");
    });

    $(document).on("click",".btn-view-cotizacion",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "cotizar/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data){
                $("#modal-default .modal-body").html(data);
            }
        });
    });
    $(document).on("click",".btn-remove-ruta", function(){
        $(this).closest("tr").remove();

    });
    $(document).on("click",".btn-print",function(){
        $("#modal-default .modal-body").print({
            title:"Comprobante de Cotizacion"
        });
    });


    $(document).on("click","#urbina", function (e) {
        e.preventDefault();
        var p1 = infoproducto[3];
       var p2 = infoproducto[4];
       var p3 = infoproducto[5];
       var p4 = infoproducto[6];
        final = $('#secreto').val();
           infofinal = final.split("*");
           urb1 = infofinal[0];
           urb2 = infofinal[2];
         precio1 = parseFloat(p1) + parseFloat(urb1);
         precio2 = parseFloat(p2) + parseFloat(urb1);
         precio3 = parseFloat(p3) + parseFloat(urb2);
         precio4 = parseFloat(p4) + parseFloat(urb2);
          $('[name="preciototal1"]').val(precio1);
          $('[name="preciototal2"]').val(precio2);
          $('[name="preciototal3"]').val(precio3);
          $('[name="preciototal4"]').val(precio4);
    });
     $(document).on("click","#otros", function (e) {
         e.preventDefault();
        var p1 = infoproducto[3];
       var p2 = infoproducto[4];
       var p3 = infoproducto[5];
       var p4 = infoproducto[6];
       final = $('#secreto').val();
           infofinal = final.split("*");
           ot1 = infofinal[1];
           ot2 = infofinal[3];
        precio1 = parseFloat(p1) + parseFloat(ot1);
         precio2 = parseFloat(p2) + parseFloat(ot1);
         precio3 = parseFloat(p3) + parseFloat(ot2);
         precio4 = parseFloat(p4) + parseFloat(ot2);
          $('[name="preciototal1"]').val(precio1);
          $('[name="preciototal2"]').val(precio2);
          $('[name="preciototal3"]').val(precio3);
          $('[name="preciototal4"]').val(precio4);
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
