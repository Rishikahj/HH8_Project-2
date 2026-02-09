<?php
include 'db.php';

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username,email,password)
            VALUES ('$username','$email','$password')";

    if(mysqli_query($conn,$sql)){
        echo "Registration Successful!";
        header("Location: login.php");
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Register</h2>

<form method="POST">

Username:<br>
<input type="text" name="username" required><br><br>

Email:<br>
<input type="email" name="email" required><br><br>

Password:<br>
<input type="password" name="password" required><br><br>

<button name="register">Register</button>

</form>