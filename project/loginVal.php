<?php
  $servername="localhost";
  $username="root";
  $passwordd="";
  $dbname="hatlly";

  $mysqli = new mysqli($servername, $username, $passwordd, $dbname);

  $username = $_GET['username'];
  $password = $_GET['password'];

  $sql = "SELECT username,password FROM users WHERE username = '$username' AND password = '$password'";

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