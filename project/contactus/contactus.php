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
  <link rel="stylesheet" href="contactus.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
  <!-------------------------------------- NAVBAR -------------------------------------->
  <section id="navbar">
    <div id="logo">
      <span>Hatlly</span>
    </div>
    <div id="pages">
      <a class="pageLink" href="../index.php">Home</a>
      <a class="pageLink" href="">Products</a>
      <a class="pageLink" href="../about/about.php">About</a>
      <a class="pageLink" href="#">Contact Us</a>
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
          url: '../logout.php',
          success: function(output) {
            alert(output);
            window.location.href = 'contactus.php';
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

  <!-------------------------------------- CONTACT US -------------------------------------->
  <section id="contactus">
    <div id="header">
      <span>HOME / CONTACT-US</span>
    </div>
    <div id="main">
      <span class="infotitle">Contact Info</span>
      <div id="contactinfo">
        <div class="infosections">
          <i class="fa-solid fa-phone"></i>
          <div class="sectiontext">
            <span>Phone Number</span>
            <span>+966 544 888 888</span>
            <span>+966 544 888 888</span>
          </div>
        </div>
        <div class="infosections">
          <i class="fa-solid fa-envelope"></i>
          <div class="sectiontext">
            <span>Email</span>
            <span>ahmed2006862@miuegypt.edu.eg</span>
            <span>ahmed2006862@miuegypt.edu.eg</span>
          </div>
        </div>
        <div class="infosections">
          <i class="fa-solid fa-location-dot"></i>
          <div class="sectiontext">
            <span>Location</span>
            <span>New Cairo</span>
            <span>El Rehab City</span>
          </div>
        </div>
      </div>
      <span class="infotitle">Get In Touch</span>
      <div id="getintouch">
        <form id="form" action="/action_page.php">
          <div class="form-groups">
            <div class="labelinput">
              <label for="fname">First name:</label>
              <input type="text" id="fname" name="fname">
            </div>
            <div class="labelinput">
              <label for="lname">Last name:</label>
              <input type="text" id="lname" name="lname">
            </div>
          </div>
          <div class="form-groups">
            <div class="labelinput">
              <label for="email">Email:</label>
              <input type="text" id="email" name="email">
            </div>
            <div class="labelinput">
              <label for="phonenumber">Phone Number:</label>
              <input type="text" id="phonenumber" name="phonenumber">
            </div>
          </div>
          <div class="form-groups">
            <div class="labelinput">
              <label for="subject">Subject:</label>
              <input type="text" id="subject" name="subject">
            </div>
          </div>
          <div class="form-groups">
            <div class="labelinput">
              <label for="message">Message:</label>
              <input type="text" id="message" name="message">
            </div>
          </div>
          <input id="button" type="submit" value="Submit">
        </form> 
      </div>
      
    </div>
  </section>
</body>
</html>