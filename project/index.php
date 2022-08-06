<?php

  session_start();

  function printr($msg) {
    print_r('<p id="php_console" style="text-align:center;">');
    print_r($msg);
    print_r('</p>');}
  function consoleLog($msg) {
    echo '<script type="text/javascript">' .
          'console.log("' . $msg . '");</script>';}
  function consoleLogObject($obj) {
    $flattened = $obj;
    array_walk($flattened, function(&$value, $key) {
        $value = "{$key}:{$value}";
    });
    echo '<script>console.log("'.implode(', ', $flattened).'")</script>';
  }

  $x = 2;
  $y = 3;
  $z = $x / $y;
  $z = $x % $y;


  $servername="localhost";
  $username="root";
  $passwordd="";
  $dbname="hatlly";

  if(isset($_GET['submit'])){
    
    $mysqli = new mysqli($servername, $username, $passwordd, $dbname);
    if($mysqli->connect_error){
        die("connection error" . $mysqli->connect_error);
    }
    
    $username = $_GET['username'];
    $password = $_GET['password'];

    $sql = "SELECT username,password FROM users WHERE username = '$username' AND password = '$password'";

    $result = $mysqli->query($sql)->fetch_object();

    if(isset($result)) {
      $_SESSION['username'] = $result->username;
      $_SESSION['password'] = $result->password;
    } else {
      echo "<script>
        alert('invalid username or password')</script>
        </script>
      ";
    }

  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>Document</title>
</head>
<body>

  <!-------------------------------------- NAVBAR -------------------------------------->
  <section id="navbar">
    <div id="logo">
      <span>Hatlly</span>
    </div>        
    <div id="pages">
      <a class="pageLink" href="index.php">Home</a> 
      <a class="pageLink" href="">Products</a>
      <a class="pageLink" href="about/about.php">About</a>
      <a class="pageLink" href="contactus/contactus.php">Contact Us</a>
    </div>
    <div id="cart">
      <?php
        if(isset($_SESSION['username'])) {
          echo <<<HTML
            <div id="profile">
              <span>{$_SESSION['username']}</span>
            </div>
          HTML;
        } else {
          echo <<<HTML
            <i class="fa-solid fa-user" onclick="document.getElementById('id01').style.display='block'"></i>
          HTML;
        }
      ?>
      <i class="fa-solid fa-cart-shopping"></i>
    </div>
  
    <div id="sidebar">
        <span id="close">&times;</span>
        <span id="logout">Log out</span>
    </div>
    <script>
      document.querySelector('#cart #profile').onclick = function() {
        document.getElementById('sidebar').style.left = "0px"
      }
      document.querySelector('#navbar #sidebar #close').onclick = function() {
        document.getElementById('sidebar').style.left = "-200px"
      }
      document.querySelector('#navbar #sidebar #logout').onclick = () => {
        $.ajax({ 
          url: 'logout.php',
          success: function(output) {
            window.location.href = 'index.php';
          }
        });
      }
    </script>

    <div id="id01" class="modal">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <form class="modal-content" action="" method="GET">
        <div class="container">
          <h1>log in</h1>
          <p>Enter your username and password to login into your account.</p>
          <hr>
          <label for="email"><b>username</b></label>
          <input type="text" placeholder="Enter username" name="username" required>
    
          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
          
          <div class="clearfix">
            <button type="button" class="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <input name="submit" type="submit" class="signupbtn button">
          </div>
        </div>
      </form>
    </div>
    <script>
      var modal = document.getElementById('id01');

      window.onclick = function(event){
        if(event.target == modal){
          modal.style.display = "none";
        }
      }

      /* console.log(document.getElementById('php_console').innerHTML); */
    </script>
  </section>

  <section id="welcome">
    <div id="heading">Welcome to <span>Hattly</span></div>
    <div id="text">the most popular e-commerce website in africa</div>
    <div id="search">
      <input type="text" placeholder="Search for products">
      <i id="icon" class="fa-solid fa-search"></i>
    </div>
  </section>

  <section id="categories">

    <div class="category computers">
      <span class="head">Computers & Laptops</span>
      <span class="desc">We offer a wide variety of the latest PCs and Laptops released</span>
      <div class="products">
        <div class="product c1">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">C1</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product c2">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">C2</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product c3">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">C3</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product c4">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">C4</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product c5">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">C5</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
      </div>
    </div>

    <div class="category phones">
      <span class="head">Mobile Phones</span>
      <span class="desc">We offer a wide variety of the latest Smart Phones released</span>
      <div class="products">
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
      </div>
      <img src="/images/240px-Apple-logo.png" alt="">
    </div>

    <div class="category fashion">
      <span class="head">Fashion and Clothing</span>
      <span class="desc">We offer a wide variety of the latest Smart Phones released</span>
      <div class="products">
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
      </div>
    </div>

    <div class="category appliances">
      <span class="head">Home Appliances</span>
      <span class="desc">We offer a wide variety of the latest Home Appliances</span>
      <div class="products">
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
      </div>
    </div>

    <div class="category fitness">
      <span class="head">Fitness Equipment</span>
      <span class="desc">We offer a wide variety of the latest Home Appliances</span>
      <div class="products">
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
        <div class="product">
          <span class="image"></span>
          <div class="productInfo">
            <span class="productName">Samsung Galaxy A73</span>
            <span class="productDesc">6 inch 250GB</span>
            <span class="productPrice">14,999 EGP</span>
          </div>
        </div>
      </div>
    </div>
      
  </section>
</body>
</html>