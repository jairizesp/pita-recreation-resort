
    function loadrooms(){
  var name = $("#room_type").val();
  if(name){
    $.ajax({
      type: 'post',
      data: {
      rooms:name,
      },
      url: 'display_rooms.php',
      success: function (Response){
        $('#rooms_avail').html(Response);
      }
    });
  }
};
   function changeValue(o){
     document.getElementById('room_type').value=o.innerHTML;
    }

