<!DOCTYPE html>
<html>
<title>Boxor Bros - Processing</title>
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
 
   <?php 
    $servername = "dbsrv2.cs.fsu.edu";
    $dbname = "wlambertdb";
    $username = "wlambert";
    $password = ".qt,m5^d96nKFDF&";
    $flag = 0;
    
    // Create connection to the server
    $conn = new mysqli($servername, $username, $password, $dbname);                                        
    
    //check connection                                        
   if ($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }
        
     $mysqlqq = "SELECT * FROM users";
        
        $records100 = $conn->query($mysqlqq);
       
    
            if($records100->num_rows > 0){ 
            while($row = $records100->fetch_assoc()){
                if(strcmp("YES", $row['status']) == 0){
                    $flag = 1;
                    
                }
            }
         }else{
           echo '<p>You need to be logged in</p>';  
         }
    
         
    
        if($flag == 0){
           echo' <form action="login.php">
            <button href="javascript:void(0)" class="w3-bar-item w3-button w3-hover-white w3-right" style="font-size:10px; margin-top:30px;">Login/Create Account</button>  
            </form>';   
        }else if($flag == 1){  
             echo' <form action="account_info.php"> <button class="w3-bar-item w3-button w3-hover-white w3-right" href="account_info.php"  style="margin-top:20px;"><i class="fa fa-user-circle"><a href="account_info.php"></a></i><a href="account_info.php"></a></button></form>';
        }
    ?>
    
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
    
    <form action="checkout.php">
      <button class="w3-display-topright w3-button w3-blue w3-margin" style="font-size:10px;">Checkout</button>
    </form>
    
    <p style="font-size:24px" class="w3-display-middle">Cart is Empty</p>
    

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
    
    <div class="w3-panel w3-green w3-display-container">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-green w3-large w3-display-topright">&times;</span>
  <h3>Success!</h3>
  <p>You should see your order in 2-3 Business Days.</p>
</div>
    
     <div class="w3-display-container w3-margin" style="text-align:center">
    <img src="IMG_0208.PNG" border="0" alt="logo" style="width:15%; height:15%; padding-top: 25px;padding-left: 25px;padding-right: 25px; ">
  </div> 
    
     <div class="w3-display-container w3-margin" style="">
        <h1 style="padding-left:100px; font-size:32px;">Order is Being Shipped!</h1>
    </div> 
    
          <?php     

    $servername = "dbsrv2.cs.fsu.edu";
    $dbname = "wlambertdb";
    $username = "wlambert";
    $password = ".qt,m5^d96nKFDF&";
    
    
    // Create connection to the server
    $conn = new mysqli($servername, $username, $password, $dbname);                                        
    
    //check connection                                        
   if ($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }
    
     $mysqlq = "SELECT * FROM users";
        $userID;
        $merch1;
        $merch2;
        $merch3;
        $merch4;
        $total;
    
        $records1 = $conn->query($mysqlq);
       
    
         if($records1->num_rows > 0){ 
            while($row = $records1->fetch_assoc()){
                if(strcmp("YES", $row['status']) == 0){
                    $userID = $row['Email'];
                }
            }
         }else{
           echo '<p>You need to be logged in</p>';  
         }
       
    $search_now = "SELECT * FROM cart";
    $Records = $conn->query($search_now);
    
    if($Records->num_rows > 0){ 
            while($row = $Records->fetch_assoc()){
                if(strcmp($userID, $row['Email']) == 0){
                    $merch1 = $row['merch01'];
                    $merch2 = $row['merch02'];
                    $merch3 = $row['merch03'];
                    $merch4 = $row['merch04'];
                    $merch5 = $row['mmerch05'];
                    $total = $row['total'];
                }
            }
         }else{
           echo '<p>You need to be logged in</p>';  
    }
        
        $find_now = "SELECT * FROM merch";
    $Recordsf = $conn->query($find_now);

    
    if($Recordsf->num_rows > 0){ 
          
            while($row = $Recordsf->fetch_assoc()){ 
                if(strcmp($merch1, $row['name']) == 0){
                
      
                echo '<div class="w3-row w3-ul w3-card w3-margin">';            
                    echo'<li class="w3-display-container">
                        <div class="w3-half w3-container">
                            <img src=" '.$row["IMG"].' " style="height:100px; width:100px;">
                        </div>';
                   
                    echo'<div class="w3-half w3-container w3-display-container w3-center">
                    <div class="w3-display-topleft" style="font-size:16px;">
                        <p>'.$row["name"].'</p>';
                      
            echo'<p style="font-size:10px; padding-top:30px;" class="w3-display-left">&#36;'.$row["price"].'</p>';
                
                echo '</div>';        
                echo'</div>';
                    
     ?>  
                   
                
            <?php                                                                                                         
                                                                                                                            
                echo '</div>';
                    
                              }  
                  if(strcmp($merch2, $row['name']) == 0){
                
                echo '<div class="w3-row w3-ul w3-card w3-margin">';            
                    echo'<li class="w3-display-container">
                        <div class="w3-half w3-container">
                            <img src=" '.$row["IMG"].' " style="height:100px; width:100px;">
                        </div>';
                   
                    echo'<div class="w3-half w3-container w3-display-container w3-center">
                    <div class="w3-display-topleft" style="font-size:16px;">
                        <p>'.$row["name"].'</p>';
                      
            echo'<p style="font-size:10px; padding-top:30px;" class="w3-display-left">&#36;'.$row["price"].'</p>';
                
                echo '</div>';        
                echo'</div>';
                    
     ?>  
            <?php                                                                                                         
                                                                                                                            
                echo '</div>';
                    
                } if(strcmp($merch3, $row['name']) == 0){
                
                echo '<div class="w3-row w3-ul w3-card w3-margin">';            
                    echo'<li class="w3-display-container">
                        <div class="w3-half w3-container">
                            <img src=" '.$row["IMG"].' " style="height:100px; width:100px;">
                        </div>';
                   
                    echo'<div class="w3-half w3-container w3-display-container w3-center">
                    <div class="w3-display-topleft" style="font-size:16px;">
                        <p>'.$row["name"].'</p>';
                      
            echo'<p style="font-size:10px; padding-top:30px;" class="w3-display-left">&#36;'.$row["price"].'</p>';
                
                echo '</div>';        
                echo'</div>';
                    
     ?>  
                    
                
            <?php                                                                                                         
                                                                                                                            
                echo '</div>';
                    
                }     if(strcmp($merch4, $row['name']) == 0){
                
                echo '<div class="w3-row w3-ul w3-card w3-margin">';            
                    echo'<li class="w3-display-container">
                        <div class="w3-half w3-container">
                            <img src=" '.$row["IMG"].' " style="height:100px; width:100px;">
                        </div>';
                   
                    echo'<div class="w3-half w3-container w3-display-container w3-center">
                    <div class="w3-display-topleft" style="font-size:16px;">
                        <p>'.$row["name"].'</p>';
                      
            echo'<p style="font-size:10px; padding-top:30px;" class="w3-display-left">&#36;'.$row["price"].'</p>';
                
                echo '</div>';        
                echo'</div>';
                    
     ?>  
                    
                
            <?php                                                                                                         
                                                                                                                            
                echo '</div>';
                    
                }   
                
            }
            
    
         }else{
           echo '<p>You need to be logged in</p>';  
        }
        
    
    
    
   
  
          $servername = "dbsrv2.cs.fsu.edu";
    $dbname = "wlambertdb";
    $username = "wlambert";
    $password = ".qt,m5^d96nKFDF&";
    
    
    // Create connection to the server
    $conn = new mysqli($servername, $username, $password, $dbname);                                        
    
    //check connection                                        
   if ($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }
        
     $mysqlqq = "SELECT * FROM users";
    
        $userNamed;
        
        $records10 = $conn->query($mysqlqq);//
       
    
         if($records10->num_rows > 0){ 
            while($row = $records10->fetch_assoc()){
                if(strcmp("YES", $row['status']) == 0){
                    $userNamed = $row['Email'];
                }
            }
         }else{
           echo '<p>You need to be logged in</p>';  
         }
        
        $mysqlq2 = "SELECT * FROM cart";
        $records2 = $conn->query($mysqlq2);
        
        

        
        $total = 0;
        
        $query = "UPDATE cart SET merch02 = '' WHERE Email = '$userNamed'";
        
        $results1 = $conn->query($query);

        $query0 = "UPDATE cart SET merch01 = '' WHERE Email = '$userNamed'";
        
        $results0 = $conn->query($query0);
    
        $query3 = "UPDATE cart SET merch03 = '' WHERE Email = '$userNamed'";
        
        $results3 = $conn->query($query3);
    
        $query4 = "UPDATE cart SET merch04 = '' WHERE Email = '$userNamed'";
        
        $results4 = $conn->query($query4);
        
        $query2 = "UPDATE cart SET total = '$total' WHERE Email = '$userNamed'";
        
          $results2 = $conn->query($query2);
    
  
    
    
    
    ?>
    <br>
    <br>
    


<!-- THIS CODE ENDS HERE-->  
    
<footer class="w3-container w3-teal">
    <p class="w3-right">Contact us</p>
    </footer>
</body>
</html>