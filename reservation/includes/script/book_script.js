//show HIDDEN DIV
const targetDiv = document.getElementById("third");
const btn = document.getElementById("showdiv");
btn.onclick = function () {
  if (targetDiv.style.display !== "none") {
    targetDiv.style.display = "none";
  } else {
    targetDiv.style.display = "block";
  }
};

/* $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
          var val = $(this).attr("value");
          $("." + val).toggle();
        });
      });*/



