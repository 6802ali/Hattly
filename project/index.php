<?php
  session_start();
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
  <title>Hattly</title>
</head>
<body>

  <!-------------------------------------- NAVBAR -------------------------------------->
  <?php 
    $_GET["page"] = basename($_SERVER['PHP_SELF']);
    include 'navbar.php'; 
  ?>

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