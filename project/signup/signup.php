<?php
    $servername="localhost";
    $username="root";
    $passwordd="";
    $dbname="hatlly";



    if(isset($_POST['submit'])){

        $mysqli = new mysqli($servername, $username, $passwordd, $dbname);
        if($mysqli->connect_error){
            die("connection error" . $mysqli->connect_error);
        }

        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $country=$_POST['country'];
        $city=$_POST['city'];
        $street=$_POST['street'];
        $phone=$_POST['phone'];
        $age=$_POST['age'];

        $sql = "INSERT INTO users(fname, lname, username, email, password, country, city, street, phone, age) VALUES
        ('$fname','$lname','$username','$email','$password','$country','$city','$street','$phone','$age')";

        try {
            $mysqli->query($sql);
        } catch (mysqli_sql_exception) {
            echo '<script>alert('.'"MySQL Error: '.$mysqli->error.'")</script>';
        }
        
        header("Location:../index.php");
    }
?>
<html lang="en">
<head>
    <title>Form Validation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <?php include '../head.php';  ?>
    <link rel="stylesheet" href="signup.css">
    <script defer src="validation.js"></script>
</head>
<body>
    <div class="container">
        <form id="form" action="" method="POST">
            <h1>Registration</h1>
            <div class="input-control">
                <input id="fname" name="fname" type="text" placeholder="First Name">
                <div class="error" name="error"></div>
            </div>
            <div class="input-control">
                <input id="lname" name="lname" type="text" placeholder="Last Name">
                <div class="error" name="error"></div>
            </div>
            <div class="input-control">
                <input id="username" name="username" type="text" placeholder="Username">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input id="email" name="email" type="text" placeholder="Email">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input id="password"name="password" type="password" placeholder="Password">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input id="password2"name="password2" type="password" placeholder="Re-Enter your password">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input id="country"name="country" type="country" placeholder="Country">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input id="city"name="city" type="city" placeholder="City">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input id="street"name="street" type="street" placeholder="Street">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input id="phone"name="phone" type="phone" placeholder="Phone Number">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input id="age"name="age" type="age" placeholder="Age">
                <div class="error"></div>
            </div> 
            <button type="submit" value="submit" name="submit" id="submit" class="submit-container">
                <i class="fa-solid fa-lock"></i>
                <span>Submit</span>
            </button>
        </form>
    </div>
</body>
</html>