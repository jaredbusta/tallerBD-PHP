$(document).ready(function(){

    var table = $('#user_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'csv',
                text: 'Copy all data',
                exportOptions: {
                    modifier: {
                        search: 'none'
                    }
                }
            }
        ],
        'columns': [
             
            {data: 'id_usuario'},
            {data: 'nick'},
            {data: 'nombre'},
            {data: 'correo'},
            {
                data:'id_usuario',
                orderable:false,
                render:function(data){
                    return ` <a class='update btn btn-warning' data-id='${data}'> modificar </a> - - <a class='delete btn btn-danger' data-id='${data}' >Borrar</a>   </td>`;
                }
            }
        ],
        bFilter: true,
    });


    cargaTablaUsuarios();

    function cargaTablaUsuarios(){
        $.ajax({
            url: "../controller/usuarios/lista_usuarios.php",
            method:"post",
            dataType: "json",
            contentType:"application/json;charset='utf8'",
            data:{},
            complete: function(datos) {
                table.clear().draw();
                table.rows.add(datos.responseJSON);
                table.columns.adjust().draw();
            },
            error:function(err){
            
            }
        });
    }

    $(document).on('click','#btn_guarda_usuario',function(){
        //TODO: Aqui debes validar el formulario... ( tipos de datos, que todo este lleno etc.)
        $.ajax({
            url: "../controller/usuarios/nuevo_usuario.php",
            type:"post",
            dataType: "json",
            data: $("#form").serialize(),
            success: function(r) {
                if(r){
                    cargaTablaUsuarios();
                }else{
                    alert("hubo un error al intentar guarda el nuevo usuario");
                    clearForm();
                }
            },
            error:function(err){
                console.error(err);
            }
        });
    }); 
    $(document).on('click','.delete',function(){
        let id_usuario = $(this).attr("data-id");
        r = confirm(`¿ Borrar al usuario ${id_usuario}? `);
        if(!r) return;
        $.ajax({
            url: "../controller/usuarios/delete_usuario.php",
            type:"post",
            dataType: "json",
            data: {id:id_usuario},
            success: function(r) {
               if(r){
                   cargaTablaUsuarios();
               }
            },
            error:function(err){
                console.error(err);
            }
        });
    });

    function clearForm(){
        $("#btn_limpiar").trigger("click");
    }
});