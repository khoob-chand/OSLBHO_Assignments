<?php 

if(isset($_POST['submit'])){
$fname=$_POST['fname'];
$password=$_POST['password'];


// $uname=$uemail=$uphone=$udob="";


 $val=true;

   
 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $uemail="**Invalid Email";
    $val=false;
   
   
}
 
    
     if(empty($password)){
         $udate="**Must not be Empty";
         $val=false;
   
     
     
     }
     
 
        
    }
    
  







?>
<?php 
        if($val){
            session_start();
            $_SESSION["username"] = $fname;
            $_SESSION["password"] = $password;

            header("Location:http://localhost/success.php");
        }

?>
