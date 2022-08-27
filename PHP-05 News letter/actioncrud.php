<?php 



if(isset($_POST['submit'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];

$dob=$_POST['dob'];
$nation=$_POST['nationality'];
$val=true;

if(empty($fname) && strlen($fname)<4){
    $ufname="**must contain 3 character";
    $val=false;


}
if(empty($lname) && strlen($lname)<4){
    $ulname="**must contain 3 character";
    $val=false;


}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $uemail="**Invalid Email";
    $val=false;
   
   
}

if(empty($dob)){
    $udate="**Must not be Empty";
    $val=false;
}
if(empty($nation)){
    $unation="**fill Nationality";
    $val=false;




}


if($val){
    include 'connectcrud.php';
}

 


}
if(isset($_POST['subscribe'])) {
$email1=$_POST['hello'];
$flag=true;

if(!filter_var($email1,FILTER_VALIDATE_EMAIL)){
    $uemail1="**Invalid Email";
    $flag=false;
   
   
}



    $testquery = "SELECT email FROM crud WHERE email = '$email1'";


        $servername = "localhost";
        $username = "root";
        $password ="Admin@123";
        $db="Registration";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$db);

        // Check connection
        if (!$conn) {

        echo ("Connection failed: ");
        }
        else{
            echo "Connected successfully";
        }
       


        if(mysqli_query($conn, $testquery)){
           
          $insern="update crud set pdf='dummy3.pdf' where email='$email1'";


            if( mysqli_query($conn,$insern))
{
    echo "inserted successfully";
}
else {
    echo "nahi mila";
}          
        }
        else{
            echo 'not find';
        }



        //  $result = mysqli_query($conn, $testquery) or die(mysqli_error($conn));
        //  echo $result;



  } 
?>

