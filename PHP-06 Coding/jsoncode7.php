<?php
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






$mail = "khoob@abc.com";
$sql = 'select email from datatable';
$new = 'insert into datatable (fname,lname,email) values("khoob","chand","'.$mail.'");';
$osl = mysqli_query($conn, $sql);
$numofrows =   mysqli_num_rows($osl);
$flag = true;
if($numofrows > 0)
{
  while($row = mysqli_fetch_assoc($osl))
  {
    if($row['email'] == $mail)
    {
        echo 'Already Exist';
        $flag=false;
        break;
        
    }
    
        if($flag)
        {
        if(mysqli_query($conn,$new)){
            echo 'inserted successfully.';
        }
        else{
            echo 'why the hell not working';
        }
        $flag = false;
    }
   }
  }


?>