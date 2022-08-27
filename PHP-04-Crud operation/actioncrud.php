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
if(strlen($phone)<10&&is_integer((integer)$phone)){
    $uphone="**Alteat 10 Interger";
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

    include 'connectcrud.php';


}
?>

