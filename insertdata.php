<?php
//include("signup.html");
include("connection.php");
if(isset($_POST['submit']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mail = $_POST['mail'];
    $password = $_POST['pass'];
    $gender = $_POST['gender'];
    $country = $_POST['couantry'];
    //echo "$firstname , $lastname, $mail, $password, $gender, $country";
    //Query for insert data
    $query = mysqli_query($conn, "insert into students (firstname,lastname,mail,pass,gender,country) 
    values('$firstname','$lastname','$mail','$password','$gender','$country')");
    if($query)
    {
        echo "<script> alert('You have successfully inserted the data');</script>";
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    }
    else{
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }

}
?>
