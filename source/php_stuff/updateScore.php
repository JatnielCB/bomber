<?php 
require("connection.php");
$user=$_POST["name"];
$points=$_POST["score"];
$sendScore=justSend("INSERT INTO scoreboard (user,points) VALUES ('$user','$points')");
?>