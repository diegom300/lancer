<?php
include "db_connect.php";

/* ADD USER */
if(isset($_POST['add_user'])){

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];

$sql = "INSERT INTO users (name,email,password,user_type)
VALUES ('$name','$email','$password','$user_type')";

$conn->query($sql);
}

/* DELETE USER */
if(isset($_GET['delete'])){

$id = $_GET['delete'];

$sql = "DELETE FROM users WHERE user_id=$id";
$conn->query($sql);

}

?>

<!DOCTYPE html>
<html>
<head>
<title>User Manager</title>
</head>
<body>

<h2>Add User</h2>

<form method="POST">

Name:<br>
<input type="text" name="name" required><br><br>

Email:<br>
<input type="email" name="email" required><br><br>

Password:<br>
<input type="text" name="password" required><br><br>

User Type:<br>
<select name="user_type">
<option value="customer">Customer</option>
<option value="tradesman">Tradesman</option>
</select>

<br><br>

<button type="submit" name="add_user">Add User</button>

</form>

<hr>

<h2>Current Users</h2>

<table border="1" cellpadding="8">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Type</th>
<th>Action</th>
</tr>

<?php

$result = $conn->query("SELECT * FROM users");

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){

echo "<tr>";
echo "<td>".$row['user_id']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['user_type']."</td>";

echo "<td>
<a href='manage_users.php?delete=".$row['user_id']."'>Delete</a>
</td>";

echo "</tr>";

}

}

?>

</table>

</body>
</html>








