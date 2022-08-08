<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="about.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php 
        $_GET["page"] = basename($_SERVER['PHP_SELF']);
        include '../navbar.php'; 
    ?>
  <section id="header">
            <span id="coverphoto"></span>
             <div id="overlay"></div>
             <p id="paragrapgh">
                we offer electronics and fashion products
             </p>
    </section>
      
  <section id="middle">
        <div id="about">
          <div id="ap">
            <h1 id="mheader">About</h1>
              <p id="mpara">Hattly is an enterpreuner in the online shopping websites as in offers the best deals and always provides its customers with 
                sales and voultchers cards as gifts. Also make sure that the website is a user friendly one despite the varity of products. Hattly is a speciallised
                website in electronics and fashion. Incase if any problem take a place please head to contact in the header up below.
              </p>
            </div>
          <img id ="mimg" src="../images/r.jpeg" alt="teamwork">
        </div>
       </section>
       <section id="footer">
        <div id="end">
          <div id="mission">
            <h1 id="mh">mission</h1>
            <p id="mp">provide all our customers needs with best prices possibale. Make commerce better for everyone, so businesses can focus on what they do best: building and selling their products.</p>   
          </div>
            <div id="vision">
              <h1 id="vh">vission</h1>
              <p id="vp">Our vision is to be earth’s most customer-centric company, where customers can find and discover anything they might want to buy online.</p>
            </div>
         </section>
       </div>
</body>
</html>