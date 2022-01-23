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
          right: 770px;
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
                          echo "<table>";
                              echo "<tr>";
                                  echo "<th>id</th>";
                                  echo "<th>name</th>";
                                  echo "<th>price</th>";
                              echo "</tr>";
                          while($row = mysqli_fetch_array($result)){
                              echo "<tr>";
                                  echo "<td>" . $row['id'] . "</td>";
                                  echo "<td>" . $row['name'] . "</td>";
                                  echo "<td>" . $row['price'] . "</td>";
                              echo "</tr>";
                          }
                          echo "</table>";
                          // Close result set
                          mysqli_free_result($result);
                } else{
                          echo "No records matching your query were found.";
                }

                $con->close();
              }else {
                echo 'Search Field Empty';
              }
            }
            ?>

            <?php
            if(isset($_POST['submit'])){
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
                          echo "<table>";
                              echo "<tr>";
                                  echo "<th>id</th>";
                                  echo "<th>name</th>";
                                  echo "<th>price</th>";
                              echo "</tr>";
                          while($row = mysqli_fetch_array($result)){
                              echo "<tr>";
                                  echo "<td>" . $row['id'] . "</td>";
                                  echo "<td>" . $row['name'] . "</td>";
                                  echo "<td>" . $row['price'] . "</td>";
                              echo "</tr>";
                          }
                          echo "</table>";
                          // Close result set
                          mysqli_free_result($result);
                      }
                  }
                }else if($selected == 'price_desc'){
                  // Attempt select query execution with order by clause
                  $sql = "SELECT * FROM items ORDER BY price DESC";
                  if($result = mysqli_query($con, $sql)){
                      if(mysqli_num_rows($result) > 0){
                          echo "<table>";
                              echo "<tr>";
                                  echo "<th>id</th>";
                                  echo "<th>name</th>";
                                  echo "<th>price</th>";
                              echo "</tr>";
                          while($row = mysqli_fetch_array($result)){
                              echo "<tr>";
                                  echo "<td>" . $row['id'] . "</td>";
                                  echo "<td>" . $row['name'] . "</td>";
                                  echo "<td>" . $row['price'] . "</td>";
                              echo "</tr>";
                          }
                          echo "</table>";
                          // Close result set
                          mysqli_free_result($result);
                      }
                  }
                }else if($selected == 'product_name_asc'){
                  // Attempt select query execution with order by clause
                  $sql = "SELECT * FROM items ORDER BY name ASC";
                  if($result = mysqli_query($con, $sql)){
                      if(mysqli_num_rows($result) > 0){
                          echo "<table>";
                              echo "<tr>";
                                  echo "<th>id</th>";
                                  echo "<th>name</th>";
                                  echo "<th>price</th>";
                              echo "</tr>";
                          while($row = mysqli_fetch_array($result)){
                              echo "<tr>";
                                  echo "<td>" . $row['id'] . "</td>";
                                  echo "<td>" . $row['name'] . "</td>";
                                  echo "<td>" . $row['price'] . "</td>";
                              echo "</tr>";
                          }
                          echo "</table>";
                          // Close result set
                          mysqli_free_result($result);
                      }
                  }
                }else if($selected == 'product_name_desc'){
                  // Attempt select query execution with order by clause
                  $sql = "SELECT * FROM items ORDER BY name DESC";
                  if($result = mysqli_query($con, $sql)){
                      if(mysqli_num_rows($result) > 0){
                          echo "<table>";
                              echo "<tr>";
                                  echo "<th>id</th>";
                                  echo "<th>name</th>";
                                  echo "<th>price</th>";
                              echo "</tr>";
                          while($row = mysqli_fetch_array($result)){
                              echo "<tr>";
                                  echo "<td>" . $row['id'] . "</td>";
                                  echo "<td>" . $row['name'] . "</td>";
                                  echo "<td>" . $row['price'] . "</td>";
                              echo "</tr>";
                          }
                          echo "</table>";
                          // Close result set
                          mysqli_free_result($result);
                      }
                  }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                }
                 
                // Close connection
                mysqli_close($con);
              } else {
                echo 'Please select the value.';
              }
            } else{
              /* Attempt MySQL server connection. Assuming you are running MySQL
              server with default setting (user 'root' with no password) */
              $con = mysqli_connect("localhost", "root", "", "Online Shop") or die(mysqli_error($con));
               
              // Check connection
              if($con === false){
                  die("ERROR: Could not connect. " . mysqli_connect_error());
              }
               
              // Attempt select query execution with order by clause
              $sql = "SELECT * FROM items";
            }
          ?>
          
                 <div class="container">
              <div class="row text-center">
                  <div class="col-md-3 col-sm-6">
                      <div class="thumbnail">
                          <img src="img/5.jpg" alt="Responsive image">
                          <div class="caption">
                              <h3>Cannon EOS</h3>
                              <p>Price:EUR360.00</p>
                              <?php 
					
					if (check_if_added_to_cart(1)) { 
					echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
					} else {
                                	?>
					<a href="cart-add.php?id=1" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
					<?php
					}
                                ?>
                             <!-- <button type="submit" class="btn btn-primary btn-block">Add to cart</button>-->
                          </div>
                      </div>
                  </div>
                  
                  
                  <div class="col-md-3 col-sm-6">
                      <div class="thumbnail">
                          <img src="img/2.jpg" alt="Responsive image">
                          <div class="caption">
                              <h3>Nikon DSLR</h3>
                              <p>Price:EUR400.00</p>
                              <?php 
					
					if (check_if_added_to_cart(2)) { 
					echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
					} else {
                                	?>
					<a href="cart-add.php?id=2" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
					<?php
					}
                                ?>
                              <!--<button type="submit" class="btn btn-primary btn-block">Add to cart</button>-->
                          </div>
                      </div>
                  </div>
                  
                  
                   <div class="col-md-3 col-sm-6">
                      <div class="thumbnail">
                          <img src="img/3.jpg" alt="Responsive image">
                          <div class="caption">
                              <h3>Sony DSLR</h3>
                              <p>Price:EUR500.00</p>
                              <?php 
					
					if (check_if_added_to_cart(3)) { 
					echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
					} else {
                                	?>
					<a href="cart-add.php?id=3" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
					<?php
					}
                                ?>
                              <!--<button type="submit" class="btn btn-primary btn-block">Add to cart</button>-->
                          </div>
                      </div>
                  </div>
                  
                   <div class="col-md-3 col-sm-6">
                      <div class="thumbnail">
                          <img src="img/4.jpg" alt="Responsive image">
                          <div class="caption">
                              <h3>Olympus DSLR</h3>
                              <p>Price:EUR800.00</p>
                              <?php 
					
					if (check_if_added_to_cart(4)) { 
					echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
					} else {
                                	?>
					<a href="cart-add.php?id=4" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
					<?php
					}
                                ?>
                              <!--<button type="submit" class="btn btn-primary btn-block">Add to cart</button>-->
                          </div>
                      </div>
                  </div>
                  
                  
                   <div class="col-md-3 col-sm-6">
                      <div class="thumbnail">
                          <img src="img/9.jpg" alt="Responsive image">
                          <div class="caption">
                              <h3>Titan Model#301</h3>
                              <p>Price:EUR150.00</p>
                              <?php 
					
					if (check_if_added_to_cart(5)) { 
					echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
					} else {
                                	?>
					<a href="cart-add.php?id=5" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
					<?php
					}
                                ?>
                              <!--<button type="submit" class="btn btn-primary btn-block">Add to cart</button>-->
                          </div>
                      </div>
                  </div>
                  
                  <div class="col-md-3 col-sm-6">
                      <div class="thumbnail">
                          <img src="img/10.jpg" alt="Responsive image">
                          <div class="caption">
                              <h3>Titan Model#201</h3>
                              <p>Price:EUR130.00</p>
                              <?php 
					
					if (check_if_added_to_cart(6)) { 
					echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
					} else {
                                	?>
					<a href="cart-add.php?id=6" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
					<?php
					}
                                ?>
                              <!--<button type="submit" class="btn btn-primary btn-block">Add to cart</button>-->
                          </div>
                      </div>
                  </div>
                  
                  <div class="col-md-3 col-sm-6">
                      <div class="thumbnail">
                          <img src="img/11.jpg" alt="Responsive image">
                          <div class="caption">
                              <h3>Hamilton Milan</h3>
                              <p>Price:EUR180.00</p>
                              <?php 
					
					if (check_if_added_to_cart(7)) { 
					echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
					} else {
                                	?>
					<a href="cart-add.php?id=7" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
					<?php
					}
                                ?>
                             <!-- <button type="submit" class="btn btn-primary btn-block">Add to cart</button>-->
                          </div>
                      </div>
                  </div>
                  
                   <div class="col-md-3 col-sm-6">
                      <div class="thumbnail">
                          <img src="img/12.jpg" alt="Responsive image">
                          <div class="caption">
                              <h3>Seiko Marine</h3>
                              <p>Price:EUR280.00</p>
                              <?php 
					
					if (check_if_added_to_cart(8)) { 
					echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
					} else {
                                	?>
					<a href="cart-add.php?id=8" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
					<?php
					}
                                ?>
                              <!--<button type="submit" class="btn btn-primary btn-block">Add to cart</button>-->
                          </div>
                      </div>
                  </div>
                  
                  <div class="col-md-3 col-sm-6">
                      <div class="thumbnail">
                          <img src="img/8.jpg" alt="Responsive image" id="imgs">
                          <div class="caption">
                              <h3>Freddy Perry</h3>
                              <p>Price:EUR 100.00</p>
                              <?php 
					
					if (check_if_added_to_cart(9)) { 
					echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
					} else {
                                	?>
					<a href="cart-add.php?id=9" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
					<?php
					}
                                ?>
                             <!-- <button type="submit" class="btn btn-primary btn-block">Add to cart</button>-->
                          </div>
                      </div>
                  </div>
                  
                  <div class="col-md-3 col-sm-6">
                      <div class="thumbnail">
                          <img src="img/6.jpg" alt="Responsive image">
                          <div class="caption">
                              <h3>Nautica Premium</h3>
                              <p>Price:EUR 90.00</p>
                              <?php 
					
					if (check_if_added_to_cart(10)) { 
					echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
					} else {
                                	?>
					<a href="cart-add.php?id=10" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
					<?php
					}
                                ?>
                              <!--<button type="submit" class="btn btn-primary btn-block">Add to cart</button>-->
                          </div>
                      </div>
                  </div>
                  
                  
                  <div class="col-md-3 col-sm-6">
                      <div class="thumbnail">
                          <img src="img/13.jpg" alt="Responsive image">
                          <div class="caption">
                              <h3>Oxford Company</h3>
                              <p>Price:EUR 100.00</p>
                              <?php 
					
					if (check_if_added_to_cart(11)) { 
					echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
					} else {
                                	?>
					<a href="cart-add.php?id=11" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
					<?php
					}
                                ?>
                              <!--<button type="submit" class="btn btn-primary btn-block">Add to cart</button>-->
                          </div>
                      </div>
                  </div>
                  
                  <div class="col-md-3 col-sm-6">
                      <div class="thumbnail">
                          <img src="img/14.jpg" alt="Responsive image">
                          <div class="caption">
                              <h3>Trussardi</h3>
                              <p>Price:EUR 130.00</p>
                              <?php 
					
					if (check_if_added_to_cart(12)) { 
					echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
					} else {
                                	?>
					<a href="cart-add.php?id=12" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
					<?php
					}
                                ?>
                              <!--<button type="submit" class="btn btn-primary btn-block">Add to cart</button>-->
                          </div>
                      </div>
                      
                      
                      
                  </div>
                  
              </div>
             
          </div><br>
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
