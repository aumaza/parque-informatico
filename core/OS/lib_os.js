// ESTRUCTURA TABLE SISTEMAS OPERATIVOS

 $(document).ready(function(){
      
      $('#osTable').DataTable({
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
                messageTop: 'Listado de Sistemas Operativos',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar CSV',
                messageTop: 'Listado de Sistemas Operativos',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                messageTop: 'Listado de Sistemas Operativos',
                customize: function(doc) {
                  doc.content[0].text = "Listado de Sistemas Operativos";
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
                messageTop: 'Listado de Sistemas Operativos',
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


/*
** GUARDA NUEVO REGISTRO DE SISTEMA OPERATIVO
*/

$(document).ready(function(){
    $('#new_os').click(function(){
        
        const form = document.querySelector('#fr_new_os_ajax');
        
        const descripcion = document.querySelector('#descripcion');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('descripcion', descripcion.value);
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"nuevo_os.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    
                    if(confirm("La Sistema Operativo se ha registrado exitosamente. Desea cargar más?") == true){
                        $('#descripcion').val('');
                        $('#descripcion').focus('');
                        console.log("Datos: " + values);

                    }else{
                      
                        opener.location.reload();
                        window.close();
                        
                    }
                    
                    
                    
                }else if(r == -1){
                    
                    alert("Error. Hubo un problema al intentar registrar el Sistema Operativo!!");
                    console.log("Datos: " + values);
                    
                }else if(r == 5){
                    
                    alert("ERROR!!...Hay campos sin completar");
                    console.log("Datos: " + values);
                    
                }else if(r == 13){
                    alert("ERROR!!...No hay conexion con la base de datos!!");
                }else if(r == 9){
                    alert("Atención!! Registro Existente");
                }

                
            }
        });

        return false;
    
});
});



/*
** GUARDA REGISTRO ACTUALIZADO DE SISTEMA OPERATIVO
*/

$(document).ready(function(){
    $('#update_os').click(function(){
        
        const form = document.querySelector('#fr_update_os_ajax');
        
        const id = document.querySelector('#id');
        const descripcion = document.querySelector('#descripcion');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('id', id.value);
        formData.append('descripcion', descripcion.value);
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"update_os.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    
                    alert("El Sistema Operativo se ha actualizado exitosamente");
                        $('#descripcion').val('');
                        $('#descripcion').focus('');
                        console.log("Datos: " + values);
                        opener.location.reload();
                        window.close();

                }else if(r == -1){
                    
                    alert("Error. Hubo un problema al intentar registrar el Sistema Operativo!!");
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
 function callAltaOS(){
    
    let params = `scrollbars = yes,
                  resizable = no,
                  status = no,
                  location = no,
                  toolbar = no,
                  menubar = no,
                  width = 800,
                  height = 350,
                  left = 900,
                  top = 250`;
    
    window.open("../OS/alta_os.php", "alta_os", params);
 
}


function callEditarOS(id){
    
    let params = `scrollbars = yes,
                  resizable = no,
                  status = no,
                  location = no,
                  toolbar = no,
                  menubar = no,
                  width = 800,
                  height = 350,
                  left = 900,
                  top = 250`;
    
    window.open("../OS/editar_os.php?id="+id, "editar_os", params);
 
}