<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="contactus.css">
  <?php include '../head.php';  ?>
  <title>Document</title>
</head>
<body>
  <!-------------------------------------- NAVBAR -------------------------------------->
  <?php 
    $_GET["page"] = basename($_SERVER['PHP_SELF']);
    include '../navbar.php'; 
  ?>

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