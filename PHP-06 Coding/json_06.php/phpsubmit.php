<?php


$servername = "localhost";
$username = "root";
$password ="Admin@123";
$db="php_submit";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: ".$conn->connect_error);
}
// echo "Connected successfully";
$queryfor="select email from assign_submit where email='$email';";

$runQuery=mysqli_query($conn,$queryfor);



if(mysqli_num_rows($runQuery)){
    echo "Already exits";
}
else{
    $insert="insert into assign_submit values('$fname','$email','$phone','$dob') ";
    mysqli_query($conn,$insert);
 

    echo "<script>alert('Inserted successfully')</script>";
}







?> 
