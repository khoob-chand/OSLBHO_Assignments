<?php 

if(isset($_POST['submit'])){
$fname=$_POST['fname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];

// $uname=$uemail=$uphone=$udob="";


 $val=true;

   
              if($fname==''and strlen($fname)<=3){
        $uname="**Must contain 3 character";
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
     if($val){
        include "connection.php";
     }
    
  





}

?>
