<?php
session_start();
$id=$_SESSION['id'];
include("conn.php");

$event = mysqli_real_escape_string($link, strip_tags($_POST['event']));

$time =  mysqli_real_escape_string($link,strip_tags($_POST['time']));

$event_des=mysqli_real_escape_string($link, strip_tags($_POST['event_des']));

$time_now=new DateTime();

if ($event && $time  ) {
    
    $sql = "INSERT INTO todo(event, the_time, event_description ,user_id) VALUES ('$event ', '$time','$event_des','".$id."')";

    $result=mysqli_query($link, $sql);
    if ($result){
        echo "reload";
    }

}
?>