<?php
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'signup';

 $con=  mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

if($con === false){
    die("Failed" . mysqli_connect_error());
}
?>