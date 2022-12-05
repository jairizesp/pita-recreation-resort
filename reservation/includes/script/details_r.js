$(document).on('click','#btn-submit',function(e){
    var userid =document.getElementById("userid").value;
      var checkin =document.getElementById("checkin").value;
        var checkout =document.getElementById("checkout").value;
      var refnum = document.getElementById("reference").value;
      var adults = document.getElementById("adults").value;
       var kids = document.getElementById("kids").value;
    if(refnum==''){
Swal.fire(
'Something went Wrong',
  'Looks like reference number is empty',
  'question'
  )
    }
    else{
    Swal.fire({
title: 'Are you sure want to proceed?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Please Proceed'
}).then((result) => {
  if (result.isConfirmed) {
          $.ajax({
      type: 'post',
      data: {
       userid:userid,checkin:checkin,checkout:checkout,adults:adults,kids:kids,refnum:refnum,
      },
      url: 'includes/temp_reserve.php',
      success: function (Response){
      /*  $('#roomsavail').html(Response);*/
       window.location.href='confirmation.php?start_date='+checkin+'&end_date='+checkout;
      }
    });
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }
})
    }
  });
