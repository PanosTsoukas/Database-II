<?php
include "includes/common.php";

if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<!--

-->
<html>
    <head>
               
        <meta charset="UTF-8">
        <title>Secret Store | Products</title>
         <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="bootstrap/js/jquery-3.5.0.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="css/style.css"/>
    <style>
      .center {
            position: absolute;
            top: 32%;
            width: 100%;
            text-align: center;
            font-size: 15px;
      }
      .order2 {
          position: absolute;
          top: 36%;
          text-align: center;
          right: 600px;
          width: 100%;
          font-size: 16px;
      }

    </style>
    </head>
    <body>
        <?php
        include 'includes/header.php';
        include 'includes/check-if-added.php';
        ?>
        
        <br><br><br><br><br>
        <div class="container">
            
            <div class="jumbotron">
                <h1>Welcome to our Secret Store!</h1>
                <p>We have the best cameras,watches and shirts for you. No need to hunt around, we have all in one place.</p>
                
            </div>
             
        </div>
        <div class="order2">
          <form method="post" action="">
            <select name="sort" onchange="this.form.submit()">
                <option value="" disabled selected>Order by ...</option>
                <option value="price_asc">Price ascending</option>
                <option value="price_desc">Price descending</option>
                <option value="product_name_asc">Product Name ascending</option>
                <option value="product_name_desc">Product Name descending</option>
                <!--<option value="name">Product Name</option>-->
                <!--<option value="price">Price</option>-->                
            </select>

            <input type="submit" name="submit" value="Order by">
            </form>
      </div>
            <div class="center">
              <form action="" method="post">
                <input type="text" name="search" placeholder="Search">
                <input type ="Submit" name="Submit">
              </form>
            </div>
            <?php

            if(isset($_POST['Submit'])){
              if(!empty($_POST['search'])) {
                $con = mysqli_connect("localhost", "root", "", "Online Shop") or die(mysqli_error($con));
                $search = mysqli_real_escape_string($con,$_POST['search']);
                $keys = explode(" ",$search);
                $sql = "SELECT * from items where name like '%$search%'";
                
                foreach($keys as $k){
                  $sql .= " OR name LIKE '%$k%' ";
                }

                $result = mysqli_query($con,$sql);
                
                if(mysqli_num_rows($result) > 0){

                  while($row = mysqli_fetch_array($result)) {?>
                  <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                    <form method="get" action="products.php?id=<?=$row['id'] ?>">
                      <img src="img2\<?= $row['id'] ?>.jpg" alt="Responsive image">
                      <div class="caption">
                      <h5><?= $row['name']; ?></h5>
                      <h5>€<?= number_format($row['price'],2) ?></h5>
                      <?php 
                  
                          if (check_if_added_to_cart($row['id'])) { 
                          echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                          } else {
                                                  ?>
                          <a href="cart-add.php?id=<?= $row['id'] ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                          <?php
                          }
                      ?>
                      </div>
                    </form>
                    </div>
                  </div>

                <?php }
                } else{
                    echo "No records matching your query were found.";
                }

                //$con->close();
              }else {
                echo 'Search Field Empty';
              }
            }else if(isset($_POST['submit'])){
              if(!empty($_POST['sort'])) {
                $selected = $_POST['sort'];

                /* Attempt MySQL server connection. Assuming you are running MySQL
                server with default setting (user 'root' with no password) */
                $con = mysqli_connect("localhost", "root", "", "Online Shop") or die(mysqli_error($con));
                 
                // Check connection
                if($con === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }
                if($selected == 'price_asc'){ 
                  // Attempt select query execution with order by clause
                  $sql = "SELECT * FROM items ORDER BY price ASC";
                  if($result = mysqli_query($con, $sql)){
                      if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){?>
                            <div class="col-md-3 col-sm-6">
                              <div class="thumbnail">
                              <form method="get" action="products.php?id=<?=$row['id'] ?>">
                                <img src="img2\<?= $row['id'] ?>.jpg" alt="Responsive image">
                                <div class="caption">
                                <h5><?= $row['name']; ?></h5>
                                <h5>€<?= number_format($row['price'],2) ?></h5>
                                <?php 
                            
                                    if (check_if_added_to_cart($row['id'])) { 
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                    } else {
                                                            ?>
                                    <a href="cart-add.php?id=<?= $row['id'] ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                    }
                                ?>
                                </div>
                              </form>
                              </div>
                            </div>
              
                            <?php }
                          // Close result set
                          //mysqli_free_result($result);
                      }
                  }
                }else if($selected == 'price_desc'){
                  // Attempt select query execution with order by clause
                  $sql = "SELECT * FROM items ORDER BY price DESC";
                  if($result = mysqli_query($con, $sql)){
                      if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){?>
                            <div class="col-md-3 col-sm-6">
                              <div class="thumbnail">
                              <form method="get" action="products.php?id=<?=$row['id'] ?>">
                                <img src="img2\<?= $row['id'] ?>.jpg" alt="Responsive image">
                                <div class="caption">
                                <h5><?= $row['name']; ?></h5>
                                <h5>€<?= number_format($row['price'],2) ?></h5>
                                <?php 
                            
                                    if (check_if_added_to_cart($row['id'])) { 
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                    } else {
                                                            ?>
                                    <a href="cart-add.php?id=<?= $row['id'] ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                    }
                                ?>
                                </div>
                              </form>
                              </div>
                            </div>
              
                            <?php }
                          // Close result set
                          //mysqli_free_result($result);
                      }
                  }
                }else if($selected == 'product_name_asc'){
                  // Attempt select query execution with order by clause
                  $sql = "SELECT * FROM items ORDER BY name ASC";
                  if($result = mysqli_query($con, $sql)){
                      if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){?>
                            <div class="col-md-3 col-sm-6">
                              <div class="thumbnail">
                              <form method="get" action="products.php?id=<?=$row['id'] ?>">
                                <img src="img2\<?= $row['id'] ?>.jpg" alt="Responsive image">
                                <div class="caption">
                                <h5><?= $row['name']; ?></h5>
                                <h5>€<?= number_format($row['price'],2) ?></h5>
                                <?php 
                            
                                    if (check_if_added_to_cart($row['id'])) { 
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                    } else {
                                                            ?>
                                    <a href="cart-add.php?id=<?= $row['id'] ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                    }
                                ?>
                                </div>
                              </form>
                              </div>
                            </div>
              
                            <?php }
                          //mysqli_free_result($result);
                      }
                  }
                }else if($selected == 'product_name_desc'){
                  // Attempt select query execution with order by clause
                  $sql = "SELECT * FROM items ORDER BY name DESC";
                  if($result = mysqli_query($con, $sql)){
                      if(mysqli_num_rows($result) > 0){
                                
                        while($row = mysqli_fetch_array($result)){?>
                        <div class="col-md-3 col-sm-6">
                          <div class="thumbnail">
                          <form method="get" action="products.php?id=<?=$row['id'] ?>">
                            <img src="img2\<?= $row['id'] ?>.jpg" alt="Responsive image">
                            <div class="caption">
                            <h5><?= $row['name']; ?></h5>
                            <h5>€<?= number_format($row['price'],2) ?></h5>
                            <?php 
                        
                                if (check_if_added_to_cart($row['id'])) { 
                                echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                                        ?>
                                <a href="cart-add.php?id=<?= $row['id'] ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                <?php
                                }
                            ?>
                            </div>
                          </form>
                          </div>
                        </div>
          
                        <?php }
                      }
                  }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                }
                 
                // Close connection
                //mysqli_close($con);
              }
            } else{
              /* Attempt MySQL server connection. Assuming you are running MySQL
              server with default setting (user 'root' with no password) */
              $con = mysqli_connect("localhost", "root", "", "Online Shop") or die(mysqli_error($con));
               
              // Check connection
              if($con == false){
                  die("ERROR: Could not connect. " . mysqli_connect_error());
              }
              
              
              // Attempt select query execution with order by clause
              $query = "SELECT * FROM items";
              $Result = mysqli_query($con,$query);

              while($row = mysqli_fetch_array($Result)){?>
              <div class="col-md-3 col-sm-6">
                <div class="thumbnail">
                <form method="get" action="products.php?id=<?=$row['id'] ?>">
                  <img src="img2\<?= $row['id'] ?>.jpg" alt="Responsive image">
                  <div class="caption">
                  <h5><?= $row['name']; ?></h5>
                  <h5>€<?= number_format($row['price'],2) ?></h5>
                  <?php 
              
                      if (check_if_added_to_cart($row['id'])) { 
                      echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                      } else {
                                              ?>
                      <a href="cart-add.php?id=<?= $row['id'] ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                      <?php
                      }
                  ?>
                  </div>
                </form>
                </div>
              </div>

              <?php }
            }
              ?>


         

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
