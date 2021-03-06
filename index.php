<?php
require("includes/common.php");

if (isset($_SESSION['email'])) {
    header('location: products.php');
}
?>

<!DOCTYPE html>
<!--

-->
<html>
    <head>
      
        
        <meta charset="UTF-8">
        <title>Secret Store</title>
         <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="bootstrap/js/jquery-3.5.0.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="css/style.css"/>

    </head>
    <body>
        <?php
        include 'includes/header.php';
        ?>
        <div id="banner-image">
           <div class="container">
               <center>
               <div id="banner_content">
                   <h1><b>Electronic Secret World</b></h1>
                   <p><b>40% OFF on premium brands. Valid until 02/2022</b></p>
                   <a href="login.php" target="_blank"> <button class="btn btn-danger btn-lg active"><b>Shop Now</b> </button></a>
                   
               </div>
                </center>
           </div>
       
       </div><br><br>
        
        
        
         <div class="container">
             <div class="row text-center">               
                 <div class="col-md-4 col-sm-7"> 
                     <div class="thumbnail">
            <a href="#">
                <image src="img/watches.jpg"/>
             <div class="caption">
                 <h2>Watches</h2>
                 <p>Original watches from the best brand.</p>
             </div>
            </a>
                         </div>
        </div>

        <div class="col-md-4 col-sm-7"> 
                     <div class="thumbnail">
            <a href="#">
             <image src="img/Cameras.jpg"/>
             <div class="caption">
                 <h2>Cameras</h2>
                 <p>Choose among the best available in the world.</p>
             </div>
            </a>
                     </div>
        </div>

        <div class="col-md-4 col-sm-7"> 
                     <div class="thumbnail">
            <a href="#">
             <image src="img/shirts.jpg"/>
             <div class="caption">
                 <h2>Shirts</h2>
                 <p>Our exquisite collection of shirts.</p>
             </div>
            </a>
                     </div>
        </div>
 
             </div>
         </div><br><br><br><br>
         
      
                
        
       <footer class="fo">
           <div class="container">
               <center>
                   <p>Copyright <small>&copy;</small> Secret Store | All Rights Reserved | Service Number: +30 6983871852 | Shop Address: Solonos 5 - Volos - Greece</p>
                   <p>
                      <a href="https://www.instagram.com/user" target="_blank">
                          <img src="img\instagram2.png" alt="Instagram" />
                      </a>
                      <a href="https://www.facebook.com/user" target="_blank">
                          <img src="img\facebook.png" alt="Facebook" />
                      </a>
                      <a href="https://www.twitter.com/user" target="_blank">
                          <img src="img\twitter.png" alt="Twitter" />
                      </a>
                  </p>
               </center>
           </div>
           
           
       </footer>
        
        
    </body>
</html>
