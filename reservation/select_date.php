

    <div class="container" style="margin-top: 50px;"> 
<div class="row"> 

<div class="col-md-12"> 

<div id="calendar"style="width:100%;"> 
 <?php 
  $dateComponents = getdate(); 
  if(isset($_GET['month'])&& isset($_GET['year'])){
    $month = $_GET['month'];
    $year = $_GET['year'];
  }else{
  $month = $dateComponents['mon']; 
  $year = $dateComponents['year']; 
}
  echo build_calendar($month,$year); 
 ?> 
</div> 
</div> 
</div> 
</div>    
<style type="text/css">

#calendar{
/*   border:2px solid #2b363c;*/
height:150px;
}
#calendar th{
    background: #3290d8;
    color: white;
}
#calendar td, #calendar th{
   
    border:1px solid gray;
    text-align: center;
}
#btn{
    color: ;

}
.btn-xs{
margin:2px;
}
</style>