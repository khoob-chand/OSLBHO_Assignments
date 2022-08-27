<?php 
include 'validatecookie.php';

?>

<html>
    <head>
<style>

    h2{
        background-color: black;
        color:white;
        padding:10px;
    }
    footer{
        background-color: black;
        display:flex;
        
    
        padding:20px;
    }
    input{
        margin-right:20px;
        padding:10px;
        border-color:aquamarine;
        font-size:15px;
    }
    button{
        width:100px;
        height:30px;
        margin-top:5px;
    }
    div{
        height:80%;
        text-align: center;
    }
    a{
        text-decoration: none;
        margin-left:60%;
        color:white;
    }
    .para-1{
        display:flex;
    flex-direction: column;
    }
    .red{
        color:red;
    }
    .set{
        font-size:40px;
        text-align:center;
        color:aqua

    }
</style>
    </head>
    <body>
    <h2>Dev Community <a href="#">Login</a></h2>  
 



   
   <form action="#" method=POST> 
       <div>

    </div>
    <footer>
            <div class="para-1"> <input type="text" name="fname" placeholder="Name"> 
            <p class="red"> <?php echo $error ?></p>
</div>
        <div class="para-1"><input type="email" name="email" placeholder="Email">
        <p class="red"><?php echo $error2 ?></p>
</div>
    <button name="submit">Submit</button>

    </footer></form>


    </body>
</html>