<style>
  .color{
    background: #0374DF;
  }
</style>
<!-- The Modal -->
  <div class="modal fade" id="myModal<?php echo $row['id'] ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><b>Room Details</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body container-fluid">
         <div class="row">
             <div class="col-md-8">
                  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="uploads/<?php echo $row['image']; ?>" alt="Main" height="300">
    </div>
    <div class="carousel-item">
      <img src="uploads/<?php echo $row['img_1']; ?>" alt="supp1" height="300">
    </div>
    <div class="carousel-item">
      <img src="uploads/<?php echo $row['img_2']; ?>" alt="supp2" height="300">
    </div>
    <div class="carousel-item">
      <img src="uploads/<?php echo $row['img_3']; ?>" alt="supp3" height="300">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
   <p class="contenter" ><?php echo $row['description']; ?></p>
</div>
             </div>
              <div class="col-md-4">
               <h2 class="heading"><b> <?php echo $row['room_name']; ?></b></h2>
              <h3 class=""><i>Room Price: Php<?php echo $row['price']; ?></i></h3>
                <?php if($row['average_rating'] == 0) { ?>
               <!--      <h6><b>RATING:</b></h6> -->
<!-- <span class="ion-android-star"></span> -->
              <!--    <?php }elseif($row['average_rating'] == 1){ ?>
                    <h6><b>RATING:</b></h6>
                    <span class="ion-android-star"></span>
                 <?php }elseif($row['average_rating'] == 2){ ?>
                    <h6><b>RATING:</b></h6>
                    <span class="ion-android-star"></span>
                    <span class="ion-android-star"></span>
                <?php }elseif($row['average_rating'] == 3){ ?>
                     <h6><b>RATING:</b></h6>
                    <span class="ion-android-star"></span>
                    <span class="ion-android-star"></span>
                    <span class="ion-android-star"></span>
                <?php }elseif($row['average_rating'] == 4){ ?>
                    <h6><b>RATING:</b></h6>
                    <span class="ion-android-star"></span>
                    <span class="ion-android-star"></span>
                    <span class="ion-android-star"></span>
                    <span class="ion-android-star"></span>
                <?php }elseif($row['average_rating'] == 5){ ?>
                   <h6><b>RATING:</b></h6>
                    <span class="ion-android-star"></span>
                    <span class="ion-android-star"></span>
                    <span class="ion-android-star"></span>
                    <span class="ion-android-star"></span>
                    <span class="ion-android-star"></span>
                <?php } ?> -->
                </div>
         </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="confirm<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <form method="post" action="includes/bookingcontroller/add_room.php">
    <div class="modal-content">
      <div class="modal-header color">
        <h5 class="modal-title  text-white" id="exampleModalLabel">CONFIRMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center><p style="font-size:25px;">Are you sure you want to select this?</p></center>
       
        <input type="text" name="start_d" value="<?php echo $_GET['start_date'] ?>" hidden>
        <input type="text" name="end_d" value="<?php echo $_GET['end_date'] ?>"  hidden>
 <input type="text" name="roomid" value="<?php echo $row['id'] ?>" hidden>
<input type="text" name="userid" value="<?php echo $currentuser; ?>" hidden>
<input type="text" name="pax" value="<?php echo $_GET['pax']?>" hidden>
      </div>
      <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-primary" name="add_room">CONFIRM</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">NO</button>
      </div>
    </form>
    </div>
  </div>
