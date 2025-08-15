$(document).ready(function(){

/*  setInterval(function(){
    updateUserList(); 
    updateUnreadMessageCount(); 
  }, 60000);  

  setInterval(function(){
    showTypingStatus();
    updateUserChat();     
  }, 5000);*/

  $(".messages").animate({ 
    scrollTop: $(document).height() 
  }, "fast");

  $(document).on("click", '#profile-img', function(event) {   
    $("#status-options").toggleClass("active");
  });

  $(document).on("click", '.expand-button', function(event) {   
    $("#profile").toggleClass("expanded");
    $("#contacts").toggleClass("expanded");
  }); 

  $(document).on("click", '#status-options ul li', function(event) {  
    $("#profile-img").removeClass();
    $("#status-online").removeClass("active");
    $("#status-away").removeClass("active");
    $("#status-busy").removeClass("active");
    $("#status-offline").removeClass("active");
    $(this).addClass("active");
    if($("#status-online").hasClass("active")) {
      $("#profile-img").addClass("online");
    } else if ($("#status-away").hasClass("active")) {
      $("#profile-img").addClass("away");
    } else if ($("#status-busy").hasClass("active")) {
      $("#profile-img").addClass("busy");
    } else if ($("#status-offline").hasClass("active")) {
      $("#profile-img").addClass("offline");
    } else {
      $("#profile-img").removeClass();
    };
    $("#status-options").removeClass("active");
  }); 

  $(document).on('click', '.contact', function(){   
    $('.contact').removeClass('active');
    $(this).addClass('active');

    var id_user_destino = $(this).data('touserid');
    var id_user_origen = document.getElementById("iduserorigen").value;

    showUserChat(id_user_origen, id_user_destino);
//
    $(".chatMessage").attr('id', 'chatMessage'+id_user_destino);
    $(".chatButton").attr('id', 'chatButton'+id_user_destino);
  }); 


  $(document).on("click", '.submit', function(event) { 
    var id_user_destino = $(this).attr('id');
    id_user_destino = id_user_destino.replace(/chatButton/g, "");
    sendMessage(id_user_destino);
  });

  $(document).on('focus', '.message-input', function(){
    var is_type = 'yes';
    $.ajax({
      url:"../revista-catedra-digital/views/chatonline/chat_action.php",
      method:"POST",
      data:{is_type:is_type, action:'update_typing_status'},
      success:function(){
      }
    });
  }); 

  $(document).on('blur', '.message-input', function(){
    var is_type = 'no';
    $.ajax({
      url:"../revista-catedra-digital/views/chatonline/chat_action.php",
      method:"POST",
      data:{is_type:is_type, action:'update_typing_status'},
      success:function() {
      }
    });
  });     
}); 

function updateUserList() {
  $.ajax({
    url:"../revista-catedra-digital/views/chatonline/chat_action.php",
    method:"POST",
    dataType: "json",
    data:{action:'update_user_list'},
    success:function(response){   
      var obj = response.profileHTML;
      Object.keys(obj).forEach(function(key) {
        // update user online/offline status
        if($("#"+obj[key].userid).length) {
          if(obj[key].online == 1 && !$("#status_"+obj[key].userid).hasClass('online')) {
            $("#status_"+obj[key].userid).addClass('online');
          } else if(obj[key].online == 0){
            $("#status_"+obj[key].userid).removeClass('online');
          }
        }       
      });     
    }
  });
}

function sendMessage(id_user_destino) {
  message = $(".message-input input").val();
  $('.message-input input').val('');
  if($.trim(message) == '') {
    return false;
  }
  $.ajax({
    url:"../revista-catedra-digital/views/chatonline/chat_action.php",
    method:"POST",
    data:{id_user_destino:id_user_destino, chat_message:message, action:'insert_chat'},
    dataType: "json",
    success:function(response) {
      var resp = $.parseJSON(response);     
      $('#conversation').html(resp.conversation);       
      $(".messages").animate({ scrollTop: $('.messages').height() }, "fast");
    }
  }); 
}        

function showUserChat(id_user_origen, id_user_destino){

    var oReq = new XMLHttpRequest(); 
    var respuesta;
    alert ("perrow caliebte");
    oReq.open("GET", "includes/chat_action.php?id_user_origen="+id_user_origen+"&id_user_destino="+id_user_destino+"&accion=show_chat", false); 
    oReq.send(null); 
    respuesta ="";


    if (oReq.readyState==4 && oReq.status==200)
    { // fue exitoso
          respuesta = oReq.responseText;
          // alert (respuesta);
          $('#userSection').html(respuesta.userSection);
          $('#conversation').html(respuesta.conversation); 
          $('#unread_'+id_user_destino).html('');
    }
}

function updateUserChat() {
  $('li.contact.active').each(function(){
    var id_user_destino = $(this).attr('data-touserid');
    $.ajax({
      url:"../revista-catedra-digital/views/chatonline/chat_action.php",
      method:"POST",
      data:{id_user_destino:id_user_destino, action:'update_user_chat'},
      dataType: "json",
      success:function(response){       
        $('#conversation').html(response.conversation);     
      }
    });
  });
}
function updateUnreadMessageCount() {
  $('li.contact').each(function(){
    if(!$(this).hasClass('active')) {
      var id_user_destino = $(this).attr('data-touserid');
      $.ajax({
        url:"../revista-catedra-digital/views/chatonline/chat_action.php",
        method:"POST",
        data:{id_user_destino:id_user_destino, action:'update_unread_message'},
        dataType: "json",
        success:function(response){   
          if(response.count) {
            $('#unread_'+id_user_destino).html(response.count);  
          }         
        }
      });
    }
  });
}
function showTypingStatus() {
  $('li.contact.active').each(function(){
    var id_user_destino = $(this).attr('data-touserid');
    $.ajax({
      url:"../revista-catedra-digital/views/chatonline/chat_action.php",
      method:"POST",
      data:{id_user_destino:id_user_destino, action:'show_typing_status'},
      dataType: "json",
      success:function(response){       
        $('#isTyping_'+id_user_destino).html(response.message);      
      }
    });
  });
}