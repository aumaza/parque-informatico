// ESTRUCTURA TABLE EQUIPOS

 $(document).ready(function(){
      
      $('#devicesTable').DataTable({
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
                messageTop: 'Listado de Equipos',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar CSV',
                messageTop: 'Listado de Equipos',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                messageTop: 'Listado de Equipos',
                customize: function(doc) {
                  doc.content[0].text = "Listado de Equipos";
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
                messageTop: 'Listado de Equipos',
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
** GUARDA NUEVO REGISTRO DE EQUIPO
*/

$(document).ready(function(){
    $('#new_device').click(function(){
        
        const form = document.querySelector('#fr_new_device_ajax');
        
        const nombre_apellido = document.querySelector('#nombre_apellido');
        const patrimonio = document.querySelector('#patrimonio');
        const ip = document.querySelector('#ip');
        const gateaway = document.querySelector('#gateaway');
        const submask = document.querySelector('#submask');
        const dns = document.querySelector('#dns');
        const nro_oficina = document.querySelector('#nro_oficina');
        const login_usuario = document.querySelector('#login_usuario');
        const sistema_operativo = document.querySelector('#sistema_operativo');
        const periscopio = document.querySelector('#periscopio');
        const puesto_ubicacion = document.querySelector('#puesto_ubicacion');
        const mac_address = document.querySelector('#mac_address');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('nombre_apellido', nombre_apellido.value);
        formData.append('patrimonio', patrimonio.value);
        formData.append('ip', ip.value);
        formData.append('gateway', gateaway.value);
        formData.append('submask', submask.value);
        formData.append('dns', dns.value);
        formData.append('nro_oficina', nro_oficina.value);
        formData.append('login_usuario', login_usuario.value);
        formData.append('sistema_operativo', sistema_operativo.value);
        formData.append('periscopio', periscopio.value);
        formData.append('puesto_ubicacion', puesto_ubicacion.value);
        formData.append('mac_address', mac_address.value);
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"add_device.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    
                    if(confirm("El Equipo se ha registrado exitosamente. Desea registrar más?") == true){
                        $('#nombre_apellido').val('');
                        $('#patrimonio').val('');
                        $('#ip').val('');
                        $('#gateaway').val('');
                        $('#submask').val('');
                        $('#dns').val('');
                        $('#nro_oficina').val('');
                        $('#login_usuario').val('');
                        $('#sistema_operativo').val('');
                        $('#periscopio').val('');
                        $('#puesto_ubicacion').val('');
                        $('#mac_address').val('');
                        $('#nombre_apellido').focus('');
                        console.log("Datos: " + values);

                    }else{
                      
                        opener.location.reload();
                        window.close();
                        
                    }
                    
                    
                    
                }else if(r == -1){
                    
                    alert("Error. Hubo un problema al intentar registrar el equipo!!");
                    console.log("Datos: " + values);
                    
                }else if(r == 5){
                    
                    alert("ERROR!!...Hay campos sin completar");
                    console.log("Datos: " + values);
                    
                }else if(r == 13){
                    alert("ERROR!!...No hay conexion con la base de datos!!");
                }else if(r == 9){
                    alert("Atención!! Ya existe un equipo con esa IP Address");
                }

                
            }
        });

        return false;
    
});
});


/*
** GUARDA NUEVO REGISTRO DE EQUIPO
*/

$(document).ready(function(){
    $('#edit_device').click(function(){
        
        const form = document.querySelector('#fr_edit_device_ajax');
        
        const id = document.querySelector('#id');
        const nombre_apellido = document.querySelector('#nombre_apellido');
        const patrimonio = document.querySelector('#patrimonio');
        const ip = document.querySelector('#ip');
        const gateaway = document.querySelector('#gateaway');
        const submask = document.querySelector('#submask');
        const dns = document.querySelector('#dns');
        const nro_oficina = document.querySelector('#nro_oficina');
        const login_usuario = document.querySelector('#login_usuario');
        const sistema_operativo = document.querySelector('#sistema_operativo');
        const periscopio = document.querySelector('#periscopio');
        const puesto_ubicacion = document.querySelector('#puesto_ubicacion');
        const mac_address = document.querySelector('#mac_address');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        

        formData.append('id', id.value);
        formData.append('nombre_apellido', nombre_apellido.value);
        formData.append('patrimonio', patrimonio.value);
        formData.append('ip', ip.value);
        formData.append('gateway', gateaway.value);
        formData.append('submask', submask.value);
        formData.append('dns', dns.value);
        formData.append('nro_oficina', nro_oficina.value);
        formData.append('login_usuario', login_usuario.value);
        formData.append('sistema_operativo', sistema_operativo.value);
        formData.append('periscopio', periscopio.value);
        formData.append('puesto_ubicacion', puesto_ubicacion.value);
        formData.append('mac_address', mac_address.value);
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"update_device.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    
                    alert("El Equipo se ha actualizado exitosamente");
                        $('#nombre_apellido').val('');
                        $('#patrimonio').val('');
                        $('#ip').val('');
                        $('#gateaway').val('');
                        $('#submask').val('');
                        $('#dns').val('');
                        $('#nro_oficina').val('');
                        $('#login_usuario').val('');
                        $('#sistema_operativo').val('');
                        $('#periscopio').val('');
                        $('#puesto_ubicacion').val('');
                        $('#mac_address').val('');
                        $('#nombre_apellido').focus('');
                        console.log("Datos: " + values);
                        opener.location.reload();
                        window.close();
                        
                }else if(r == -1){
                    
                    alert("Error. Hubo un problema al intentar actualizar el equipo!!");
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
 function callAltaEquipo(){
    
     
    let params = `scrollbars = no,
                  resizable = no,
                  status = no,
                  location = hidden,
                  toolbar = no,
                  menubar = no,
                  width = 800,
                  height = 700,
                  left = auto,
                  right = auto,
                  top = auto,
                  bottom = auto`;
    
    window.open("../devices/alta_equipo.php", "alta_equipo", params);
 
}


function callEditarEquipo(id){
    
     
    let params = `scrollbars = no,
                  resizable = no,
                  status = no,
                  location = no,
                  toolbar = no,
                  menubar = no,
                  width = 800,
                  height = 700,
                  left = auto,
                  right = auto,
                  top = auto,
                  bottom = auto`;
    
    window.open("../devices/editar_equipo.php?id="+id, "editar_equipo", params);
 
}