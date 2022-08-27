<?php 
$user_details_2 = [[
    'fname' => 'John',
    'lname' => 'doe',
    'mail' => 'John@abc.com',],
    [
    'fname' => 'Andy',
    'lname' => 'doe',
    'mail' => 'andy@abc.com',]
    ];
    $user_details = [[
    'fname' => 'Alex',
    'lname' => 'karev',
    'mail' => 'alex@abc.com',],
    [
    'fname' => 'Christina',
    'lname' => 'Yang',
    'mail'=>'khoob@gmail.com',
   ]
];
$user=(array_merge($user_details_2,$user_details));
print_r($user);




?>