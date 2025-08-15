 $(document).ready(function(){

        $("#cbx_Generico").change(function () {
          

           $("#cbx_Generico option:selected").each(function () {
                SERVERURL =   document.getElementById("SERVERURL").value;
                SERVERDIR =   document.getElementById("SERVERDIR").value;
                id_Generico = $(this).val();
                               

              $.post(SERVERURL +"includes/GetMedicinas.php", { id_Generico: id_Generico, SERVERDIR: SERVERDIR, SERVERURL: SERVERURL }, function(data){
                   
                  $("#dtBasicExample").html(data);
                  $("#dtBasicExample").DataTable().initDataTable();               
               
               });
          });
        });

});
