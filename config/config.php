<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "forstcarusa";

$conn = mysqli_connect($server , $username, $password ,$database);
if (!$conn){
echo "mysqli not conect" .mysqli_connect_error();
}
// else {
//     echo "conected";
// }
?>