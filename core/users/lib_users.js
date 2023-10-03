// ESTRUCTURA TABLE USUARIOS

 $(document).ready(function(){
      
      $('#usersTable').DataTable({
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
                messageTop: 'Listado de Usuarios',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar CSV',
                messageTop: 'Listado de Usuarios',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                messageTop: 'Listado de Usuarios',
                customize: function(doc) {
                  doc.content[0].text = "Listado de Usuarios";
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
                messageTop: 'Listado de usuarios',
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
** GUARDA REGISTRO ACTUALIZADO DE ESTADO DE USUARIO
*/

$(document).ready(function(){
    $('#change_role').click(function(){
        
        const form = document.querySelector('#fr_change_role_ajax');
        
        const id = document.querySelector('#id');
        const role = document.querySelector('#role');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('id', id.value);
        formData.append('role', role.value);
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"update_role.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    
                    alert("El Estado del usuario se ha actualizado exitosamente");
                    console.log("Datos: " + values);
                    opener.location.reload();
                    window.close();

                }else if(r == -1){
                    
                    alert("Error. Hubo un problema al intentar Actualizar el estado del usuario!!");
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
** GUARDA REGISTRO ACTUALIZADO DE ESTADO DE USUARIO
*/

$(document).ready(function(){
    $('#change_pass').click(function(){
        
        const form = document.querySelector('#fr_change_pass_ajax');
        
        const id = document.querySelector('#user_id');
        const password_actual = document.querySelector('#password_actual');
        const password_1 = document.querySelector('#password_1');
        const password_2 = document.querySelector('#password_2');

        const formData = new FormData(form);
        const values = [...formData.entries()];
        
        
        formData.append('id', id.value);
        formData.append('password_actual', password_actual.value);
        formData.append('password_1', password_1.value);
        formData.append('password_2', password_2.value);
        
        jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"update_pass.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    
                    alert("El Password se ha actualizado exitosamente!! Se aconseja reingresar al sistema.");
                    window.close();

                }else if(r == -1){
                    
                    alert("Error. Hubo un problema al intentar Actualizar el Password!!");
                    console.log("Datos: " + values);
                    
                }else if(r == 5){
                    
                    alert("ERROR!!...Hay campos sin completar");
                    console.log("Datos: " + values);
                    
                }else if(r == 13){
                    alert("ERROR!!...No hay conexion con la base de datos!!");
                }else if(r == 9){
                    alert("ERROR!!...Los Passwords no coinciden!!");
                    $('#password_1').val('');
                    $('#password_2').val('');
                    $('#password_1').focus();
                }else if(r == 11){
                    alert("ERROR!!...El password debe tener entre 10 y 15 caracteres!!");
                    $('#password_1').val('');
                    $('#password_2').val('');
                    $('#password_1').focus();
                }else if(r == 2){
                    alert("ERROR!!...El password actual no es el correcto!!");
                    $('#password_actual').val('');
                    $('#password_1').val('');
                    $('#password_2').val('');
                    $('#password_actual').focus();
                }

                
            }
        });

        return false;
    
});
});




 function callCambiarEstado(id){
    
    let params = `scrollbars = no,
                  resizable = no,
                  status = no,
                  location = no,
                  toolbar = no,
                  menubar = no,
                  width = 800,
                  height = 350,
                  left = 900,
                  top = 250`;
    
    window.open("../users/cambiar_estado.php?id="+id, "cambiar_estado", params);
 
}


function callCambiarPassword(id){
    
    let params = `scrollbars = no,
                  resizable = no,
                  status = no,
                  location = no,
                  toolbar = no,
                  menubar = no,
                  width = 800,
                  height = 500,
                  left = 900,
                  top = 250`;
    
    window.open("../users/cambiar_password.php?id="+id, "cambiar_password", params);
 
}