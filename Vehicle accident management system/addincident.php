<?php

$msg="";	

if (isset($_POST['upload'])) {
	
	$target = basename($_FILES['image']['name']);

	$db = mysqli_connect("localhost","root","","geox");

	$Lng = $_POST['lng'];
	$Lat = $_POST['lat'];
	$description = $_POST['description'];
	$image = $_FILES['image']['name'];
	$name = $_POST['name'];
	$username = $_POST['username'];
	$sql = "INSERT INTO locations(lat, lng, description, image, img, name,username) VALUES ('$Lat','$Lng','$description','$image',1,'$name','$username')";
	
	mysqli_query($db,$sql);

	if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
	{
		$msg = "Image uploaded successfully";
	}

	else
	{
		$msg = "There was a problem in uploading the image";


	} 	 
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Incident</title>
	<style>

body{
	background-image: url('backwall.jpeg');
}
		input[type=text]{
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
textarea{
width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
	</style>
</head>
<body>
<center>
	<h1>Add Incidents With Images </h1>
	<a href="userview.php"><img src=back.png height="50px" width="50px"></a>
<form method="post" action="addincident.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<div>
				<input type="file" name="image">

			</div>
			<div>
				<input type="text" name="username" placeholder="username">
			</div>
			<div>
				<input type="text" name="name" placeholder="Location Name">
			</div>
			<div>
				<textarea name="description" cols="40" rows="4" placeholder="Mention Incident"></textarea>
			</div>
			
			<div>
				<input type="submit" name="upload" value="upload">

			</div>
		 </form>
		</center>
</body>
</html>