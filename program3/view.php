<?php
include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Feedback</title>
</head>

<body>

<h2>Feedback Details</h2>

<table border="1">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Message</th>
</tr>

<?php

$sql="SELECT * FROM feedback";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['message']; ?></td>
</tr>

<?php
}
?>

</table>

<br>

<a href="index.php">Back</a>

</body>
</html>