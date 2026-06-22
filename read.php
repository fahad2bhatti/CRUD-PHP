<table border="2px" >
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Gender</th>
        <th>Country</th>
        </tr>

<?php
include("connection.php");
$viewid = $_GET["viewid"];
$sel = mysqli_query($conn, "select * from students where ID = $viewid");
while( $row = mysqli_fetch_array($sel) ) {
    ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['firstname']; ?></td>
    <td><?php echo $row['lastname']; ?></td>
    <td><?php echo $row['mail']; ?></td>
    <td><?php echo $row['pass']; ?></td>
    <td><?php echo $row['gender']; ?></td>
    <td><?php echo $row['country']; ?></td><br>
</tr>
<?php
}
?>
</table>
           