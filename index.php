<a href="signup.html"> ENTER YOUR DATA</a><br>
<br>
<br>
<table border="2px" >
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Gender</th>
        <th>Country</th>
        <th>Action</th>
    </tr>


<?php
include("connection.php");
$sel = mysqli_query($conn,"select * from students");
$row = mysqli_num_rows($sel);
$connter=1;
if ($row>0) 
{
while($row = mysqli_fetch_array($sel) ) {
    
?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['mail']; ?></td>
            <td><?php echo $row['pass']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['country']; ?></td><br>
            <td>
            <a href="read.php?viewid=<?php echo htmlentities ($row['id']);?>"><i>View;</i></a>
            <a href="delete.php?deleteid=<?php echo htmlentities ($row['id']);?>"><i>Delete;</i></a>
            <a href="update.php?updateid=<?php echo htmlentities ($row['id']);?>"><i>Update;</i></a>
            </td>
    
        </tr>
<?php
}
$connter= $connter+1;
echo "<br>";
}
else {
    echo "Data not Found";
}
?>

</table>

