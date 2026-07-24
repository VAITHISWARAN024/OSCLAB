<?php
session_start();
include("db.php");

if(isset($_POST["login"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM logtbl WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>

<form method="post">

    <label>Username:</label>
    <input type="text" name="username" required>

    <br><br>

    <label>Password:</label>
    <input type="password" name="password" required>

    <br><br>

    <input type="submit" name="login" value="Login">

</form>

</body>
</html>