<?php


$conn = new mysqli("localhost", "root" , "" , "bookstore");

if($conn == false){
    echo "Connection Failed";
}else{
    echo "Connection Successful";
}

?>