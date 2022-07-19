<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Desi Stop| Vocal for Locals</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<?php
 
require "includes/common.php";
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $message = $_POST['message'];

        $insertquery = "insert into message(username,email,mobile,message) values('$username','$email','$mobile','$message')";
       if($con->query($insertquery) == TRUE){
            echo ".";
        } else {
            echo "Failure <br>" . $con->$error; 
        }
        $query = mysqli_query($con, $insertquery);
    }
    include('includes/header_menu.php');
    ?>

<body>
<div class="container-fluid mt-5 pt-5" id="content" style="margin-bottom:200px">
            <div class="col-md-8 mx-auto">
                <div class="jumbotron text-center">
                      <h3>Your message has been successfully registed! <br></h3><hr>
                      <h3>Our team will get back to you soon</h3>
                    <p>Click <a href="index.php">here</a> to explore Desi stop.</p>
                </div>
            </div>
        </div>
</body>
<?php include 'includes/footer.php'?>
</body>
</html>
