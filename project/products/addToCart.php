

<?php
  session_start();

  if(isset($_POST["addToCart"])){

    $product = array(
      "id" => $_POST["addToCart"]["id"],
      "image" => $_POST["addToCart"]["image"],
      "title" => $_POST["addToCart"]["title"],
      "price" => $_POST["addToCart"]["price"],
    );

    $_SESSION["cart"][] = $product;

  }
?>