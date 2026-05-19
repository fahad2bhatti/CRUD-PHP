<?php
//include("signup.html");
include("connection.php");
if(isset($_POST['submit']))
{
    $updateid= $_GET['updateid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mail = $_POST['mail'];
    $password = $_POST['pass'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    //echo "$updateid,$firstname , $lastname, $mail, $password, $gender, $country";
    $query = mysqli_query($conn, "UPDATE students SET firstname='$firstname', lastname ='$lastname', mail='$mail', pass='$password',gender='$gender',country='$country' WHERE ID ='$updateid'");
    //echo "$query";
    if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
else
    {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>

<form  method="POST">
 <?php
 include("connection.php");
 $updateid=$_GET['updateid'];
$ret=mysqli_query($conn,"select * from students where ID='$updateid'");
while ($row=mysqli_fetch_array($ret)) {
?>
<h2>Update </h2>
<p>Update your info.</p>
<html>
    <label>First Name</label>
    <input type="text" name="firstname" required="true" value ="<?php echo $row['firstname'];?>" ><br>
    <label>Lastname</label>
    <input type="text" name="lastname" required="true" value ="<?php echo $row['lastname']; ?>"><br>
    <label>Username</label>
    <input type="email" name="mail" required="true" value="<?php echo $row['mail']; ?>"><br>
    <label>Password</label>
    <input type="password" name="pass" required="true" value="<?php echo $row['pass']; ?>"><br>
    <label>Gender</label>
    <select name="gender">
        <option value="-1"> Enter Your Gender</option>
        <option value="Male"> Male </option>
        <option value="Female">Female</option>
    </select><br>
    <label>Select Country</label>
    <select name="country" >
        <option value="-1"> Select Country</option>
        <option value="Pakistan"> Pakistan</option>
        <option value="U.K"> U.K</option>
        <option value="India"> India</option>
        <option value="USA"> USA</option>
    </select><br>
    <button type="submit" name="submit">Update</button>
    
<?php 
}
?>
<div class="form-group">

        </div>
    </form>
</html>