<?php
require ("includes/common.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Desi Stop| Vocal for Locals</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
</head>
<body style="overflow-x:hidden; padding-bottom:100px;">
  <?php
        include 'includes/header_menu.php';
    ?>
  <div>
    <div class="container mt-5 ">
      <div class="row justify-content-around">
        <div class="col-md-5 mt-3">
          <h3 class="text-warning pt-3 title">Who We Are ?</h3>
          <hr />
          <img
            src="images/desistop.jpeg"
            class="img-fluid d-block rounded mx-auto image-thumbnail">
          <p class="mt-2"><h3>Desi Stop</h3>Desi Stop, Vocal for Local is your online shopping destination to discover the authenticity of India at it's finesh form.
It provides a wide range of products varying from Desi clothes to the comfort of home food.
The products available in Desi Stop are clothes, handicrafts, home decor and food and Beverages.
We strive to give the local artists a representation and let people of India discover their hardwork and help them by shopping at Desi Stop.
If you are looking for desi authenticity, Desi Stop is your stop to shop.

<p>Shop at Desi Stop and unleash the desi in you.</p></p>
        </div>
        <div class="col-md-5 mt-3">
          <span class="text-warning pt-3">
            <h1 class="title">LIVE SUPPORT</h1>
            <h3>24 hours|7 days a week| 365 days a year Live Technical Support</h3>
          </span>
          <hr>
          <p> In case of any queires feel free to contact us through the form.
            Desi Stop team will get back to you in no time.
          </p>

        </div>
      </div>
    </div>
  </div>
  <div class="container pb-3"  id="contact">
  </div><div class="container-fluid pt-5 pb-5" id="contact">
            <div class="section_header text-center mb-5 mt-4">
                <h1 class="text-warning pt-3 title mx-auto">Contact Us</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <form action="message.php" method="POST">
                            <div class="form-group">
                                <label class="l">Name</label>
                                <input type="text" class="form-control" name="username" required placeholder="Full Name" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="l">Email</label>
                                <input type="email" class="form-control" name="email" required placeholder="buddy@xyz.com" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="l">Mobile no.</label>
                                <input type="number" maxlength="12" class="form-control" name="mobile" required placeholder="eg. 98XXXXXXXX" autocomplete="off">
                            </div>
                            
                            <div class="form-group">
                                <label for="Message" class="l">Message</label>
                                <textarea id="explain" style="resize:none;" name="message" required minlength="10" class="form-control" cols="30" rows="4" ></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  
  <!--footer -->
  <?php include 'includes/footer.php'?>
  <!--footer end-->


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    $('[data-toggle="popover"]').popover();
  });
  $(document).ready(function () {

    if (window.location.href.indexOf('#login') != -1) {
      $('#login').modal('show');
    }

  });
</script>
<?php if(isset($_GET['error'])){ $z=$_GET['error']; echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>"; echo "
<script type='text/javascript'>alert('".$z."')</script>";} ?>
<?php if(isset($_GET['errorl'])){ $z=$_GET['errorl']; echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>"; echo "
<script type='text/javascript'>alert('".$z."')</script>";} ?>
</html>
