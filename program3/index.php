<?php
include("db.php");

if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];

$sql="INSERT INTO feedback(name,email,message) VALUES('$name','$email','$message')";

if(mysqli_query($conn,$sql))
{
echo "Feedback Submitted Successfully";
}
else
{
echo "Feedback Not Submitted";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Feedback System</title>
</head>
<body>

<h2>Feedback Form</h2>

<form method="post">

Name<br>
<input type="text" name="name" required><br><br>

Email<br>
<input type="email" name="email" required><br><br>

Feedback<br>
<textarea name="message" rows="5" cols="30" required></textarea><br><br>

<input type="submit" name="submit" value="Submit">

</form>

<br>

<a href="view.php">View Feedback</a>

</body>
</html>