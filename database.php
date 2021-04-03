<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "trip_planner";
$con = new mysqli($db_server, $db_user, $db_pass, $db_name);
if(!$con){
die('Could not Connect My Sql:' .mysql_error());
}

// else{
//     echo "Connection Success ";
// }
?>