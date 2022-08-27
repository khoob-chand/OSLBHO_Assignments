<?php $user_details = [[
    'fname' => 'Alex',
    'lname' => 'Yang',
    'mail' => 'alex@abc.com',],
    [
    'fname' => 'Christina',
    'lname' => 'Yang',
    'mail'=>'khoob@gmail.com',
   ]
];

foreach($user_details as $k){
    $date1.="<tr>";
    foreach($k as $result){
        $date1.="<td>".$result."</td>";
    }
    $date1.="</tr>";
}



?>

<table border=1>
    <tr>
        <th>firstname</th>
       
        <th>lastname</th>
        <th>email</th>
        

    </tr>
    <tr><?php echo $date1 ?></tr>
    
</table>