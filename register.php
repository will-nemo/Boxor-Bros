<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<title>Create Account</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
    

<div class="w3-bar w3-theme w3-large">
  <a href="home.php" class="w3-bar-item"> <img src="logo_transparent_background-2.png" style=" width:  80px; height: 80px;"></a>
  <a method="GET" href="boxer_display.php?query=SELECT%20*%20FROM%20merch%20WHERE%20type%20LIKE%20'%Boxer%'" class="w3-bar-item w3-button w3-hover-white" style="margin-top:30px;">Boxers  
     </a>
    
     
     <a  method="GET" href="boxer_display.php?query=SELECT%20*%20FROM%20merch%20WHERE%20type%20LIKE%20'%Custom%'" class="w3-bar-item w3-button w3-hover-white" style="margin-top:30px;">Custom</a>
         
   <a  method="GET" href="boxer_display.php?query=SELECT%20*%20FROM%20merch%20WHERE%20type%20LIKE%20'%Extra%'" class="w3-bar-item w3-button w3-hover-white" style="margin-top:30px;">Extras</a>
    
  <button  class="w3-bar-item w3-button w3-right" href="#" onclick="w3_open2()" style="margin-top:20px;"><i class="fa fa-shopping-cart" onclick="w3_open2()" ></i></button>
 
    <form action="login.php">
    <button href="javascript:void(0)" class="w3-bar-item w3-button w3-hover-white w3-right" style="font-size:10px; margin-top:30px;">Login/Create Account</button>  
    </form>
    
    <button  class="w3-bar-item w3-button w3-right" href="#" onclick="w3_open1()" style="margin-top:20px;"><i class="fa fa-search" onclick="w3_open1()" ></i></button>
</div>
    
 <div class="w3-sidebar w3-bar-block w3-animate-right" style="display:none; right:0; z-index:5;" id="mySidebar">
        <p>Search for the name of a product</p>
    <?php
        
        echo'<form method="post"><input  type="text" name="merch">';
        
        echo '<input method="GET" class="w3-margin w3-blue w3-btn w3-center" type="submit" name="searchsubmit" value="Search" ></input></form>';  
            if(isset($_POST['searchsubmit'])){
                $named = $_POST['merch'];
            
                header("Location: boxer_display.php?search=$named");
    
            }
        ?>
    </div>

<div class="w3-sidebar w3-bar-block w3-animate-right" style="display:none; right:0; z-index:5; width:30%" id="cartSidebar">
    <button class="w3-bar-item  w3-margin w3-button w3-large" onclick="w3_close2()"><i class="fa fa-arrow-left"></i></button>
    <p class="w3-align-right w3-display-topleft" style="margin-left:90px;">Your Cart</p>
    
    <form action="file:///C:/Users/wjl13/Desktop/Will/School/2018%20Spring/COP4813/Term%20Project/checkout.html">
      <button class="w3-display-topright w3-button w3-blue w3-margin" style="font-size:10px;">Checkout</button>
    </form>
    
    
    <div class="w3-row w3-ul w3-card w3-margin">
        <li class="w3-display-container">
        <div class="w3-half w3-container">
            <img src="IMG_7221.JPG" style="height:100px; width:100px;">
        </div>
        <div class="w3-half w3-container w3-display-container w3-center">
            <div class="w3-display-topleft" style="font-size:16px;"><p >Pink Boxers Broski</p>
            <p style="font-size:10px; padding-top:30px;" class="w3-display-left">&#36;49.99</p>
            <p style="font-size:10px; padding-top:30px;" class="w3-display-right">Quantity: 1</p>
            </div>
        </div>
        <span  onclick="this.parentElement.style.display='none'" class="w3-button w3-transparent w3-display-right">&times;</span></li>
    </div>
     <div class="w3-row w3-ul w3-card w3-margin">
        <li class="w3-display-container">
        <div class="w3-half w3-container">
            <img src="IMG_7221.JPG" style="height:100px; width:100px;">
        </div>
        <div class="w3-half w3-container w3-display-container w3-center">
            <div class="w3-display-topleft" style="font-size:16px;"><p >Pink Boxers Broski</p>
            <p style="font-size:10px; padding-top:30px;" class="w3-display-left">&#36;49.99</p>
            <p style="font-size:10px; padding-top:30px;" class="w3-display-right">Quantity: 1</p>
            </div>
        </div>
        <span  onclick="this.parentElement.style.display='none'" class="w3-button w3-transparent w3-display-right">&times;</span></li>
    </div>
    <div class="w3-row w3-ul w3-card w3-margin">
        <li class="w3-display-container">
        <div class="w3-half w3-container">
            <img src="IMG_7221.JPG" style="height:100px; width:100px;">
        </div>
        <div class="w3-half w3-container w3-display-container w3-center">
            <div class="w3-display-topleft" style="font-size:16px;"><p >Pink Boxers Broski</p>
            <p style="font-size:10px; padding-top:30px;" class="w3-display-left">&#36;49.99</p>
            <p style="font-size:10px; padding-top:30px;" class="w3-display-right">Quantity: 1</p>
            </div>
        </div>
        <span  onclick="this.parentElement.style.display='none'" class="w3-button w3-transparent w3-display-right">&times;</span></li>
    </div>

</div>
    
    
    
<div class="w3-overlay w3-animate-opacity" onclick="w3_close1()" style="cursor:pointer" id="myOverlay"></div>
<div class="w3-overlay w3-animate-opacity" onclick="w3_close2()" style="cursor:pointer" id="cartOverlay"></div>


<script>
function w3_open1() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close1() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
function w3_open2() {
    document.getElementById("cartSidebar").style.display = "block";
    document.getElementById("cartOverlay").style.display = "block";
}
function w3_close2() {
    document.getElementById("cartSidebar").style.display = "none";
    document.getElementById("cartOverlay").style.display = "none";
}
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-blue";
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-blue", "");
    }
}
    
</script>

<!-- THIS IS THE CODE THAT CHANGES FOR EACH PAGE-->
    
 <div class="w3-display-container w3-margin" style="text-align:center">
    <img src="logo_transparent_background-2.png" border="0" alt="logo" style="width:20%; height:20%; padding-top: 25px;padding-left: 25px;padding-right: 25px; ">
  </div> 
    
    
<form method="post" action="register.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">

    <h2 class="w3-center"></h2>

    <?php include('errors.php'); ?>
    
    
    <div class = "w3-row w3-section">
     <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
        <div class="w3-rest">
        <input class="w3-input w3-border" name="last" type="text" placeholder="Name">
        </div>
    </div>
    
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="email" type="text" placeholder="Email">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="password" type="text" placeholder="Password">
    </div>
</div>


<button type="submit" name="register" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Register</button>

    </form>
<!-- THIS CODE ENDS HERE-->  
    

</body>
</html>