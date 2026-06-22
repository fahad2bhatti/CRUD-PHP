<?php
$conn = mysqli_connect("localhost","root","","abc");
if(mysqli_connect_errno())
{
    echo "connection fail". mysqli_connect_error();
}
else{
    //echo "Sucessfully Connected";
}
?>