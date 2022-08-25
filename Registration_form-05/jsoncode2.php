<?php 
$str='[{"fname":"John","lname":"doe","mail":"John@abc.com"},{"fname":"Andy","lname":"doe","mail":"andy@abc.com"}]';
    $result =json_decode($str);
  echo var_dump($result);



?>