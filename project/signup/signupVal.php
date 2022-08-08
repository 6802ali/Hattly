<?php
  $servername="localhost";
  $username="root";
  $passwordd="";
  $dbname="hatlly";

  $mysqli = new mysqli($servername, $username, $passwordd, $dbname);

  $username = $_GET['username'];

  $sql = "SELECT username FROM users WHERE username = '$username'";

  $result = $mysqli->query($sql)->fetch_object();

  if(isset($result)) {
    print_r("found");
  } else {
    print_r("not found");
  }

  if($_GET["session"] == "true") {
    session_start();
    $_SESSION["username"] = $username;
  }
?>