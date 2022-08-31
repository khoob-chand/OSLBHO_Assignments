<?php 
//Assignment -PHP-05 (i and ii);

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
//printing user_details using foreach loop

foreach($user_details as $k){
    $date1.="<tr>";
    foreach($k as $result){
        $date1.="<td>".$result."</td>";
    }
    $date1.="</tr>";
}

//creating user_detail using for loop 
for($i=0;$i<sizeof($user_details);$i++){
    echo '<tr style="border: 1px solid black;">';
    echo '<td style="border: 1px solid black;">'.$user_details[$i]['fname'].'</td>';
    echo '<td style="border: 1px solid black;">'.$user_details[$i]['lname'].'</td>';
    echo '<td style="border: 1px solid black;">'.$user_details[$i]['mail'].'</td>';
  
}
echo "</tr>";
echo "</table>";
echo "<br><br>";



?>

<table border=1>
    <tr>
        <th>firstname</th>
       
        <th>lastname</th>
        <th>email</th>
        

    </tr>
    <tr><?php echo $date1 ?></tr>
    
</table>