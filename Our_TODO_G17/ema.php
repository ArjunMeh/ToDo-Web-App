<?php
include ("conn.php");
$q= "SELECT reg_users.email,GROUP_CONCAT(todo.event SEPARATOR '\n') as event1 FROM reg_users JOIN todo ON todo.user_id = reg_users.user_id group by todo.user_id"; 
$r=mysqli_query($link,$q);
while($row=mysqli_fetch_assoc($r)){
    $to_email=$row['email'];
    $subject="The remaining Tasks for today is : ";
    $message=$row['event1'];
    $headers='From: adpgroup17@gmail.com';
    mail($to_email,$subject,$message,$headers);
}
?>