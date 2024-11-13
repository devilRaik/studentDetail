<?php
$conn = mysqli_connect('localhost','root', '','studentdata');
if(!$conn){
    die("Connection Error" . mysqli_connect_error());
}
?>