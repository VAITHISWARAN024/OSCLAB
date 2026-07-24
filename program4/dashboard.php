<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <h1>Dashboard Page</h1>

    <<?php echo $_SESSION["username"]; ?>

    <br><br>

    <a href="logout.php">
        <button>Logout</button>
    </a>

</body>
</html>