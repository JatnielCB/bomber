<?php
function connect() {return mysqli_connect("localhost","root","","dactyl");}

function justSend($query){return mysqli_query(connect(),$query);}
function connectAndSend($query)
{
    $result=mysqli_query(connect(),$query);
    return mysqli_fetch_all($result);
}

//$dataArray=connectAndSend("INSERT INTO scoreboard (user,points) VALUES ('POOP','221')");
?>





