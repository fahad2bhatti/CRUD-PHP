<?php
include("connection.php");
if(isset($_GET['deleteid']))
{
    $delid = $_GET['deleteid'];
    $sql = mysqli_query($conn,"delete from students where ID='$delid'");
    if($sql){
    
    echo "<script>alert('Data Delete Successfully')</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    }
    else{
        echo "DATA Not Delete";
    }
}
?>