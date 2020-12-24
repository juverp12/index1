<?php
include "connection.php"
?>
<html lang="en">
<head>
  <title>REGISTRATION FORM-ADD USER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h2>REGISTRATION FORM-ADD USER</h2>
	<p> Use this form to register a new user in the system.</p>
    <form action="" name="form1" method="post">
    <div class="form-group">
    <label for="firstname">First name:</label>
    <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname">
    </div>
	
    <div class="form-group">
    <label for="lastname">Last name:</label>
    <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname">
    </div>
	
	<div class="form-group">
	<label for="accesslevel">Access Level:</label>
    <select class="form-control" id="accesslevel" name="accesslevel">
	<option value="ordinaryuser">Ordinary User</option>
	<option value="supervisoryuser">Supervisory User</option>
	<option value="superuser">Super User</option>
	</select>
    </div>
	
	<div class="form-group">
    <label for="address">Address:</label>
    <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
    </div>
	
	<div class="form-group">
    <label for="password">Password:</label>
	<input type="text" class="form-control" id="password" placeholder="Enter Password" name="password">
    </div>
    <button type="submit" name="insert" class="btn btn-default">Insert</button>
	<button type="submit" name="update" class="btn btn-default">Update</button>
	<button type="submit" name="delete" class="btn btn-default">Delete</button>
  </form>
  </div>
<div class="col-kg-12">
<table class="table table-striped">
    <thead>
      <tr>
		<th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Access Level</th>
		<th>Address</th>
		<th>Password</th>
		<th></th>
		<th></th>
      </tr>
    </thead>
		<tbody>
<?php
	$res=mysqli_query($link,"select * from table1");
	while($row=mysqli_fetch_array($res))
	{
	echo "<tr>";
	echo "<td>"; echo $row["id"]; echo "</td>";
	echo "<td>"; echo $row["firstname"]; echo "</td>";
	echo "<td>"; echo $row["lastname"]; echo "</td>";
	echo "<td>"; echo $row["accesslevel"]; echo "</td>";
	echo "<td>"; echo $row["address"]; echo "</td>";
	echo "<td>"; echo $row["password"]; echo "</td>";
	echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-success">Edit</button></a> <?php echo "</td>";
	echo "<td>"; ?>	<a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a> <?php echo "</td>";
	echo "</tr>";
			}
			?>
		</tbody>
  </table>
</div>
</body>
<?php
if(isset($_POST["insert"]))
{	
	$query=mysqli_query($link,"INSERT INTO table1 value(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[accesslevel]','$_POST[address]', '$_POST[password]')");
	if ($query){
		header("location: index.php");
		exit();
	}
?>
	<script type="text/javascript">
	window.location.href=window.location.href;
	</script>
	<?php
}
if(isset($_POST["delete"]))
{
	$query=mysqli_query($link,"delete from table1 where firstname='$_POST[firstname]'") or die(mysqli_error($link));
		if ($query){
		header("location: index.php");
		exit();
	}
?>
	<script type="text/javascript">
	window.location.href=window.location.href;
	</script>
	<?php	
}
if(isset($_POST["update"]))
{
	$query=mysqli_query($link,"delete from table1 where firstname='$_POST[firstname]'") or die(mysqli_error($link));
		if ($query){
		header("location: index.php");
		exit();
	}
?>
	<script type="text/javascript">
	window.location.href=window.location.href;
	</script>
	<?php
}
	?>
</html>