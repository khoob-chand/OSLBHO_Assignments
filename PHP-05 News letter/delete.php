 <?php 
$delid= $_GET["id"];

$servername = "localhost";
$username = "root";
$password ="Admin@123";
$db="Registration";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: ".$conn->connect_error);
}
echo "Connected successfully";






$deletequery="delete from crud where id=$delid";
if(mysqli_query($conn,$deletequery)){
    mysqli_query($conn,'set @autoid=0');
    mysqli_query($conn,'update crud  set id = @autoid := (@autoid+1);');
    header('location:http://localhost/indexcrud.php');
}

echo $_GET["id"];



?> 