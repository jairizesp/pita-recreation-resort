<?php
     require '../../app/config/connect.php';

  if (isset($_POST['s_room'])){
    $name = $_POST['s_room'];
    $show   = "UPDATE rooms SET Status='Unavailable' WHERE id='$name'";
    if ($con->query($show) === TRUE) {
      $vacant ="SELECT * FROM rooms WHERE Status='Available'";
     $result2 = $con->query($vacant);
     if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
 echo "<div class='col-md-4 visit mb-3'>
<a href='#'data-toggle='modal' data-target='#myModal".$row['id']."'><img src='uploads/".$row['image']."' alt='Image placeholder' class='img-fluid'></a>
<div class='reviews-star'> 
 <span>".$row['room_name']."</span><br>
 <input type='submit'data-toggle='modal'data-rooms=".$row['id']." data-price=".$row['price']." data-roomname=".$row['room_name']." data-target='#confirm".$row['id']." name='next_page' class='button-18 w-100 js-add updatepayment' value='Select Rooms'> 
 </div>
          </div>
            ";
/*include'modal_book.php';*/
}
}
}else{
      echo "<td colspan='6' class='text-center'>No Products found!</td>";
    }

}
  if (isset($_POST['to_restore'])){
    $name = $_POST['to_restore'];
    $show   = "UPDATE rooms SET Status='Available' WHERE id='$name'";
    if ($con->query($show) === TRUE) {
      $vacant ="SELECT * FROM rooms WHERE Status='Available'";
     $result2 = $con->query($vacant);
     if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
 echo "<div class='col-md-4 visit mb-3'>
<a href='#'data-toggle='modal' data-target='#myModal".$row['id']."'><img src='uploads/".$row['image']."' alt='Image placeholder' class='img-fluid'></a>
<div class='reviews-star'> 
 <span>".$row['room_name']."</span><br>
 <input type='submit'data-toggle='modal'data-rooms=".$row['id']." data-price=".$row['price']." data-roomname=".$row['room_name']." data-target='#confirm".$row['id']." name='next_page' class='button-18 w-100 js-add updatepayment' value='Select Rooms'> 
 </div>
          </div>
            ";
/*include'modal_book.php';*/

}
}
}else{
      echo "<td colspan='6' class='text-center'>No Products found!</td>";
    }


  }
?>