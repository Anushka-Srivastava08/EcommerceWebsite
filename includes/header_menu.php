<?php
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
	shuffle($arr);
}

//print_r($arr);

/*echo $addtocart;
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
 */
 
 if(isset($login))
 {
	 header("location:form/index.php");
 }
 if(isset($logout))
 {
	 session_destroy();
	 header("location:index.php");
 }
 $query=mysqli_query($con,"select fuel.fuelname,fuel.fldvendor_id,fuel.cost,fuel.quantity,fuel.fldimage,cart.fld_cart_id,cart.fld_product_id,cart.fld_customer_id from fuel inner  join cart on fuel.fuel_id=cart.fld_product_id where cart.fld_customer_id='$cust_id'");
  $re=mysqli_num_rows($query);

?>

<!--Navigation bar start-->
<nav class="navbar fixed-top navbar-expand-sm navbar-dark" style="background-color:rgba(0,0,0,0.5)">
            <div class="container">
                    <a href="index.php" class="navbar-brand" style="font-family: 'shareware'">Desi Stop</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="nav navbar-nav">
                       <li class="nav-item dropdown">
                           <a href="products.php" class="nav-link dropdown-toggle" id="navbar-drop" data-toggle="dropdown">
                               Products
                            </a>
                               <div class="dropdown-menu">
                                   <a href="products.php#clothes" class="dropdown-item">Clothes</a>
                                   <a href="handicrafts.php" class="dropdown-item">Home Decor</a>
                                   <a href="homedecor.php" class="dropdown-item">Food and Beverages</a>
                                   <a href="food.php" class="dropdown-item">Handicrafts</a>
                               </div>
                           
                       </li>
                       <li class="nav-item"><a href="support.php" class="nav-link">Support</a></li>
                       <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
                       <li class="nav-item"><a href="about.php#contact" class="nav-link">Contact Us</a></li>&nbsp;&nbsp;
                       <button class="btn btn-info" onclick="location.href='vendor_login.php'" style="height:40px;width:80px">Vendor</button>
                    </ul>
                    
                    
                 
                    <ul class="nav navbar-nav ml-auto">
                       <li class="nav-item">
		  <form method="post">
          <?php
			if(empty($cust_id))
			{
			?>
			<a href="form/index.php?msg=you must be login first"><span style="color:white; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:black;" id="cart"  class="badge badge-light">0</span></i></span></a>
			
			&nbsp;&nbsp;&nbsp;
			<button class="btn btn-info" name="login" type="submit">Log In</button>&nbsp;&nbsp;&nbsp;
            <?php
			}
			else
			{
			?>
			<a href="form/cart.php"><span style=" color:white; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:black;" id="cart"  class="badge badge-light"><?php if(isset($re)) { echo $re; }?></span></i></span></a>
			<button class="btn btn-info" name="logout" type="submit">Log Out</button>&nbsp;&nbsp;&nbsp;
			<?php
			}
			?>
			</form>
        </li>
                    </ul>
                   
                    </div>
                </div>
            </div>
        </nav>
    <!--navigation bar end-->
    
    