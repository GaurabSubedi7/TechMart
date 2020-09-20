<table style="width:100%">
<tr>
    <th>Id</th>
    <th>FirstName</th>
    <th>LastName</th>
    <th>UserName</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Address</th>
    <th>Status</th>
    <th>Action</th>

</tr>
<?php foreach($users as $user){ ?>
    <tr>
        <td><h3><?php   echo $user['user_id'];?></h3></td>
        <td> <h3><?php echo $user['first_name']; ?></h3> </td>
        <td>  <h3><?php echo $user['last_name']; ?></h3> </td>
        <td><h3><?php echo $user['username']; ?></h3> </td>
        <td><h3><?php echo $user['phone_number']; ?></h3> </td>
        <td><h3><?php echo $user['email']; ?></h3> </td>
        <td><h3><?php echo $user['address']; ?></h3> </td>
        <td><h3><?php echo $user['status']; ?></h3> </td>
        <td> <input type="submit" name="DeleteItem"  value="Delete User" /><input type="submit" name="EditItem"  value="Edit User" /> </td>
    </tr>
<?php } ?>
</table>