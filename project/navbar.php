<?php  
$currentPage = $_GET["page"];

switch ($currentPage) {
  case "index.php":
    $links["Home"] = "#";
    $links["Products"] = "";
    $links["About"] = "about/about.php";
    $links["Contact Us"] = "contactus/contactus.php";
    break;
  case "about.php":
    $links["Home"] = "../index.php";
    $links["Products"] = "";
    $links["About"] = "#";
    $links["Contact Us"] = "../contactus/contactus.php";
    break;
  case "contactus.php":
    $links["Home"] = "../index.php";
    $links["Products"] = "";
    $links["About"] = "../about/about.php";
    $links["Contact Us"] = "#";
    break;
}

echo <<<HTML
<section id="navbar">
    <div id="logo">
      <span>Hatlly</span>
    </div>        
    <div id="pages">
      <a class="pageLink" href= {$links['Home']} >Home</a> 
      <a class="pageLink" href="">Products</a>
      <a class="pageLink" href={$links['About']}>About</a>
      <a class="pageLink" href={$links['Contact Us']}>Contact Us</a>
    </div>
    <div id="cart">
HTML;
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
echo <<<HTML
      <i class="fa-solid fa-cart-shopping"></i>
      <div id="cartWindow">
        <div id="head">
          <span>Your Orders</span>
          <span>&times;</span>
        </div>
        <div id="products">
          <div class="product">
            <span class="image"></span>
            <div class="details">
              <span class="name">Samsung Galaxy 99</span>
              <span class="info">Price: 9,999</span>
              <span class="info">Quantity: 2</span>
              <span class="info">Total: 19,999</span>
            </div>
          </div>
          
          <div class="product">
            <span class="image"></span>
            <div class="details">
              <span class="name">Samsung Galaxy 99</span>
              <span class="info">Price: 9,999</span>
              <span class="info">Quantity: 2</span>
              <span class="info">Total: 19,999</span>
            </div>
          </div>

          <div class="product">
            <span class="image"></span>
            <div class="details">
              <span class="name">Samsung Galaxy 99</span>
              <span class="info">Price: 9,999</span>
              <span class="info">Quantity: 2</span>
              <span class="info">Total: 19,999</span>
            </div>
          </div>
        </div>
        <div id="checkout">
          <span>Total: 39,999 EGP</span>
          <button>Checkout</button>
        </div>
      </div>
      <script>
        $(document).ready(function(){
          $('#cart .fa-cart-shopping').click(function(){
            $('#cartWindow').css("right", "50px");
          });

          $("#cartWindow #head span:nth-child(2)").click(function(){
            $('#cartWindow').css("right", "-600px");
          });
        });

        
      </script>
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
          <h1>Log in</h1>
          <p>Enter your username and password to login into your account.</p>
          <hr>
          <label for="email"><b>Username</b></label>
          <input id="username" type="text" placeholder="Enter username" name="username" required>
    
          <label for="password"><b>Password</b></label>
          <input id="password" type="password" placeholder="Enter Password" name="password" required>
          
          <div class="clearfix">
            <a type="button" href="./signup/signup.php" class="button signupbtn">Sign Up</a>
            <button class="loginbtn button" disabled>Log in</button>
          </div>
        </div>
      </form>
    </div>
    <script>

      loginVal = (session_start) => {
        $.ajax({ 
          url: 'loginVal.php',
          type: 'GET',
          data: {
            username: usernameInput.value,
            password: passwordInput.value,
            session: session_start
          },
          success: function(output) {
            console.log("----------------");
            console.log("ajax succes")
            console.log("output: " + output)

            if(output == "found") {
              document.querySelector(".loginbtn").disabled = false;
            } else if (output == "not found") {
              document.querySelector(".loginbtn").disabled = true;
            }
          }
        });
      }

      usernameInput = document.querySelector('#id01 #username')
      passwordInput = document.querySelector('#id01 #password')
      usernameInput.oninput = () => {loginVal("false")}
      passwordInput.oninput = () => {loginVal("false")}

      document.querySelector(".loginbtn").onclick = () => {
        loginVal("true")
      }
        
    </script>
  </section>
HTML;
?>