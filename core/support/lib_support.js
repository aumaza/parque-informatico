// ESTRUCTURA TABLE EQUIPOS

 $(document).ready(function(){
      
      $('#supportTable').DataTable({
        "order": [[0, "asc"]],
        "responsive":     true,
        "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "deferRender": true,
        "dom":  "Bfrtip",
        buttons: [
            
            {
                extend: 'excel',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar Excel',
                messageTop: 'Listado de Pedidos de Soporte',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar CSV',
                messageTop: 'Listado de Pedidos de Soporte',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                messageTop: 'Listado de Pedidos de Soporte',
                customize: function(doc) {
                  doc.content[0].text = "Listado de Pedidos de Soporte";
                  doc.pageMargins = [20, 10, 45, 15];
                  doc.defaultStyle.fontSize = 9;
                  doc.styles.tableHeader.fontSize = 10;
                  doc.styles.title.fontSize = 14;
                  doc.footer = function(page, pages) {
                    return {
                      margin: [5, 0, 10, 0],
                      height: 30,
                      columns: [{
                        alignment: "center",
                        text: 'Página',
                      }, {
                         alignment: "right",
                         text: [
                           { text: page.toString(), italics: true },
                             " de ",
                           { text: pages.toString(), italics: true }
                         ]
                      }]
                    }
                  }   
                },
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'print', 
                text: '<span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '8pt' );
                                                
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                messageTop: 'Listado de Pedidos de Soporte',
                autoPrint: false,
                exportOptions: {
                    columns: ':visible',
                }
                
            },
            
              'colvis'
        ],
        columnDefs: [ {
            targets: -1,
            visible: true
        } ],
        "fixedColumns": true,
        "language":{
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });
         
    });



 // ====================================================================================== //
// GUARDA NUEVO REGISTRO //

/*
** GUARDA NUEVO REGISTRO DE SOPORTE
*/

$(document).ready(function(){
    $('#new_support').click(function(){
        
        const form = document.querySelector('#fr_new_support_ajax');
        
        const device_id = document.querySelector('#device_id');
        const usuario_responsable = document.querySelector('#usuario_responsable');
        const nro_soporte = document.querySelector('#nro_soporte');
        const fecha_soporte = document.querySelector('#fecha_soporte');
        const usuario_informatica = document.querySelector('#usuario_informatica');
        const descripcion = document.querySelector('#descripcion');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('device_id', device_id.value);
        formData.append('usuario_responsable', usuario_responsable.value);
        formData.append('nro_soporte', nro_soporte.value);
        formData.append('fecha_soporte', fecha_soporte.value);
        formData.append('usuario_informatica', usuario_informatica.value);
        formData.append('descripcion', descripcion.value);
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"add_support.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    
                    if(confirm("El Pedido de Soporte se ha registrado exitosamente. Desea registrar más?") == true){
                        $('#usuario_responsable').val('');
                        $('#nro_soporte').val('');
                        $('#fecha_soporte').val('');
                        $('#usuario_informatica').val('');
                        $('#descripcion').val('');
                        $('#nro_soporte').focus('');
                        console.log("Datos: " + values);

                    }else{
                      
                        opener.location.reload();
                        window.close();
                        
                    }
                    
                    
                    
                }else if(r == -1){
                    
                    alert("Error. Hubo un problema al intentar registrar el pedido de soporte!!");
                    console.log("Datos: " + values);
                    
                }else if(r == 5){
                    
                    alert("ERROR!!...Hay campos sin completar");
                    console.log("Datos: " + values);
                    
                }else if(r == 13){
                    alert("ERROR!!...No hay conexion con la base de datos!!");
                }

                
            }
        });

        return false;
    
});
});


/*
** ACTUALIZA NUEVO REGISTRO DE SOPORTE
*/

$(document).ready(function(){
    $('#edit_support').click(function(){
        
        const form = document.querySelector('#fr_edit_support_ajax');
        
        const id = document.querySelector('#id');
        const usuario_responsable = document.querySelector('#usuario_responsable');
        const nro_soporte = document.querySelector('#nro_soporte');
        const fecha_soporte = document.querySelector('#fecha_soporte');
        const usuario_informatica = document.querySelector('#usuario_informatica');
        const descripcion = document.querySelector('#descripcion');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('id', id.value);
        formData.append('usuario_responsable', usuario_responsable.value);
        formData.append('nro_soporte', nro_soporte.value);
        formData.append('fecha_soporte', fecha_soporte.value);
        formData.append('usuario_informatica', usuario_informatica.value);
        formData.append('descripcion', descripcion.value);
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"update_support.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    
                    alert("El Pedido de Soporte se ha actualizado exitosamente");
                    opener.location.reload();
                    window.close();
                        
                }else if(r == -1){
                    
                    alert("Error. Hubo un problema al intentar actualizar el pedido de soporte!!");
                    console.log("Datos: " + values);
                    
                }else if(r == 5){
                    
                    alert("ERROR!!...Hay campos sin completar");
                    console.log("Datos: " + values);
                    
                }else if(r == 13){
                    alert("ERROR!!...No hay conexion con la base de datos!!");
                }

                
            }
        });

        return false;
    
});
});



 // OPEN WINDOW
 function callPedidoSoporte(id){
    
     
    let params = `scrollbars = no,
                  resizable = no,
                  status = no,
                  location = no,
                  toolbar = no,
                  menubar = no,
                  width = 1600,
                  height = 800,
                  left = auto,
                  right = auto,
                  top = auto,
                  bottom = auto`;
    
    window.open("../support/listar_soporte.php?device_id="+id, "listar_soporte", params);
 
}


function callAltaSoporte(id){
    
     
    let params = `scrollbars = no,
                  resizable = no,
                  status = no,
                  location = no,
                  toolbar = no,
                  menubar = no,
                  width = 800,
                  height = 550,
                  left = auto,
                  right = auto,
                  top = auto,
                  bottom = auto`;
    
    window.open("../support/alta_soporte.php?device_id="+id, "alta_soporte", params);
 
}


function callEditarSoporte(id){
    
     
    let params = `scrollbars = no,
                  resizable = no,
                  status = no,
                  location = no,
                  toolbar = no,
                  menubar = no,
                  width = 800,
                  height = 550,
                  left = auto,
                  right = auto,
                  top = auto,
                  bottom = auto`;
    
    window.open("../support/editar_soporte.php?id="+id, "editar_soporte", params);
 
}