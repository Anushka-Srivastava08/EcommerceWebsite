<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desi Stop| Vocal for Locals</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body style="margin-bottom:200px">
    <!--Header-->
    <?php
include 'includes/header_menu.php';
include 'includes/check-if-added.php';
?>
    <!--Header ends-->
    <div id="content">
        <div id="bg" class=" ">
            <div class="container" style="padding-top:150px">
            <div class="mx-auto p-5 text-white" id="banner_content" style="border-radius: 0.5rem;" >
            <h1>We sell Happiness :)</h1>
            <p> For the desi in you </p>
            <a href="products.php" class="btn btn-info btn-lg text-white">Shop Now</a>

            </div>
            </div>

        </div>
    </div>
    <div class="text-center pt-4 h3">
    <p style="font-family: 'shareware'; font-size: 40px">!! GO DESI !! </p>
    </div>
    <!--menu highlights start-->
 <div class="container pt-3">
        <div class="row text-center ">
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#clothes"> <img src="images/clothes.jpg" class="img-fluid " alt="" style="border-radius:0.5rem;width:255px;height:255px;">
                    <div class="h5 pt-3 font-weight-bolder">
                      Clothes
                   </div>
                 </a>
             </div>
            <div class="col-6 col-md-3 py-3 " >
                <a href="handicrafts.php"  >
                  <img src="images/handi.jpeg" class="img-fluid zoom" alt="" style="border-radius:0.5rem;width:255px;height:255px;">
                     <div class="h5 pt-3 font-weight-bolder">
                        Handicrafts
                     </div>
                  </a>
             </div>
            <div class="col-6 col-md-3 py-3">
                <a href="homedecor.php">
                 <img src="images/hd1.jpeg" class="img-fluid" alt="" style="border-radius:0.5rem;width:255px;height:255px;">
                <div class="h5 pt-3 font-weight-bolder">
                    Home Decor
                 </div>
             </a>
             </div>
            <div class="col-6 col-md-3 py-3">
                <a href="food.php">
                 <img src="images/food.jpg" class="img-fluid  " alt="" style="border-radius:0.5rem;width:255px;height:255px;">
                 <div class="h5 pt-3 font-weight-bolder">
                    Food and Beverages
                 </div>
              </div>
            </a>
        </div>
    </div>

    <!--menu highlights end-->
    <!--footer -->
    <?php include 'includes/footer.php'?>
    <!--footer end-->




</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
$(document).ready(function() {

if(window.location.href.indexOf('#login') != -1) {
  $('#login').modal('show');
}

});
</script>
<?php if (isset($_GET['error'])) {$z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
    
<?php if (isset($_GET['errorl'])) {$z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>




</html>