<?php
session_start();
error_reporting(0);
include("connection.php");
extract($_REQUEST);
?>
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
<!--header -->
 <?php
include 'includes/header_menu.php';
include 'includes/check-if-added.php';
?>
<!--header ends -->
<div class="container" style="margin-top:65px">
         <!--jumbutron start-->
        <div class="jumbotron text-center">
            <h1>Welcome to Desi Stop!</h1>
            <p>We have wide range of products for you. Your stop to go desi. </p>
        </div>
        <!--jumbutron ends-->
        <!--breadcrumb start-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
        <!--breadcrumb end-->
    <hr/>

<?php

error_reporting(0);
include("connection.php");
extract($_REQUEST);
$arr=array();
if(isset($_GET['msg']))
{
	$loginmsg=$_GET['msg'];
}
else
{
	$loginmsg="";
}
if(isset($_SESSION['cust_id']))
{
	 $cust_id=$_SESSION['cust_id'];
	 $cquery=mysqli_query($con,"select * from customer where fld_email='$cust_id'");
	 $cresult=mysqli_fetch_array($cquery);
}
else
{
	$cust_id="";
}
 





$query=mysqli_query($con,"select  vendor.fld_name,vendor.fldvendor_id,vendor.fld_email,
vendor.fld_mob,vendor.fld_address,vendor.fld_logo,fuel.fuel_id,fuel.fuelname,fuel.cost,
fuel.quantity,fuel.paymentmode 
from vendor inner join fuel on vendor.fldvendor_id=fuel.fldvendor_id;");
while($row=mysqli_fetch_array($query))
{
	$arr[]=$row['fuel_id'];
	
}

//print_r($arr);

echo $addtocart;
 if(isset($addtocart))
 {
	 
	if(!empty($_SESSION['cust_id']))
	{
		 
		header("location:form/cart.php?product=$addtocart");
	}
	else
	{
		header("location:form/?product=$addtocart");
	}
 }
 
 if(isset($login))
 {
	 header("location:form/index.php");
 }
 if(isset($logout))
 {
	 session_destroy();
	 header("location:home.php");
 }
 $query=mysqli_query($con,"select fuel.fuelname,fuel.fldvendor_id,fuel.cost,fuel.quantity,fuel.fldimage,cart.fld_cart_id,cart.fld_product_id,cart.fld_customer_id from fuel inner  join cart on fuel.fuel_id=cart.fld_product_id where cart.fld_customer_id='$cust_id'");
  $re=mysqli_num_rows($query);
if(isset($message))
 {
	 
	 if(mysqli_query($con,"insert into message(fld_name,fld_email,fld_phone,fld_msg) values ('$nm','$em','$ph','$txt')"))
     {
		 echo "<script> alert('We will be Connecting You shortly')</script>";
	 }
	 else
	 {
		 echo "failed";
	 }
 }

?>
<html>	  
   
	<body>
			  <!-- container 1 starts -->
<div class="container-fluid">
     <div class="row"><!--main row-->
          <div class="img-fluid pb-1"><!--main row 2 left-->
	          
	            <div class="container-fluid rounded" style="border:solid 1px #F0F0F0;"><!--product container-->
	                  <?php
	                        $fuel_id=$arr[12];
	                        $query=mysqli_query($con,"select vendor.fld_email,vendor.fld_name,vendor.fld_mob,
	                        vendor.fld_phone,vendor.fld_address,vendor.fld_logo,fuel.fuel_id,fuel.fuelname,fuel.cost,
	                        fuel.quantity,fuel.paymentmode,fuel.fldimage from vendor inner join
	                        fuel on vendor.fldvendor_id=fuel.fldvendor_id where fuel.fuel_id='$fuel_id'");
	                             while($res=mysqli_fetch_assoc($query))
	                                  {
		                                 $hotel_logo= "images/".$res['fld_email']."/".$res['fld_logo'];
		                                 $food_pic= "images/".$res['fld_email']."/foodimages/".$res['fldimage'];
	                                   ?>
	                                      <div class="container-fluid">
	                                          <div class="container-fluid"><!--product row container 1-->
	                                               <div class="row" style="padding:10px; ">
		                            <!--hotel logo-->  <div class="img-fluid pb-1"><img src="<?php echo $hotel_logo; ?>" class="rounded-circle" height="50px" width="50px" alt="Cinque Terre"></div>
		                                               <div class="img-fluid pb-1">
		                            <!--hotelname-->        <span style="font-family: 'Miriam Libre', sans-serif; font-size:28px;color:#CB202D;"><?php echo $res['fld_name']; ?></span>
                                                       </div>
		                            <!--ruppee-->      <div class="img-fluid pb-1"><i  style="font-size:20px;" class="fas fa-rupee-sign"></i>&nbsp;<span style="color:green; font-size:25px;"><?php echo $res['cost']; ?></span></div>
									                   <form method="post">
		                         <!--add to cart-->    <div class="img-fluid pb-1" style="text-align:left;padding:10px; font-size:25px;"><button type="submit"  name="addtocart" value="<?php echo $res['fuel_id'];?>"><span style="color:green;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button></div>
		                                               </form>
													</div>
		 
	                                           </div>
	                                           <div class="container-fluid"><!--product row container 2-->
	                                                <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		                           <!--food Image-->     <div class="img-fluid pb-1"><img src="<?php echo $food_pic; ?>" class="rounded" height="250px" width="100%" alt="Cinque Terre"></div>
		 		                                    </div>
	                                            </div>
	                                            <div class="container-fluid"><!--product row container 3-->
	                                                 <div class="row" style="padding:10px; ">
		                                                 <div class="img-fluid pb-1">
		                               <!--cuisine-->          <span><li><?php echo $res['quantity']; ?></li></span>
		                                <!--cost-->            <span><li><?php echo "Rs".$res['cost']; ?>&nbsp;for 1</li></span>
		                                <!--deliverytime--> 
		                                                 </div>
		                            <!--deliverytime-->  <div class="img-fluid pb-1" style="padding:20px;"><h3><?php echo"(" .$res['fuelname'].")"?></h3></div>
		                                               </div>
		 
	                                             </div>
	
	
	                                   <?php
	                                     }
	                                    ?>
	                                        </div>
		        </div> 
	   </div>
 
 <!-- container 1 ends -->
  <!-- container 2 starts -->
<div class="img-fluid pb-1">
	
	<div class="container-fluid rounded" style="border:solid 1px #F0F0F0;">
	
	  <?php
	  $fuel_id=$arr[13];
	  $query=mysqli_query($con,"select vendor.fld_email,vendor.fld_name,vendor.fld_mob,
	  vendor.fld_phone,vendor.fld_address,vendor.fldvendor_id,vendor.fld_logo,fuel.fuel_id,fuel.fuelname,fuel.cost,
	  fuel.quantity,fuel.paymentmode,fuel.fldimage from vendor inner join
	  fuel on vendor.fldvendor_id=fuel.fldvendor_id where fuel.fuel_id='$fuel_id'");
	  while($res=mysqli_fetch_assoc($query))
	  {
		   $hotel_logo= "images/".$res['fld_email']."/".$res['fld_logo'];
		   $food_pic= "images/".$res['fld_email']."/foodimages/".$res['fldimage'];
	  ?>
	  <div class="container-fluid">
	  <div class="container-fluid">
	     <div class="row" style="padding:10px; ">
		      <div class="img-fluid pb-1"><img src="<?php echo $hotel_logo; ?>" class="rounded-circle" height="50px" width="50px" alt="Cinque Terre"></div>
		      <div class="img-fluid pb-1">
		                     <a href="search.php?vendor_id=<?php echo $res['fldvendor_id']; ?>"><span style="font-family: 'Miriam Libre', sans-serif; font-size:28px;color:#CB202D;">
		 <?php echo $res['fld_name']; ?></span></a>
        </div>
		 <div class="img-fluid pb-1"><i  style="font-size:20px;" class="fas fa-rupee-sign"></i>&nbsp;<span style="color:green; font-size:25px;"><?php echo $res['cost']; ?></span></div>
		 <form method="post">
		 <div class="img-fluid pb-1" style="text-align:left;padding:10px; font-size:25px;"><button type="submit" name="addtocart" value="<?php echo $res['fuel_id']; ?>")" ><span style="color:green;" <i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button></div>
		 <form>
		 </div>
		 
	  </div>
	  <div class="container-fluid">
	  <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		 <div class="img-fluid pb-1"><img src="<?php echo $food_pic; ?>" class="rounded" height="250px" width="100%" alt="Cinque Terre"></div>
		 
		 </div>
	  </div>
	  <div class="container-fluid">
	     <div class="row" style="padding:10px; ">
		 <div class="img-fluid pb-1">
		 <span><li><?php echo $res['quantity']; ?></li></span>
		 <span><li><?php echo "Rs ".$res['cost']; ?>&nbsp;for 1</li></span>
		 
		 </div>
		 <div class="img-fluid pb-1" style="padding:20px;">
		 <h3><?php echo"(" .$res['fuelname'].")"?></h3>
		 </div>
		 </div>
		 
	  </div>

	<?php
	  }
	?>
	</div>
	
	</div>
	
	</div>
   
    
  </div>
</div>
 
 <!-- container 2 ends -->

   <!-- container 3 starts -->
<div class="container-fluid">
     <div class="row"><!--main row-->
          <div class="img-fluid pb-1"><!--main row 2 left-->
	          
	            <div class="container-fluid rounded" style="border:solid 1px #F0F0F0;"><!--product container-->
	                  <?php
	                        $fuel_id=$arr[14];
	                        $query=mysqli_query($con,"select vendor.fld_email,vendor.fld_name,vendor.fld_mob,
	                        vendor.fld_phone,vendor.fld_address,vendor.fld_logo,fuel.fuel_id,fuel.fuelname,fuel.cost,
	                        fuel.quantity,fuel.paymentmode,fuel.fldimage from vendor inner join
	                        fuel on vendor.fldvendor_id=fuel.fldvendor_id where fuel.fuel_id='$fuel_id'");
	                             while($res=mysqli_fetch_assoc($query))
	                                  {
		                                 $hotel_logo= "images/".$res['fld_email']."/".$res['fld_logo'];
		                                 $food_pic= "images/".$res['fld_email']."/foodimages/".$res['fldimage'];
	                                   ?>
	                                      <div class="container-fluid">
	                                          <div class="container-fluid"><!--product row container 1-->
	                                               <div class="row" style="padding:10px; ">
		                            <!--hotel logo-->  <div class="img-fluid pb-1"><img src="<?php echo $hotel_logo; ?>" class="rounded-circle" height="50px" width="50px" alt="Cinque Terre"></div>
		                                               <div class="img-fluid pb-1">
		                            <!--hotelname-->        <span style="font-family: 'Miriam Libre', sans-serif; font-size:28px;color:#CB202D;"><?php echo $res['fld_name']; ?></span>
                                                       </div>
		                            <!--ruppee-->      <div class="img-fluid pb-1"><i  style="font-size:20px;" class="fas fa-rupee-sign"></i>&nbsp;<span style="color:green; font-size:25px;"><?php echo $res['cost']; ?></span></div>
									                   <form method="post">
		                         <!--add to cart-->    <div class="img-fluid pb-1" style="text-align:left;padding:10px; font-size:25px;"><button type="submit"  name="addtocart" value="<?php echo $res['fuel_id'];?>"><span style="color:green;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button></div>
		                                               </form>
													</div>
		 
	                                           </div>
	                                           <div class="container-fluid"><!--product row container 2-->
	                                                <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		                           <!--food Image-->     <div class="img-fluid pb-1"><img src="<?php echo $food_pic; ?>" class="rounded" height="250px" width="100%" alt="Cinque Terre"></div>
		 		                                    </div>
	                                            </div>
	                                            <div class="container-fluid"><!--product row container 3-->
	                                                 <div class="row" style="padding:10px; ">
		                                                 <div class="img-fluid pb-1">
		                               <!--cuisine-->          <span><li><?php echo $res['quantity']; ?></li></span>
		                                <!--cost-->            <span><li><?php echo "Rs".$res['cost']; ?>&nbsp;for 1</li></span>
		                                <!--deliverytime--> 
		                                                 </div>
		                            <!--deliverytime-->  <div class="img-fluid pb-1" style="padding:20px;"><h3><?php echo"(" .$res['fuelname'].")"?></h3></div>
		                                               </div>
		 
	                                             </div>
	
	
	                                   <?php
	                                     }
	                                    ?>
	                                        </div>
		        </div> 
	   </div>
 
 <!-- container 3 ends -->
  <!-- container 4 starts -->
<div class="img-fluid pb-1">
	
	<div class="container-fluid rounded" style="border:solid 1px #F0F0F0;">
	
	  <?php
	  $fuel_id=$arr[15];
	  $query=mysqli_query($con,"select vendor.fld_email,vendor.fld_name,vendor.fld_mob,
	  vendor.fld_phone,vendor.fld_address,vendor.fldvendor_id,vendor.fld_logo,fuel.fuel_id,fuel.fuelname,fuel.cost,
	  fuel.quantity,fuel.paymentmode,fuel.fldimage from vendor inner join
	  fuel on vendor.fldvendor_id=fuel.fldvendor_id where fuel.fuel_id='$fuel_id'");
	  while($res=mysqli_fetch_assoc($query))
	  {
		   $hotel_logo= "images/".$res['fld_email']."/".$res['fld_logo'];
		   $food_pic= "images/".$res['fld_email']."/foodimages/".$res['fldimage'];
	  ?>
	  <div class="container-fluid">
	  <div class="container-fluid">
	     <div class="row" style="padding:10px; ">
		      <div class="img-fluid pb-1"><img src="<?php echo $hotel_logo; ?>" class="rounded-circle" height="50px" width="50px" alt="Cinque Terre"></div>
		      <div class="img-fluid pb-1">
		                     <a href="search.php?vendor_id=<?php echo $res['fldvendor_id']; ?>"><span style="font-family: 'Miriam Libre', sans-serif; font-size:28px;color:#CB202D;">
		 <?php echo $res['fld_name']; ?></span></a>
        </div>
		 <div class="img-fluid pb-1"><i  style="font-size:20px;" class="fas fa-rupee-sign"></i>&nbsp;<span style="color:green; font-size:25px;"><?php echo $res['cost']; ?></span></div>
		 <form method="post">
		 <div class="img-fluid pb-1" style="text-align:left;padding:10px; font-size:25px;"><button type="submit" name="addtocart" value="<?php echo $res['fuel_id']; ?>")" ><span style="color:green;" <i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button></div>
		 <form>
		 </div>
		 
	  </div>
	  <div class="container-fluid">
	  <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		 <div class="img-fluid pb-1"><img src="<?php echo $food_pic; ?>" class="rounded" height="250px" width="100%" alt="Cinque Terre"></div>
		 
		 </div>
	  </div>
	  <div class="container-fluid">
	     <div class="row" style="padding:10px; ">
		 <div class="img-fluid pb-1">
		 <span><li><?php echo $res['quantity']; ?></li></span>
		 <span><li><?php echo "Rs ".$res['cost']; ?>&nbsp;for 1</li></span>
		 
		 </div>
		 <div class="img-fluid pb-1" style="padding:20px;">
		 <h3><?php echo"(" .$res['fuelname'].")"?></h3>
		 </div>
		 </div>
		 
	  </div>

	<?php
	  }
	?>
	</div>
	
	</div>
	
	</div>
   
    
  </div>
</div>
 
 <!-- container 4 ends -->
	 
 





	    <?php
			include("includes/footer.php");
			?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
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