<?php 
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $flag=true;
    if($fname==""){
        $error="**Invalid name";
        $flag=false;
    }

     if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
         $error2="**Invalid Email";
         $flag=false;
        
        
     }
    if($flag){
    $cookie_name="username";
    $cookie_value=$fname;
    setcookie($cookie_name,$cookie_value,time()+(10),"/");
    $_COOKIE["username"]=$cookie_value;
    $thank="Thanks   ".$_COOKIE['username']."<br>"." For Subscribing Our Newsletter";
    
    
    if(isset($_COOKIE[$cookie_name])){
    
        header( "refresh:5; url=cookieout.php" );

    }
    else{
        echo "not set";
        
    }
   
   
    }
   



}

?>