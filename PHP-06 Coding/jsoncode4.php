<?php 
 $user_details = [[
    'fname' => 'Alex',
    'lname' => 'Yang',
    'mail' => 'alex@abc.com',],
    [
    'fname' => 'Christina',
    'lname' => 'Yang',
    'mail'=>'khoob@gmail.com',
   ]
];
for($i=0;$i<2;$i++){
    $key=array_search('alex@abc.com',$user_details[$i]);
    echo $key;
}
// array_filter('Yang',$user_details);






?>