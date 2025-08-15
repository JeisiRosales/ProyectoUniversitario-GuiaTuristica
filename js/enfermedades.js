 $(document).ready(function(){

        $("#cbx_Capitulo").change(function () {
          

          $('#cbx_Bloque').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
          //$('#cbx_Categoria').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

          $("#cbx_Capitulo option:selected").each(function () {
                SERVERURL =   document.getElementById("SERVERURL").value;
                SERVERDIR =   document.getElementById("SERVERDIR").value;
                id_Capitulo = $(this).val();
                

              $.post(SERVERURL +"includes/GetBloques.php", { id_Capitulo: id_Capitulo, SERVERDIR: SERVERDIR }, function(data){
                   $("#cbx_Bloque").html(data);
               });

          });
        });



        $("#cbx_Bloque").change(function () {

          //$('#cbx_Categoria').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

          $("#cbx_Bloque option:selected").each(function () {

                $('#dtCategoria').dataTable().fnDestroy();
                
                SERVERURL =   document.getElementById("SERVERURL").value;
                SERVERDIR =   document.getElementById("SERVERDIR").value;
                id_Bloque = $(this).val();
                

               $.post(SERVERURL +"includes/GetCategorias.php", { id_Bloque: id_Bloque, SERVERDIR: SERVERDIR }, function(data){

                  $("#dtCategoria").html(data);
                  $('#dtCategoria').DataTable().initDataTable();               
               
               });
          });
        });






});
