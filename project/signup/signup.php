<?php
    $servername="localhost";
    $username="root";
    $passwordd="";
    $dbname="hatlly";

    if(isset($_POST['submit'])){

        $conn = new mysqli($servername, $username, $passwordd, $dbname);
        if($conn->connect_error){
            die("connection error" . $conn->connect_error);
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

        if ($conn->query($sql) === TRUE) {
            echo "record inserted successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>
<html lang="en">
<head>
    <title>Form Validation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="signup.css">
    <script defer src="validation.js"></script>
</head>
<body>
    <div class="container">
        <form id="form" action="" method="POST" onsubmit="validateInputs(document.signupForm)">
            <h1>Registration</h1>
            <div class="input-control">
                <label for="fname">first name</label>
                <input id="fname" name="fname" type="text">
                <div class="error" name="error"></div>
            </div>
            <div class="input-control">
                <label for="lname">last name</label>
                <input id="lname" name="lname" type="text" >
                <div class="error" name="error"></div>
            </div>
            <div class="input-control">
                <label for="username">Username</label>
                <input id="username" name="username" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="email">Email</label>
                <input id="email" name="email" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="password">Password</label>
                <input id="password"name="password" type="password">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="password2">Password  again</label>
                <input id="password2"name="password2" type="password">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="country">country</label>
                <input id="country"name="country" type="country">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="city">city</label>
                <input id="city"name="city" type="city">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="street">street</label>
                <input id="street"name="street" type="street">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="phone">phone</label>
                <input id="phone"name="phone" type="phone">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="age">age</label>
                <input id="age"name="age" type="age">
                <div class="error"></div>
            </div>  
            <!-- <button type="submit" id="submit" name="submit" value="submit">Sign Up</button> -->
            <input type="submit" value="submit" name="submit" id="submit">
        </form>
    </div>
</body>
</html>