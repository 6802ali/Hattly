<?php
  session_start();

  $servername="localhost";
  $username="root";
  $passwordd="";
  $dbname="hatlly";

  $mysqli = new mysqli($servername, $username, $passwordd, $dbname);
  if($mysqli->connect_error){die("connection error" . $conn->connect_error);}

  $sql = "SELECT * FROM products";
  $query = $mysqli->query($sql);

  $xmldom = new DOMDocument();
  $xmlProducts = $xmldom->createElement('Products'); 
  $xmldom->appendChild($xmlProducts);
  while ($obj = $query -> fetch_object()) {
    $xmlproduct = $xmldom->createElement('Product');
    $xmlProducts->appendChild($xmlproduct);
    $xmlproduct->appendChild($xmldom->createElement('id', $obj->id));
    $xmlproduct->appendChild($xmldom->createElement('title', $obj->title));
    $xmlproduct->appendChild($xmldom->createElement('brand', $obj->brand));
    $xmlproduct->appendChild($xmldom->createElement('price', $obj->price));
    $xmlproduct->appendChild($xmldom->createElement('quantity', $obj->quantity));
    $xmlproduct->appendChild($xmldom->createElement('description', $obj->description));
    $xmlproduct->appendChild($xmldom->createElement('image', $obj->image));
    $xmlproduct->appendChild($xmldom->createElement('category', $obj->category));
    $xmlproduct->appendChild($xmldom->createElement('type', $obj->type));
  }
  $xmldom->formatOutput = true;
  $xmldom->save("products.xml");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include '../head.php';  ?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="products.css">
  <title>Document</title>
</head>
<body>
  <?php 
    $_GET["page"] = basename($_SERVER['PHP_SELF']);
    include '../navbar.php';
  ?>
    
    <div id="search-cont">
      <input type="text" id="search" placeholder="Type to search" name="search">
      <i id="icon" class="fa-solid fa-search"></i>
      <script>
        $(document).ready(function () {
            liveSearch = (searchTerm) => {
              $.ajax({
                type: "GET",
                async: false,
                url: "liveSearch.php",
                data: {
                  query: searchTerm
                },
               dataType: "xml",
                success: function(xml) {
                    productsXml = xml;
                },
                error: function(xhr, status, error) {
                    console.log("an error occurred: " + error);
                }
              });
            }

            productXmlNodes = (productXml) => {
              let idXml = productXml.getElementsByTagName("id")[0].textContent;
              let imageXml = productXml.getElementsByTagName("image")[0].textContent;
              let titleXml = productXml.getElementsByTagName("title")[0].textContent;
              let priceXml = productXml.getElementsByTagName("price")[0].textContent;
              let quantityXml = productXml.getElementsByTagName("quantity")[0].textContent;
              let descriptionXml = productXml.getElementsByTagName("description")[0].textContent;

              productNode = document.createElement("div"); productNode.className = "product";
              productNode.innerHTML = `
                <span class="image" style="background-image: url(../images/products/${imageXml})"></span>
                <div class="details">
                  <span class="title">${titleXml}</span>
                  <span class="price">${priceXml} EGP</span>
                  <span class="quantity">${quantityXml} In Stock</span>
                  <p class="description">${descriptionXml}</p>
                </div>
                <div class="add">
                  <span>Add to Cart</span>
                  <i class="fa-solid fa-plus"></i>
                </div>
              `;

              productNode.querySelector(".add").addEventListener("click", () => {
                
                addToCart = () => {
                  $.ajax({
                    type: "post",
                    url: "addToCart.php",
                    data: {
                      addToCart: {
                        id: idXml,
                        image: imageXml,
                        title: titleXml,
                        price: priceXml,
                      }
                    },
                    success: function (response) {
                      console.log(response);
                    }
                  });
                }

                <?php
                  if(isset($_SESSION["username"])){
                    echo "addToCart();";
                  }else{
                    echo "alert('You must be logged in to add to cart');";
                  }
                ?>
              });
              
              productsContainer.appendChild(productNode);
            }

            var productsXml;
            searchInput = document.querySelector("#search-cont #search");
            searchInput.oninput = () => {
              liveSearch(searchInput.value);
              productsContainer = document.createElement("div"); productsContainer.id = "products";
              for (var i = 0; i < productsXml.getElementsByTagName("Product").length; i++) {
                productXmlNodes(productsXml.getElementsByTagName("Product")[i]);
              }
              document.querySelector("#main").replaceChild(productsContainer, document.querySelector("#main").children[1]);
            }
            
        });
      </script>
    </div>

    <div id="main">
      <div id="sidenav">         
        <span>Categories</span>
        <div class="categories">
          <i class="fa-solid fa-microchip"></i>
          Electronic devices
          <i class="fa-solid fa-angle-right"></i>
        </div>
        <div class="subcategories">
          <span class="types">PCs</span>
          <span class="types">Laptops</span>
          <span class="types">Mobile Phones</span>
          <span class="types">Tablets</span>
          <span class="types">Consoles</span>
          <span class="types">TVs</span>
        </div>
        <div class="categories">
          <i class="material-icons">checkroom</i>
          Clothing
          <i class="fa-solid fa-angle-right"></i>
        </div>
        <div class="subcategories">
          <span class="types">Shirts</span>
          <span class="types">Pants</span>
          <span class="types">Shoes</span>
          <span class="types">Glasses</span>
          <span class="types">Accessories</span>
          <span class="types">Hats</span>
        </div>
        <div class="categories">
          <i class="fa-solid fa-house"></i>
          Home appliances
          <i class="fa-solid fa-angle-right"></i>
        </div>
        <div class="subcategories">
          <span class="types">Fridges</span>
          <span class="types">Microwaves</span>
          <span class="types">Oven</span>
          <span class="types">Washing Machine</span>
          <span class="types">Dish Washer</span>
          <span class="types">Air Conditioner</span>
        </div>
        <div class="categories">
          <i class="fa-solid fa-person-running"></i>
          Fitness
          <i class="fa-solid fa-angle-right"></i>
        </div>
        <div class="subcategories">
          <span class="types">Sportswear</span>
          <span class="types">Running Shoes</span>
          <span class="types">Equipment</span>
          <span class="types">Fitness Watches</span>
          <span class="types">Supplements</span>
          <span class="types">Scale</span>
        </div>
        <div class="categories">
          <i class="fa-solid fa-gamepad"></i>
          Toys and Games
          <i class="fa-solid fa-angle-right"></i>
        </div>
        <div class="subcategories">
          <span class="types">Video Games</span>
          <span class="types">Baby Friendly</span>
          <span class="types">Toys</span>
          <span class="types">Board Games</span>
          <span class="types">Card Games</span>
          <span class="types">Puzzles</span>
        </div>
      </div>

      <div id="products">
        
      </div>

      
    </div>

    <script>
      $(document).ready(function(){
        $(".fa-angle-right").click(function(){

          for (i = 0; i < $(".fa-angle-right").length; i++) {
            if ( $(".fa-angle-right").get(i).style.transform != "matrix(1, 0, 0, 1, 0, 0)" ){ 
              $(".fa-angle-right").get(i).style.transform = "rotate(0deg)";
              $(".fa-angle-right").get(i).parentElement.nextElementSibling.style.height = "0px";
            }
          }

          if($(this).css("transform") == "matrix(1, 0, 0, 1, 0, 0)"){
            $(this).css("transform", "rotate(90deg)");
            $(this).parent().next().css("height","225px"); 
          } else {
            $(this).css("transform", "rotate(0deg)");
            $(this).parent().next().css("height","0px");
          }
        });

      });
    </script>
</body>
</html>