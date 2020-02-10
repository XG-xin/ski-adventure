<?php
include('connect.php');
include('check.php');

if( isset($_SESSION['login']) === false) 
{ 
    ?>
    <a href="login.php">go to login page</a>
    <?php    
    die('need to login');
}

$userid= $_SESSION['login'];
$sql = "select * from account where userid = {$userid};" ; 
 $rows = [];
$mysqli_result =$db->query($sql);
if($mysqli_result == false){
    echo "SQL fail";
    exit;
}
while ($row = $mysqli_result ->fetch_array( MYSQLI_ASSOC)){
     
     $rows[$row['userid']]= $row; 
}



?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>baibook</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="assets/css/3-Columns-Info-Icons.css">
    <link rel="stylesheet" href="assets/css/account.css">
    <link rel="stylesheet" href="assets/css/buy.css">
    <link rel="stylesheet" href="assets/css/Call-to-Action-Div-with-Icon-Header--Button.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="stylesheet" href="assets/css/footer-1.css">
    
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/OcOrato---Login-form.css">
    <link rel="stylesheet" href="assets/css/OcOrato---Login-form1.css">
    <link rel="stylesheet" href="assets/css/orders.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form1.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="assets/css/search.css">
    <link rel="stylesheet" href="assets/css/sell-item.css">
    <link rel="stylesheet" href="assets/css/sell.css">
    <link rel="stylesheet" href="assets/css/sign-log-form-1.css">
    <link rel="stylesheet" href="assets/css/sign-log-form.css">
    <link rel="stylesheet" href="assets/css/signup.css">
    
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>

<body class="marble-bg">
<div>
<nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean-button">
            <div class="container"><a class="navbar-brand" href="#"><img src="assets/img/logo.png" id="logo"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">HOME</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="search.php">SEARCH</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="sell.php">SELL</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="buy_short.php">BUY</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="contact.php">CONTACT US</a></li>
                    </ul>
                    <?php
                    if( isset($_SESSION['user']) === false) 
                     {
                    ?>   
                     <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="login.php">Log In</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link signup-button" href="signup.php" role="button">Sign Up</a></li>
                    </ul>
                    <?php
                    }else{
                    $username = $_SESSION['user'];
                    ?>
                    
                 

                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#"><?php echo $username; ?></a></li>
                        
                        
                        <li class="dropdown nav-item"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Account</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="profile.php">Profile</a><a class="dropdown-item" role="presentation" href="manage.php">Selling</a><a class="dropdown-item" role="presentation" href="orderview.php">Orders</a>
                            <a class="dropdown-item" role="presentation" href="logout.php">Log Out</a>
                            </div>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="cart.php">Cart</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link signup-button" href="signup.php" role="button">Sign Up</a></li>
                    </ul>
                    <?php
                    }
                    ?>
                    
            </div>
    </div>
    </nav>
    </div>
    <div class="mx-auto contact-form">
        <h3>Contact Information</h3>
        <form action="profilesave.php" method="POST" enctype="multipart/form-data">
        <?php

foreach( $rows as $row){

?>   
            <div class="form-row contact-row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group"><label>First Name</label><input class="form-control" type="text" name="firstname" value="<?php echo $row['Firstname'];?>"></div>
                    <div class="form-group"><label>Last Name</label><input class="form-control" type="text" name="lastname" value="<?php echo $row['lastname'];?>"></div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group"><label>Phone Number</label><input class="form-control" type="tel" name="phone" value="<?php echo $row['phone'];?>"></div>
                    <div class="form-group"><label>Email</label><input class="form-control" type="email" name="email" value="<?php echo $row['email2'];?>"></div>
                </div>
            </div>
        
        <hr class="profile-line">
    </div>
    <div class="mx-auto address-form">
        <h3>Shipping Address</h3>
        
            <div class="form-row contact-row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group"><label>Street</label><input class="form-control" type="text" name="street" required="" value="<?php echo $row['street'];?> "></div>
                    <div class="form-group"><label>City</label><input class="form-control" type="text" required="" name="city" value="<?php echo $row['city'];?>"></div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group"><label>State</label><input class="form-control" type="text" name="state" required="" value="<?php echo $row['state'];?>"></div>
                    <div class="form-group"><label>Zip</label><input class="form-control" type="tel" name="zipcode"  required="" value="<?php echo $row['zipcode'];?>"></div>
                </div>
            </div>
            <hr class="profile-line">
        
    </div>
    <div class="mx-auto pass-form">
        <h3>Password Update</h3>
        
            <div class="form-row contact-row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group"><label>New Password</label><input class="form-control" type="password" name="pwd" value="<?php echo $row['pwd'];?>"></div>
                    <div class="form-group"><label>Confirmed Password</label><input class="form-control" type="password" name="pwd2" value="<?php echo $row['pwd'];?>"></div>
                </div>
            </div>
            <?php
}
?>
            <hr class="profile-line"><button type="submit" name="btn" class="btn btn-warning float-right save-bt" >SAVE</button></form>


            
    </div>
    
    <div class="footer-2">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6">
                    <p class="text-left" style="margin-top:5%;margin-bottom:3%;">BAIBOOK © 2019</p>
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                    <p class="text-right" style="margin-top:5%;margin-bottom:8%%;font-size:1em;">Privacy Policy</p>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
</body>

</html>