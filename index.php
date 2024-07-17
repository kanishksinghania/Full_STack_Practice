<?php

$servername = "localhost";
$username = "student";
$password =  "Student";
$dbname = "student";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$school =$_POST['school'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$state = $_POST['state'];
$city = $_POST['city'];
$country = $_POST['country'];
$pincode = $_POST['pincode'];

$sql = "INSERT INTO `user`(`name`, `school`, `phone`, `email`, `state`, `city`, `country`, `pincode`) VALUES ('$name','$school','$phone','$email','$state','$city','$country','$pincode');";
#$sql = "INSERT INTO `user`(`name`, `school`, `phone`, `email`, `state`, `city`, `country`, `pincode`) VALUES ('Kanishk','SCET','9896160801','a@gmail.com','Delhi','Rohini','india','123321');";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
}else{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>