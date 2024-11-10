<?php
// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "forstcarusa";


// live server
$server = "localhost";
$username = "u223750196_forstcarusa";
$password = "b?!ROnV[D/s0";
$database = "u223750196_forstcarusa_DB";

$conn = mysqli_connect($server , $username, $password ,$database);
if (!$conn){
echo "mysqli not conect" .mysqli_connect_error();
}
// else {
//     echo "conected";
// }
?>