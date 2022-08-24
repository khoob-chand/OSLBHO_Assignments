<?php 
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $date=$_POST['dob'];
    $nationality=$_POST['nationality'];
    $profile=$_POST['profile'];
    $upload=$_POST['upload'];


    $val=true;
    if($fname=="" && $fname< 4){
        $fnameerr="** Must conatin 3 letter";
        $val=false;


    }
    if($lname=="" && $lname< 4){
        $lnameerr="** Must conatin 3 letter";
        $val=false;


    }
    if($username=="" && $username< 4){
        $usernameerr="** Must conatin 3 letter";
        $val=false;


    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $emailerr="**Invalid Email";
        $val=false;
       
       
    }
    if($username=""&&$username<4){
        $usernameerr="**Must contain 3 letter";
        $val=false;
    }
    if(strlen($phone)<10&&is_integer((integer)$phone)){
        $phoneerr="**Alteat 10 Interger";
        $val=false;
    
   
    }
    if(empty($gender)){
        $gendererr="**fill gender";
    }
    if(empty($date)){
        $doberr="**Must not be Empty";
        $val=false;
  }
  if(empty($nationality)){
    $nationalityerr="**Invalid Nationality";
    $val=false;
  }
  if(empty($upload)){
    if(!preg_match('/\.(jpg|png|jpeg)$/',$upload)){
        $uploaderr="**Invalid format of file(jpeg,png,jpg)";
        $val=false;
  }
}


}
?>