 $(document).ready(function(){

        $("#cbx_estado").change(function () {
          

          $('#cbx_municipio').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
          $('#cbx_ciudad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

        
          
          $("#cbx_estado option:selected").each(function () {
               existe = document.getElementById("cbx_parroquia");
               
               if (existe != null) {
                  document.getElementById("cbx_parroquia").value = 0;
                  $('#cbx_parroquia').find('option').remove().end().append('<option value="whatever">Elija una opcion</option>').val('whatever');

               }
                SERVERURL =   document.getElementById("SERVERURL").value;
                SERVERDIR =   document.getElementById("SERVERDIR").value;
                id_estado = $(this).val();
        
                

              $.post(SERVERURL +"includes/GetMunicipio.php", { id_estado: id_estado, SERVERDIR: SERVERDIR }, function(data){
                   $("#cbx_municipio").html(data);
               });

              $.post(SERVERURL +"includes/GetCiudad.php", { id_estado: id_estado, SERVERDIR: SERVERDIR }, function(data){
                   $("#cbx_ciudad").html(data);
               });
          });
        });



        $("#cbx_municipio").change(function () {

             existe = document.getElementById("cbx_parroquia");
                //alert (existe);

               if (existe != null) {
         
                 $('#cbx_parroquia').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
                  document.getElementById("cbx_parroquia").value = 0;
               }
             

          $("#cbx_municipio option:selected").each(function () {
                
                SERVERURL =   document.getElementById("SERVERURL").value;
                SERVERDIR =   document.getElementById("SERVERDIR").value;
                id_municipio = $(this).val();

               $.post(SERVERURL +"includes/GetParroquia.php", { id_municipio: id_municipio, SERVERDIR: SERVERDIR }, function(data){
                   $("#cbx_parroquia").html(data);
                
               });
          });
        });

});

 
