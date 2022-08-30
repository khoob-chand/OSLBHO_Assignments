<?php
// require("connect.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){

$mail=$_POST['newsEmail'];
   
//     if (empty($mail)||!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
//         echo "<script>alert('Invalid email format')</script>";
//     }
//     else if(!empty($mail)&&filter_var($mail, FILTER_VALIDATE_EMAIL)){
//         $sql ="INSERT INTO email_table (email) VALUES ('$mail')";
//         if ($conn->query($sql) === TRUE) {

            // require '/usr/share/php/libphp-phpmailer/src/PHPMailer.php';

            // require '/usr/share/php/libphp-phpmailer/src/SMTP.php';

 

            //Declare the object of PHPMailer
            require '/usr/share/php/PHPMailer/src/PHPMailer.php';

            require '/usr/share/php/PHPMailer/src/SMTP.php';
            
            require '/usr/share/php/PHPMailer/src/Exception.php';
            
            // use PHPMailer\PHPMailer\PHPMailer;
            // echo "hell2o";
            
            // $mail = 'nikhil.mahala@opensenselabs.com';
            //Declare the object of PHPMailer
            
            $email = new PHPMailer\PHPMailer\PHPMailer();
            
            //Set up necessary configuration to send email
            
            $email->IsSMTP();
            
            $email->SMTPAuth = true;
            
            $email->SMTPSecure = 'ssl';
            
            $email->Host = "smtp.gmail.com";
            
            $email->Port = 465;
            
            //Set the gmail address that will be used for sending email
            
            $email->Username = "khoobchand.jhariya@opensenselabs.com";
            
            //Set the valid password for the gmail address
            
            $email->Password = "Rohit@123";
            
            //Set the sender email address
            
            $email->SetFrom("khoobchand.jhariya@opensenselabs.com");
            
            //et the receiver email address
            
            $email->AddAddress($mail);
            
            //Set the subject
            
            $email->Subject = "Testing For NewsLetter";
            
            //Set email content
            
            $email->Body = "Hello!, you've subscribed to our newsletter";
            
            // $email->addAttachment('dummy.pdf');
            // echo "hell`1o";
            // $result = $email->send();
            // echo "<pre>"; print_r($email);
            
            if($email->send()){
                echo "<script>alert('Hurray you have subscribed to our newsletter');</script>";
            }
            else{
                echo "hello";
            }
        
                
//           } else {
//                 echo "Error: " . $sql . "<br>" . $conn->error;
//           }
//     }
    
} 


?>




